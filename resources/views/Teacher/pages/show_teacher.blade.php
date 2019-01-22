@extends('Admin.adminLayout.admin_design')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->

		@if(Session::has('flash_msg_err'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<strong>{{ Session('flash_msg_err') }}</strong>								
			</div>					
		@endif
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Teachers List</h1>
			</div>
		</div><!--/.row-->				
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Teachers Table</div>
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						        <th data-field="id" >ID</th>
						        <th data-field="full_name">Full Name</th>
                                <th data-field="username">Username</th>
                                <th data-field="photo">Photo</th>
						        <th data-field="phone">Contact No</th>
						        <th data-field="email">Email</th>						        
                                <th data-field="gender">Gender</th>
                                <th data-field="identity">Identity</th>
                                <th data-field="social_sites">Social_site_Links</th>
                                <th data-field="qualification">Qualification</th>
                                <th data-field="full_description">Full Description</th>						         
                                <th data-field="action"  colspan="2">Actions</th>
						    </tr>
						    </thead>
						    {{-- @foreach($menus as $menu)
							    <tr>
							    	<td >{{ $menu->id }}</td>
							    	<td >{{ $menu->title }}</td>
					    			<td >{{ $menu->slug }}</td>
							    	<td >{{ $menu->created_at }}</td>
                                    <td >{{ $menu->updated_at }}</td>                                    							    	
							    	@if($menu->status == 0)
							    		  <td > <a href="/menu/toogle/{{ $menu->id }}">  
							    		  	<button type="button" class = 'btn btn-danger'>inactive</button> 
							    		  </a>
							    		  </td>							    		  
							    	@else 
							    	<td ><a href="/menu/toogle/{{ $menu->id }}"> <button class = 'btn btn-success'>active</button> </td></a>  
                                    @endif
                                    
                                    <td > --}}

                                        {{-- <a href="/menu/update_menu/{{ $menu->id }}"> --}}
                                        
                                        
                                            {{-- <a href="#">
								    		<button type="button" class = 'btn btn-primary'>Update
								    		</button>								    		
							    		</a>
							    	</td>
							    	
							    	<td >
							    		<a href="/menu/delete/{{ $menu->id }}">
							    			<button type="button" class = 'btn btn-danger'>Delete</button>
							    		</a>
							    	</td> --}}
							    		
							    </tr>
						    @endforeach
						    
						</table>
					</div>
				</div>
			</div>			
		</div><!--/.row-->			
		
	</div><!--/.main-->

@endsection
