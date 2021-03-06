<?php

//simple postscontrollers...
Route::get('/homes','PostsController@homes');
Route::get('/','PostsController@homes');

//login form for admin...
Route::match(['get','post'],'/admin','AdminController@login');

//if login success for normal users...
Route::get('/dashboard','DashboardController@index');


//this helps to have common routes(those who need authetication) binds 
//problem is on using it, default login and custom admin login may conflict
//instead i used Session for my login, and default login is handle by it's own code...
//I am not using this , because it assumes the laravel default auth
Route::group(['middleware' => ['auth']],function(){
		
});

//if login success for admin...
Route::get('admin/dashboard', 'AdminController@dashboard');
Auth::routes();

//view the list of users...
Route::get('/admin/view','AdminController@view');

//view the list of admins...
Route::get('/admin/view2','AdminController@view_admins');

//view the list of menus...
Route::get('/menu/view','MenuController@index');

//view the list of submenus...
Route::get('/submenu/view','SubmenuController@index');

//simple logout functionality...
Route::get('/logout', 'AdminController@logout');

//to delete the users...
Route::get('/admin/delete/{id}','AdminController@delete');

//to update users...
Route::get('/admin/{id}/edit','AdminController@edit');    

Route::patch('/admin/update/{id}',[
    'uses' =>'AdminController@update',
    'as'   => 'admin.update'
]);
    
//to delete the menus...
Route::get('/menu/delete/{id}','MenuController@destroy');
Route::get('/submenu/delete/{id}','SubmenuController@destroy');

// //to update menus...
// Route::match(['get','post'],'/menu/update_menus/{id}',[
// 	   'uses' =>'MenuController@update_users',
// 	   'as'  =>'admin.update'
// 	]);

//to toogle active to inactive and vice-versa in button pressed
Route::get('/admin/toogle/{id}','AdminController@toogle_status');
Route::get('/menu/toogle/{id}','MenuController@toogle_status');
Route::get('/submenu/toogle/{id}','SubmenuController@toogle_status');

//form to add users...
Route::match(['get','post'],'/admin/add_user','AdminController@register_users');

//for menus...
Route::resource('menus','MenuController');

Route::post('/menus/store',[
        'uses'=>'MenuController@store',
        'as'=>'menu.store'
    ]);

Route::post('/submenus/store',[
        'uses'=> 'SubmenuController@store',
         'as' => 'submenu.store'
    ]);


  //  Teachers Profile  part:

  Route::resource('teachers','TeacherController');

  Route::get('view/teachers_list','TeacherController@index');
  Route::get('teacher/dashboard/{id}','TeacherController@show');
  Route::get('teacher/add_profile','TeacherController@create');
//   Route::post('/teacher/store',[
//             'uses'=>'TeacherController@store',
//             'as'=>'teacher.store'
//             ]);

Route::post('teacher/add_profile','TeacherController@store');

//   Route::post('teacher/add_profile','TeacherController@store');
//   Route::resource('teacher','TeacherController');  


//  Students Profile Part: 
Route::resource('students','studentsController');
  Route::view('profile/dashboard','StudentController');
  Route::get('student/add_profile','StudentController@create');
  Route::post('student/add_profile','StudentController@store');