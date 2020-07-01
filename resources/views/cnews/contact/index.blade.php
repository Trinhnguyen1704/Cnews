@php
	if(isset($msg)){
@endphp
<script type="text/javascript">
	alert('{{$msg}}');
</script>
@php
}
@endphp
@extends('templates.cnews.master')
@section('title')
	Trang chủ - Cnews
@stop
@section('content')
<h1 class="title">Gửi liên hệ</h1>
		<div class="items-new">
			@if ($errors->any())
    			<div class="alert alert-danger">
        		    <ul>
           		        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
        	            @endforeach
                    </ul>
   		        </div>
			@endif
			<form action="{{route('cnews.contact.contact')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<p>Nếu bạn có thắc mắc, vui lòng liên hệ đến chúng tôi qua form liên hệ sau: <br /></p>
				<table class="contact">
					<tr>
						<td width="30%">Họ tên: </td>
						<td>
							<input type="text" name="name" value="" />
						</td>
					</tr>
					<tr>
						<td>Website: 	</td>
						<td>
							<input type="text" name="web" value="" />
						</td>
					</tr>
					<tr>
						<td>Email: </td>
						<td>
							<input type="text" name="email" value="" />
						</td>
					</tr>
					
					<tr>
						<td>Nội dung: </td>
						<td>
							<textarea cols="30" rows="3" name="content"></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="submit" value="Gửi liên hệ" />
						</td>
					</tr>
				</table>	
			</form>
		</div>
@endsection