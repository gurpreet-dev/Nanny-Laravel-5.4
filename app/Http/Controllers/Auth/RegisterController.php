<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

use App\Config;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = 'after/redirecttopaypal';
    protected $redirectTo = 'user/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'             => 'required|email|max:255|unique:users',
            'first_name1'       => 'required',
            'last_name1'        => 'required',
            'mobile1'           => 'required',
            'address_1'         => 'required',
            'city'              => 'required',
            'state'             => 'required',
            'zip'               => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data); exit;

        return User::create([
            'role'              => 'user',
            'email'             => $data['email'],
            'first_name1'       => $data['first_name1'],
            'last_name1'        => $data['last_name1'],
            'mobile1'           => $data['mobile1'],
            'first_name2'       => $data['first_name2'],
            'last_name2'        => $data['last_name2'],
            'mobile2'           => $data['mobile2'],
            'address_1'         => $data['address_1'],
            'address_2'         => $data['address_2'],
            'city'              => $data['city'],
            'state'             => $data['state'],
            'zip'               => $data['zip'],
            'household_info'    => $data['household_info'],
            'pet_info'          => $data['pet_info'],
            'q1'                => $data['q1'],
            'q2'                => $data['q2'],
            'q3'                => $data['q3'],
            'q4'                => $data['q4'],
            'q5'                => $data['q5'],
            'a1'                => $data['a1'],
            'a2'                => $data['a2'],
            'a3'                => $data['a3'],
            'a4'                => $data['a4'],
            'a5'                => $data['a5'],
            'hear_aboutus'      => $data['hear_aboutus'],
            'which_hear_aboutus'=> isset($data['which_hear_aboutus']) ? $data['which_hear_aboutus'] : '',
            'referred_by'       => $data['referred_by'],
            'gender'            => $data['gender'],
            'childs'            => $data['childs'],
            'ages'              => json_encode($data['ages']),
            'status'            => 1,
            'password'          => bcrypt($data['cpassword']),
        ]);
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $logo = URL::to('/').'/images/website/logo.png';

        $data = [];

        Mail::send('emails.user_registered_admin', ['logo' => $logo, 'data' => $request->all()], function ($message) use($data)
        {
            $message->to(User::admin('email'), User::admin('first_name'))->subject('New user registered');
            $message->from(User::admin('email'),'Nanny Portland');
        
        }); 

        Mail::send('emails.user_registered_user', ['logo' => $logo, 'data' => $request->all()], function ($message) use($request)
        {
            $message->to($request->email, $request->first_name1)->subject('Registration');
            $message->from(User::admin('email'),'Nanny Portland');
        
        }); 

        /********************/

        $post = $request->all();

        $message = 'New user has been registered us. || Name: '.$post['first_name1'].' '.$post['last_name1'].' || Email: '.$post['email'];

        Config::sms(User::admin('mobile'), $message); // Message to admin

        Config::sms($post['mobile1'], 'Thank you for registering with us. PORTLAND NANNY'); // Message to user

        /********************/

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    public function nannyRegister(Request $request){

        if($request->isMethod('post')){

            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:admins|max:255'
            ]);

            if ($validator->fails()) {
                return redirect('nanny/register')
                            ->withErrors($validator)
                            ->withInput();
            }

            $post = $request->all();
            $post['role'] =   'nanny';
            $post['status'] =   0;
            $post['password']   =   bcrypt($post['password']);

            $create = Admin::create($post);

            if($create){

                $logo = URL::to('/').'/images/website/logo.png';

                $admin = Admin::where('role', 'admin')->first();

                Mail::send('emails.nanny_registered', ['logo' => $logo, 'data' => $post], function ($message) use($admin)
                {
                    $message->to($admin->email, 'Nanny')->subject('New nanny registered');
                    $message->from('kuldeepjha@avainfotech.com','Nanny Portland');
                
                });


                return redirect('nanny/register')->with('success', 'Your have been successfully registered. Please wait for the super admin regarding your acceptance.');
            }else{
                return redirect('nanny/register')->with('error', 'Error in registration. Please try again later');
            }

        }

        return view('auth.nanny_register');
    }
}
