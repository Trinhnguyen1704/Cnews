@extends('templates.admin.master')
@section('title')
    Admin - Contact
@stop
@section('adminContent')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách Contact</h4>
                                <p class="category success"></p>
                                
                                
                                <a href="edit.html" class="addtop"><img src="/public/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Content</th>
                                        <th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $item)
                                        @php
                                            $id = $item->contact_id;
                                            $name = $item->name;
                                            $email = $item->email;
                                            $website = $item->website;
                                            $content = $item->content;
                                        @endphp
                                        <tr>
                                            <td>{{$id}}</td>
                                            <td><a href=""></a>{{$name}}</td>
                                            <td>{{$email}}</td>
                                            <td>{{$website}}</td>
                                            <td>
                                                <textarea>{{$content}}</textarea>
                                            <td>
                                                <a href=""><img src="/public/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                                <a href=""><img src="/public/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
 
                                </table>

                                <div class="text-center">
                                    {{$items->links()}}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@endsection
<script type="text/javascript">
    $(document).ready(function(){
         $("#contact").addClass('active');
    });
</script>