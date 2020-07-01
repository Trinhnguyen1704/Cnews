@extends('templates.cnews.master')
@section('title')
	Trang chủ - Cnews
@stop
@section('content')
<h1 class="title">Tin tức</h1>
						<div class="items-new">
							<ul>
								@foreach($story as $item)
								@php
									$id  = $item->story_id;
									$name = $item->name;
									$counter  = $item->counter;
									$preview = $item->preview_text;
									$cat_id  = $item->cat_id;
									$picture  = $item->picture;
									$slugStory = str_slug($name,'-');
									$urlDetail = route('cnews.news.detail',[$id,$cat_id,$slugStory]);
								@endphp
								
								<li>
									<h2>
										<a href="{{$urlDetail}}" title="">{{$name}}</a>
									</h2>
									<div class="item">
										<a href="{{$urlDetail}}" title=""><img src="/storage/app/public/story/{{$picture}}" alt="" /></a>
										<p>{!!$preview!!}</p>
										<div class="clr"></div>
									</div>
									<p><strong>Lượt đọc: {{$counter}}</strong></p>
								</li>
								
								
								@endforeach
							</ul>
							
							<div class="paginator">
								{{$story->links()}}
							</div>
						</div>
@endsection
