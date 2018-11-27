<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;

class AdminauthController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function username(){
        return 'email';
    }

    public function showlogin(){
        return view('admin.login');
    }

    public function login(Request $request){
    
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            return redirect()->intended(route('admin.dashboard'));
        }else{
            return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => Lang::get('auth.failed'),
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->intended(route('admin.login'));
    }
}
