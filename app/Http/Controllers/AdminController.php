<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;

class AdminController extends Controller
{
    public function login(Request $request){    

    	if($request->isMethod('post')){

    		$data = $request->input();

	    	if(Auth::attempt([
                'email'=> $data['email'],
                'password'=>$data['password'],
                'identity' => 'admin',
                'active'   => 1,
            ])){                

                $user = User::where('email','=',$data['email'])->get();                
                Session::put('adminsession', $user[0]->username);                   

	    	  return redirect('/admin/dashboard');    
	    	}else{
                return redirect('/admin')->with('flash_msg_err','invalid username or password');	    		
	    	}	
    	}

    	return view('Admin.pages.admin_login');
    }

    public function logout(){        
        Session::flush();
        return redirect('/admin')->with('flash_msg_success','Successfully logged out');        
    }

    public function dashboard(){    	        

        //this is the session method to control access

        if(Session::has('adminsession')){
            return view('Admin.pages.admin_dashboard')->with('highlight,dashboard');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }        
    }    

    //to show the form to add the users...
    public function register_users(Request $request){
        
        if(Session::has('adminsession')){

            if($request->isMethod('get')){
                return view('Admin.pages.admin_add');
             }else{
                $this->validate($request,[
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|  unique:users',
                'gender' => 'required',
                'password_confirmation' => 'required',
                'password' => 'required|min:6|confirmed',                
                'roles' => 'required'
                ]);                

                $user = new User;
                $user->first_name = $request->input('first_name');
                $user->last_name = $request->input('last_name');
                $user->username = $request->input('username');
                $user->email = $request->input('email');                                    
                $user->password = Hash::make($request->input('password'));
                $user->gender = $request->input('gender');                
                $user->identity = $request->input('roles');
                $user->active = 1;                          //added by admin so already active...
                $user->save();

                if($request->input('roles') == 'Admin')
                     return redirect('/admin/view2');   //view list of admins after adding admin
                else return redirect('/admin/view');    //else if users are added, view list of users                
                
            }
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }        
    }

    //this function shows the form with values that is edited on button press...
    public function edit($id){

        if(Session::has('adminsession')){            

            $user = User::find($id);
            return view('Admin.pages.admin_update')->with('users',$user);

        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');
        }

    }


    //after button press ,this function  saves the edited data...
    public function update(Request $request,$id){

        if(Session::has('adminsession')){            

            $this->validate($request,[
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'username' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'gender' => 'required',
                    'roles' => 'required',
                    'active' => 'required'
                    ]);

                    $user = User::find($id);                
                    $user->first_name = $request->input('first_name');
                    $user->last_name = $request->input('last_name');
                    $user->username = $request->input('username');
                    $user->email = $request->input('email');                                     

                    if($request->input('password') != ""){

                        if( strlen( $request->input('password') ) < 6){

                           return redirect("/admin/update_users/$id")->with('flash_msg_err','password length is short');                        
                        }else{
                            $user->password = Hash::make(request('password'));                
                        }
                    }

                    $user->gender = $request->input('gender');                
                    $user->identity = $request->input('roles');
                    $user->active = $request->input('active');                
                    $user->save();                            

                    if($request->input('roles') == 'Admin')
                         return redirect('/admin/view2');   //view list of admins after adding admin
                    else return redirect('/admin/view');    //else if users are added, view list of users
                }else{

                    return redirect('/admin')->with('flash_msg_err','You must login to access');

                }

    }

    //to view users as a table in admin panel...
    public function view(){
        if(Session::has('adminsession')){
            $users = User::where('identity','!=','admin')->get();

            return view('Admin.pages.admin_viewusers')->with('users',$users);
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');        
        }    
    }   


    //to view admins as a table in admin panel...
    public function view_admins(){
        if(Session::has('adminsession')){
            $users = User::where('identity','=','admin')->get();            

            return view('Admin.pages.admin_viewadmins')->with('users',$users);
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');        
        }    
    }

    //remove the users...
    public function delete($id){

        if(Session::has('adminsession')){
            $user = User::find($id);                    
            $user->delete();
            return redirect('/admin/view');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');        
        }
    }

    public function toogle_status($id){

        if(Session::has('adminsession')){
            
            $user = User::find($id);
            $user->active =  1 - $user->active;           
            $user->save();

            if($user->identity == 'admin') return redirect('/admin/view2'); 
            else return redirect('/admin/view');
        }else{
            return redirect('/admin')->with('flash_msg_err','You must login to access');        
        }
    }    

}