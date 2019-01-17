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

@endsection