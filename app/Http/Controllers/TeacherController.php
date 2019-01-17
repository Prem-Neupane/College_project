<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
// use App\User;
use App\Teacher;
use Session;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        // if(Auth::user()->identity=='teacher'){
            // $Tid = Teacher::find(auth()->id);
            $teacher = Auth::user();
            return view('Teacher/layout/dashboard');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        // if(Auth::user()->identity=='teacher'){

            if($request->isMethod('get')){
           // $teacher = Teacher::Auth()->id;
                $teacher = Auth::user();
                // return view('Teacher/pages/add_profile')->with("teacherdata",Teacher::find(auth()->id));
                return view('Teacher/pages/add_profile')->with("teacher",$teacher);
            }

        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
   
    if(Auth::user()->idnetity=='teacher'){
        
        //   if($request->isMethod('post')){
            // if(dd($request)){

                 $this->validate($request,[
                    'address' => 'required|string|max:255',
                    'phone'   => 'required|string|min:15|max:15',
                    'qualification' => 'string|max:255',
                    'description'  =>'string|max:255',  
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

            $teacher = new Teacher;
            $teacher->address= $request->input('address');
            $teacher->phone = $request->input('phone');
            $teacher->qualification = $request->input('qualification');
            $teacher->description = $request->input('description');
            $fileName = pathinfo($request->file('image')->getClientOriginalName(),PATHINFO_FILENAME);
            $teacher->image = $fileName.'_'.time().'.'.request()->image->getClientOriginalExtension();
            // $request()->image->move(images('images'), $imageName);
            $path= $request->file('image')->storeAs('public/image/user',$teacher->image);
            $teacher->save();

            return redirect('/teacher/dashboard')->with('success','Your Profile Updated Successfully !!!');
            // $imageName = time().'.'.request()->image->getClientOriginalExtension();
            // request()->image->move(public_path('images'), $imageName);
            // $teacher->image=
     
    // }        
        }else{
                return redirect('/admin')->with('flash_msg_err','You must Log-In First to access');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
