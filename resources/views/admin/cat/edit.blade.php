@extends('templates.admin.master')
@section('title')
    Admin - Cnews | Cat Edit
@stop
@section('adminContent')
@php
    $id = $item->cat_id;
    $cname = $item->name; 
    $slugCat = str_slug($cname,'-');
@endphp
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa User</h4>
                            </div>
                            <div class="content">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('admin.cat.edit', [$id,$slugCat])}}" method="post">
                                {{csrf_field()}}
                                    <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <p>{{$id}}</p>
                                            </div>
                                        </div>    
                                    </div>
                                     <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Cat Name</label>
                                                <input type="text" name="cname" class="form-control border-input" placeholder="Username" value="{{$cname}}">
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