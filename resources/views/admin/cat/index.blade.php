@extends('templates.admin.master')
@section('title')
    Admin - Cat
@stop
@section('adminContent')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách Catagory</h4>
                                <p class="category success"></p>
                                
                                <a href="{{route('admin.cat.add')}}" class="addtop"><img src="/public/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID Cat</th>
                                        <th>Name</th>
                                        
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $item)
                                        @php
                                            $id = $item->cat_id;
                                            $name = $item->name;
                                            $slugCat = str_slug($name,'-');

                                            $msgEdit = '';
                                            $msgDel ="return confirm('Bạn có chắc muốn xóa không?')";
                                            if(Auth::check()){
                                                $user = Auth::user();
                                                $username = $user->username;
                                                if($username=='admin'){
                                                     $urlEdit = route('admin.cat.edit',[$id,$slugCat]);
                                                     $urlDel = route('admin.cat.del',$id);
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
                                            <td><a href=""></a>{{$name}}</td>
                                            
                                            <td>
                                                <a href="{{$urlEdit}}" onclick="{{$msgEdit}}"><img src="/public/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                                <a href="{{$urlDel}}"  onclick="{{$msgDel}}"><img src="/public/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
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
         $("#cat").addClass('active-menu');
    });
</script>