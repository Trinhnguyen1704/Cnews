@extends('templates.admin.master')
@section('title')
    Admin - Cnews | Cat Edit
@stop
@section('adminContent')

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm Danh mục tin</h4>
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
                                @php
                                    if(isset($msg)){
                                    echo $msg;
                                }
                                @endphp
                                <form action="{{route('admin.cat.add')}}" method="post">
                                    {{csrf_field()}}
                                     
                                   
                                     <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tên danh mục</label>
                                                <input type="text" name="cname" class="form-control border-input" placeholder="Tên danh mục" value="">
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