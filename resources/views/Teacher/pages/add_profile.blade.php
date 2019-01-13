@extends('Admin.adminLayout.admin_design')
@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
			<li><a href="{{ url('teacher/add_profile') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Teacher's Details Form</li>
			</ol>
		</div><!--/.row-->

	    <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Teacher Registration Form</h1>
			</div>
	    </div><!--/.row-->
				
		@if(count($errors) > 0)
		  @foreach($errors->all() as $error)
		  	<div class="alert alert-danger"> {{ $error }}</div>
		  @endforeach
		@endif

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Your Details</div>
					<div class="panel-body">
						<div class="col-md-12">							
							{{-- see these	once again		 --}}
 							<form action ="{{route('teacher.store')}}" method="post">

							{{ csrf_field() }}
								
								<?php
								$mi=0;
								$fi=0; 
								if($teacher->gender== 'Male'){
									$mi=1;
									$fi=0;
								}else {
									$mi=0;
									$fi=1;
								}
									?>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Your First Name</label>
									<input class="form-control" name = 'first_name' value="{{$teacher->first_name }}">
								</div>			

								<div class="form-group col-md-6">
									<label>Your Last Name</label>
									<input class="form-control" name = 'last_name' value="{{$teacher->last_name}}">
								</div>
							</div>
							
							<div class="row">	
								<div class="form-group col-md-6">									
									<label>Your Username</label>
								<input class="form-control" name = 'username' value="{{$teacher->username}}" >
								</div>

								<div class="form-group col-md-6">
									<label>Your Role</label>
									{{-- @if($teacher->identity=='teacher') --}}
											<label>Your Role</label>
											<input class="form-control" name = 'identity' value="{{$teacher->identity}}" >
									{{-- @endif --}}
								</div>
							</div>

							<div class="row">	
									<div  class="form-horizontal col-md-6" role="form">
									<label>Gender</label> <br/>
									<div class="radio-inline">
										
										<label>
										<input type="radio" name="gender" id="optionsRadios1" value="{{$mi}}" checked>Male
										</label>
									</div>
									<div class="radio-inline">
										<label>
											<input type="radio" name="gender" id="optionsRadios2" value="{{$fi}}">Female
										</label>
									</div>									
								</div>		

								<div class="form-group col-md-6">									
									<label>Your E-mail</label>
									<input class="form-control" name = 'email' value ="{{$teacher->email}}" >
								</div>
							</div>
{{-- ----------------------------------------------------------------------------}}
							 </form>
						</div>
					</div>


					<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add Following Details On Your Profile</div>
									<div class="panel-body">
										<div class="col-md-12">	

							<div class="row">
								<div class="form-group col-md-6">
									<label>Address</label>
									<input  class="form-control" name = 'address' placeholder= "Enter your full address Details" >
								</div>	

{{-- ----------------------------------------------------------------------------}}										 													
								<div class="form-group col-md-6">
									<label>Contact Details</label>
									<input class="form-control" name= 'phone'  value="+977 " placeholder="Enter your contact Detail" >
								</div>
							</div>
							<div class="row">
									<div class="form-group col-md-6">
											<label>Your Qualification Details</label>
											{!! Form::open(['action'=>'TeacherController@create','method'=>'POST']) !!}
												<div class="form-group">
												{{Form::textarea('qualificatiom','',['id'=>'article-ckeditor1','class'=>'form-control','placeholder'=> 'Fill this area with your qualification deatails'])}}
												</div>
										</div>
							
							<div class="form-group col-md-6">
								<label>Your Full Description</label>
								{!! Form::open(['action'=>'TeacherController@create','method'=>'POST']) !!}
									<div class="form-group">
								 	{{-- {{Form::label('desc','Description')}} --}}
									{{Form::textarea('desc','',['id'=>'article-ckeditor2','class'=>'form-control','placeholder'=> 'Your Description'])}}
									</div>
								{!! Form::close() !!}
							</div>

								<div class="form-group">
									<label>Choose your profile picture</label>
									<input type="file">
									<div>
											<br/>
									 <p class="help-block">Do not add any picture , it doesn't works</p>
									
									</div>
									</div>

								<div> 
									<br/>
									<br/>

							</div>
								<br/>
								<center> <button type="submit" style="width:20%;" class="btn btn-primary btn-lg">Submit</button> </center>																				
							</div>
						
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

	</div><!--/.main-->
@endsection