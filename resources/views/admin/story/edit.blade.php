@extends('templates.admin.master')
@section('title')
    Admin - Story Edit
@stop
@section('adminContent')
@php
    $id = $item->story_id;
    $name = $item->name; 
    $preview = $item->preview_text;
    $detail = $item->detail_text;   
    $picture  = $item->picture;  
    $counter = $item->counter; 
    $nameCat = $item->cname;
    $create = $item->created_at;
    $slugName = str_slug($name,'-');
@endphp
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa Story</h4>
                            </div>
                            <div class="content">
                                <form action="{{route('admin.story.edit', [$id,$slugName])}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tên truyện</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Tên truyện" value="{{$name}}">
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Preview Text</label>
                                                <textarea id="txt1" class="form-control border-input" name="preview" style="width: 100%; height: 100px">{!!$preview!!}</textarea>
                                            </div>
                                        </div>    
                                    </div>
                                     <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Detail Text</label>
                                                <textarea id="txt2" class="form-control border-input" name="detail" style="width: 100%;height: 200px">{!!$detail!!}</textarea>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <img src="/storage/app/public/story/{{$picture}}"/>
                                                <input type="file" name="picture" class="form-control border-input" placeholder="Ảnh" value="">
                                            </div>
                                        </div>    
                                    </div>
                                   
                                     <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tên danh mục</label>
                                                <select name="cname">
                                                    @foreach($cat as $catItem)
                                                    <option>{{$catItem->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>    
                                    </div>
                                     <div class="row">
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ngày tạo</label>
                                                <input type="text" name="created_at" class="form-control border-input" placeholder="Password" value="{{$create}}">
                                            </div>
                                        </div>    
                                    </div>

                                    
                                    
                                    
                                    
                                   
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thực hiện" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                                <script type="text/javascript">
                                    CKEDITOR.replace('txt1',{
                                         filebrowserBrowseUrl: '{{ asset('/public/libs/ckfinder/ckfinder.html') }}',
                                        filebrowserImageBrowseUrl: '{{ asset('/public/libs/ckfinder/ckfinder.html?type=Images') }}',
                                        filebrowserFlashBrowseUrl: '{{ asset('/public/libs/ckfinder/ckfinder.html?type=Flash') }}',
                                        filebrowserUploadUrl: '{{ asset('/public/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                                        filebrowserImageUploadUrl: '{{ asset('/public/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                                        filebrowserFlashUploadUrl: '{{ asset('/public/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                                    });
                                     CKEDITOR.replace('txt2',{
                                         filebrowserBrowseUrl: '{{ asset('/public/libs/ckfinder/ckfinder.html') }}',
                                        filebrowserImageBrowseUrl: '{{ asset('/public/libs/ckfinder/ckfinder.html?type=Images') }}',
                                        filebrowserFlashBrowseUrl: '{{ asset('/public/libs/ckfinder/ckfinder.html?type=Flash') }}',
                                        filebrowserUploadUrl: '{{ asset('/public/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                                        filebrowserImageUploadUrl: '{{ asset('/public/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                                        filebrowserFlashUploadUrl: '{{ asset('/public/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                                     });
                                </script>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@endsection