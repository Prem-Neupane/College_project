@extends('Admin.adminLayout.admin_design')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
        <div class="row">
                <ol class="breadcrumb">
                <li><a href="{{ url('teacher/add_profile') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                        <li class="active">Teacher's Profile</li>
                </ol>
        </div><!--.row-->

    <div class="row">
                <div class="col-lg-12">
                        <h1 class="page-header">Teacher's Profile</h1>
                </div>
        </div><!--/.row-->
        
        @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
                        
        @if(count($errors) > 0)
          @foreach($errors->all() as $error)
                  <div class="alert alert-danger"> {{ $error }}</div>
          @endforeach
        @endif
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="jpt"/>
                            {{-- style="width=100%" --}}
                            <img src="storage/image/{{$teacher->image}}" alt="{{$teacher->first_name}} {{$teacher->last_name}}"/>
                             {{ $teacher->image }} 
                            <div class="file btn ">
                                Update Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2>
                                        {{$teacher->first_name}} {{$teacher->last_name}}
                                    </h2>
                                    <h6>
                                        Teacher at Nepathya College
                                    </h6>
                                    <div class ="form-group">
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                                    </div>
                                <div class="">
                            <ul class="nav nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li> --}}
                                </ul>
                                </div>
                        </br>
                                <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Teacher Id: </label>
                                                </div>
                                                <div class="form-group col-md-6" aria-placeholder=" ">
                                                    <p>{{$teacher->id}}</p>
                                                </div>
                                            </div>
    
                                            <div class="row">
                                                <div class=" form-group col-md-6">
                                                    <label>Full Name: </label>
                                                </div>
                                                <div class=" form-group col-md-6">
                                                <p>{{$teacher->first_name}} {{$teacher->last_name}}</p>
                                                </div>
                                            </div>
    
                                             <div class="row">
                                                <div class=" form-group col-md-6">
                                                    <label>Username: </label>
                                                </div>
                                                <div class=" form-group col-md-6">
                                                    <p>{{$teacher->username}}</p>
                                                </div>
                                            </div>
    
                                            <div class="row">
                                                <div class=" form-group col-md-6">
                                                    <label>Contact No:</label>
                                                </div>
                                                <div class=" form-group col-md-6">
                                                <p>+977 {{$teacher->phone}}</p>
                                                </div>
                                            </div>
    
                                             <div class="row">
                                                <div class=" form-group col-md-6">
                                                    <label>Email:</label>
                                                </div>
                                                <div class=" form-group col-md-6">
                                                    <p>{{$teacher->email}}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class=" form-group col-md-6">
                                                    <label>Gender:</label>
                                                </div>
                                                <div class=" form-group col-md-6">
                                                    <p>{!! $teacher->gender !!}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class=" form-group col-md-6">
                                                    <label>Identity:</label>
                                                </div>
                                                <div class=" form-group col-md-6">
                                                    <p>{{$teacher->identity }}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class=" form-group col-md-6">
                                                    <label>Qualification:</label>
                                                </div>
                                                <div class=" form-group col-md-6">
                                                    <p>{!! $teacher->qualification !!}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class=" form-group col-md-6">
                                                    <label>Description:</label>
                                                </div>
                                                <div class=" form-group col-md-6">
                                                    <p>{!! $teacher->description !!}</p>
                                                </div>
                                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-2">
                  <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                </div> --}}
                             </div>
                           </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>

        {{-- <div class="row">
                        <div class="col-md-4">
                            <div class="profile-work">
                                <p>WORK LINK</p>
                                <a href="">Website Link</a><br/>
                                <a href="">Bootsnipp Profile</a><br/>
                                <a href="">Bootply Profile</a>
                                <p>SKILLS</p>
                                <a href="">Web Designer</a><br/>
                                <a href="">Web Developer</a><br/>
                                <a href="">WordPress</a><br/>
                                <a href="">WooCommerce</a><br/>
                                <a href="">PHP, .Net</a><br/>
                            </div>
                        </div> --}}
@endsection