<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\AdminService;
use App\Price;
use App\ChildPrice;

class AdminServicesController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

    	$services = DB::table('admin_services')->orderby('id', 'desc')->get();

    	return view('admin.services.index', ['services' => $services]);
    }

    protected function validator(array $data){

	    return Validator::make($data, [
            'title'             => 'unique:admin_services'
        ]);
	}

    public function add(Request $request){

    	if($request->isMethod('post')){
    		
    		$this->validator($request->all())->validate();

    		$post = request()->except(['_token']);


    		$post['created_at'] = \Carbon\Carbon::now()->toDateTimeString();

    		$insert = DB::table('admin_services')->insert($post);

    		if($insert){
    			return redirect('admin/services')->with('success', 'Service has been added successfully.');
    		}else{
    			return redirect()->route('addService')->with('error', 'Unable to add service');
    		}

    	}

    	return view('admin.services.add');
    }

    public function edit(Request $request, $id){

    	$service = DB::table('admin_services')->where('id', $id)->first();

    	if($request->isMethod('post')){
    		
    		if($service->title != $request->title){
	    		$this->validator($request->all())->validate();
	    	}

    		$update = AdminService::find($id);
    		$update->title = $request->title;

            if(isset($request->status)){
                $update->status = $request->status;
            }else{
                $update->status = 0;
            }

            if(isset($request->checked)){
                $update->checked = $request->checked;
            }else{
                $update->checked = 0;
            }

    		if($update->save()){
    			return redirect('admin/services')->with('success', 'Service has been updated successfully.');
    		}else{
    			return redirect()->route('editService', ['id' => $id])->with('error', 'Unable to update service');
    		}

    	}

    	return view('admin.services.edit', ['service' => $service]);
    }

    public function delete($id){
    	$delete = DB::table('admin_services')->where('id', $id)->delete();

		if($delete){
			return redirect('admin/services')->with('success', 'Service has been deleted successfully.');
		}else{
			return redirect('admin/services')->with('error', 'Unable to delete service');
		}
    }

    /********************************/


    public function prices(){

        $prices = Price::with(['service', 'type', 'child_prices'  => function ($query) {
            $query->orderby('child', 'asc');
        }])->orderby('id', 'desc')->get();

        return view('admin.services.prices', ['prices' => $prices]);

    }

    public function addPrice(Request $request){

        $services = AdminService::where('status', 1)->get();

        $new = [];

        foreach($services as $service){
            $new[$service->id] = $service->title;
        }

        if($request->isMethod('post')){

            $post = [
                'service_id'    =>  $request->service_id,
                'type_id'          =>  $request->type_id,
                'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
            ];
            
            $insert_id = Price::insertGetId($post);

            if($insert_id){

                foreach($request->pricing as $pricing){

                    if($pricing['price'] != ''){

                        $child_price = new ChildPrice();
                        $child_price->price_id = $insert_id;
                        $child_price->child         = $pricing['child'];
                        $child_price->price         =  $pricing['price'];
                        $child_price->created_at   =  \Carbon\Carbon::now()->toDateTimeString();

                        $child_price->save();
                    }

                }

                return redirect('admin/prices')->with('success', 'Price has been added successfully.');

            }else{
                return redirect()->route('addPrice')->with('error', 'unable to add price.');
            }

        }

        $types = DB::table('types')->where('status', 1)->get();

        $types2 = [];

        foreach($types as $type){
            $types2[$type->id] = ucwords($type->title);
        }

        return view('admin.services.add_price', ['services' => $new, 'types' => $types2]);

    }

    public function editPrice(Request $request, $id){


        if($request->isMethod('post')){


            $price                      =   Price::find($id);
            $price->service_id          =   $request->service_id;
            $price->type_id                =   $request->type_id;
            $price->updated_at          =   \Carbon\Carbon::now()->toDateTimeString();

            if($price->save()){

                ChildPrice::where('price_id', $id)->delete();
                
                foreach($request->pricing as $pricing){

                    if($pricing['price'] != ''){

                        $child_price                =   new ChildPrice();
                        $child_price->price_id      =   $id;
                        $child_price->child         =   $pricing['child'];
                        $child_price->price         =   $pricing['price'];
                        $child_price->created_at    =   \Carbon\Carbon::now()->toDateTimeString();

                        $child_price->save();
                    }

                }

                return redirect('admin/prices')->with('success', 'Price has been updated successfully.');
                
            }else{
                return redirect()->route('editPrice',['id' => $id])->with('error', 'unable to update price.');
            }    

        }    

        $data = Price::with(['child_prices'  => function ($query) {
            $query->orderby('child', 'asc');
        }])->where('id', $id)->first();

        $data = json_decode(json_encode($data), true);

        $services = AdminService::where('status', 1)->get();

        $new = [];

        foreach($services as $service){
            $new[$service->id] = $service->title;
        }

        $types = DB::table('types')->get();

        $types2 = [];

        foreach($types as $type){
            $types2[$type->id] = ucwords($type->title);
        }

        return view('admin.services.edit_price', ['services' => $new, 'data' => $data, 'types' => $types2]);
    }

    public function deletePrice($id){
        $delete = Price::where('id', $id)->delete();
        ChildPrice::where('price_id', $id)->delete();

        if($delete){
            return redirect('admin/prices')->with('success', 'Price has been deleted successfully.');
        }else{
            return redirect('admin/prices')->with('error', 'Unable to delete price');
        }
    }

}    