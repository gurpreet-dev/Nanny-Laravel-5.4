<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminUsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');

        $this->middleware(function ($request, $next) {
            if(Auth::user()->role != 'admin'){
                return redirect('admin/dashboard');
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'user')->orderBy('id', 'desc')->get();
        
        return view('admin.users.users', ['users' => $users]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'             => 'required|email|max:255|unique:users'
        ]);
    }

    
    public function add(Request $request)
    {

        if($request->isMethod('post')){

            $this->validator($request->all())->validate();

            $post = $request->all();

            $post['password'] = bcrypt($post['password']);
            $post['ages'] = json_encode($post['ages']);
            $post['subscribed'] =   '0';

            $insert = User::create($post);

            if($insert){
                return redirect('/admin/users')->with('success','User has been added successfully!');
            } else {
                return back()
                           ->with('error','Error in adding user');
            }
        }

        return view('admin.users.add');
    }


    public function edit(Request $request, $id)
    {

        if($request->isMethod('post')){
            
            $post = request()->except(['_token']);
            $post['ages'] = json_encode($post['ages']);

            $update = User::where('id', $id)->update($post);

            if($update){
                return redirect('/admin/users')->with('success','User has been updated successfully');
               
            } else {
                return back()
                           ->with('error','Error in updating user');
            }

        }

        $data = User::find($id);

        return view('admin.users.edit', ['user' => $data]);
    }

    public function view($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.view', ['user' => $user]);
    }

    public function changepassword(Request $request, $id){
        
        if($request->isMethod('post')){

            $post = request()->except(['_token']);

            unset($post['npassword']);

            $post['password'] = bcrypt($post['password']);

            $update = User::where('id', $id)->update($post);

            if($update){
                return back()->with('success','Password has been changed successfully');
            } else {
                return back()
                           ->with('error','Error in updating nanny');
            }
        }

        $nanny = User::where('id', $id)->first();

        return view('admin.users.changepassword', ['user' => $nanny]);
    }

    
    public function delete($id)
    {
        $user = User::where('id', $id)->first();

        if($user->image != ''){
            if(file_exists(public_path('/images/users/'.$user->image))){
                unlink(public_path('/images/users/'.$user->image));
            }
        }
        
        $delete = User::where('id', $id)->delete();

        if($delete){
            return redirect('/admin/users')->with('success','User has been deleted successfully');
        } else {
            return redirect('/admin/users')->with('error','Error in deleting user');
        }
    }

    public function changeStatus($user_id, $status){
        $user = User::find($user_id);
        $user->status = $status;

        if($user->save()){            

            return redirect('/admin/users')->with('success', "Status has been changed successfully.");
        }else{
            return redirect('/admin/users')->with('error', "Error in changing status. Please try again later");
        }
    }
}
