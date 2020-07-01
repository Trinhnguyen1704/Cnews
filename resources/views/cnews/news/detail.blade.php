@extends('templates.cnews.master')
@section('title')
	Danh sách truyện - Cnews
@stop
@section('content')
@php
    $id = $itemDetail->story_id;
    $cat_id = $itemDetail->cat_id;
    
    $counter = $itemDetail->counter;
    $name = $itemDetail->name; 
    $detail = $itemDetail->detail_text;  
    
@endphp
<h1 class="title">{{$name}}</h1>
						<div class="items-new">
							<div class="new-detail">
								<p>{!!$detail!!}</p>
							</div>
							<p><strong>Lượt đọc {{$counter}}</strong></p>
						</div>
						
						<h2 class="title" style="margin-top:30px;color:#BBB">Tin tức liên quan</h2>
						<div class="items-new">
							<ul>
								@foreach($sameNews as $item)
								@php
									$sameNewsid = $item->story_id;
									$name = $item->name; 
									$preview = $item->preview_text;
									$cat_id = $item->cat_id;
									$slugStory = str_slug($name,'-');
									$urlDetail1=route('cnews.news.detail',[$sameNewsid,$cat_id,$slugStory]);
									$picture = $item->picture;
								@endphp
								<li>
									<h2>
										<a href="{{$urlDetail1}}" title="Trọng tài - vết đen của kỳ World Cup sôi động ">{{$name}} </a>
									</h2>
									<div class="item">
										<a href="{{$urlDetail1}}" title="Trọng tài - vết đen của kỳ World Cup sôi động "><img src="/storage/app/public/story/{{$picture}}" alt="Trọng tài - vết đen của kỳ World Cup sôi động "></a>
										<p>{!!$preview!!}</p>
										
										<div class="clr"></div>
									</div>
								</li>
								@endforeach

							</ul>
						</div>
@endsection