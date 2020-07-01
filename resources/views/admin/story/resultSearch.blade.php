@extends('templates.admin.master')
@section('title')
    Admin - Story
@stop
@section('adminContent')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách Story</h4>
                                <p class="category success">Thêm thành công</p>
                            
                                <form action="{{route('admin.story.search')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control border-input" placeholder="Tên truyện" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="cname" class="form-control border-input">
                                                    <option>-- Chọn danh mục --</option>
                                                     @foreach ($cat as $catItem)
                                                    @php
                                                       
                                                        $name = $catItem->name;
                                                        
                                                    @endphp
                                                    <option>{{$name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="submit" name="search" value="Tìm kiếm" class="is" />
                                               
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                <a href="{{route('admin.story.add')}}" class="addtop"><img src="/public/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID Story</th>
                                        <th>Name</th>
                                        <th>Picture</th>
                                        <th>Counter</th>
                                        <th>Cat</th>
                                        <th>Create at</th>
                                        <th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($resultSearch as $item)
                                        @php
                                            $id = $item->story_id;
                                            $name = $item->sname;
                                            $preview = $item->preview_text;
                                            $detail = $item->detail_text;
                                            $counter = $item->counter;
                                            $cat_id = $item->cat_id;
                                            $create = $item->created_at; 
                                            $nameCat = $item->cname;
                                            $picture = $item->picture;
                                            $slugName = str_slug($name,'-');

                                            $msgEdit = '';
                                            $msgDel ="return confirm('Bạn có chắc muốn xóa không?')";
                                        if(Auth::check()){
                                            $user = Auth::user();
                                            $username = $user->username;
                                            if($username=='admin'){
                                            $urlEdit = route('admin.story.edit',[$id,$slugName]);
                                            $urlDel = route('admin.story.del',$id);

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
                                                <img src="/storage/app/public/story/{{$picture}}" width="70px" height="80px" />
                                            </td>
                                            <td>{{$counter}}</td>
                                            <td>{{$nameCat}}</td>
                                            <td>{{$create}}</td>
                                            <td>
                                                <a href="{{$urlEdit}}" onclick="{{$msgEdit}}"><img src="/public/templates/admin/assets/img/edit.gif" alt=""  /> Sửa</a> &nbsp;||&nbsp;
                                                <a href="{{$urlDel}}" onclick="{{$msgDel}}"><img src="/public/templates/admin/assets/img/del.gif" alt=""  /> Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                     
                                </table>
                                
                                <div class="text-center">
                                    
                                    {{ $resultSearch->appends(Request::all())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
         $("#story").addClass('active');
    });
</script>
@stop

