@extends('templates.admin.master')
@section('title')
    Admin - Cnews | Friend Edit
@stop
@section('adminContent')
@php
    
@endphp
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            
                            <div class="content">
                                @if(Session::has('msg'))
                                <p>{{Session::get('msg')}}</p>
                                @endif
                                <form action="{{route('auth.login')}}" method="post">
                                    {{csrf_field()}}
                                   
                                     <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input" placeholder="Username" value="">
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control border-input" placeholder="Password" value="">
                                            </div>
                                        </div>    
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thực hiện" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@endsection