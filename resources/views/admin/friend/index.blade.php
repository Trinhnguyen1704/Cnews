@extends('templates.admin.master')
@section('title')
    Admin - Cnews| User
@stop
@section('adminContent')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách User</h4>
                                <p class="category success"></p>
                                
                                
                                <a href="{{route('admin.user.add')}}" class="addtop"><img src="/public/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Username</th>
                                        <th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $item)
                                        @php
                                            $id = $item->id;
                                            $fullname = $item->fullname;
                                            $username1 = $item->username;
                                            $slugUser = str_slug($fullname,'-');

                                            $msgEdit = '';
                                            $msgDel ="return confirm('Bạn có chắc muốn xóa không?')";
                                            if(Auth::check()){
                                                $user = Auth::user();
                                                 $username = $user->username;
                                                 if($username=='admin'){
                                                    $urlEdit = route('admin.user.edit',[$id,$slugUser]);
                                                    $urlDel = route('admin.user.del',$id);
                                                }else{
                                            
                                                $urlEdit = "#";
                                                $urlDel = "#";
                                                $msgEdit = "return alert('Bạn không được quyền chỉnh sửa hoặc xóa!')";
                                                $msgDel = "return alert('Bạn không được quyền chỉnh sửa hoặc xóa!')";
                                            }
                                        }
                                        @endphp
                                        <tr>
                                            <td>{{$id}}</td>
                                            <td><a href="{{$urlEdit}}">{{$fullname}}</a></td>
                                            <td>{{$username1}}</td>
                                            <td>
                                                <a href="{{$urlEdit}}" onclick="{{$msgEdit}}"><img src="/public/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                                <a href="{{$urlDel}}" onclick="{{$msgDel}}"><img src="/public/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
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
         $("#user").addClass('active');
    });
</script>