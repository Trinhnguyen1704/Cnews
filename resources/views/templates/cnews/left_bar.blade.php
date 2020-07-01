<h2>Danh mục tin</h2>
<ul>
	 @foreach ($items as $item)
        @php
            $id = $item->cat_id;
            $name = $item->name;
            $slug = str_slug($name,'-');
            $urlCat = route('cnews.news.cat',[$slug,$id]);
        @endphp
		<li><a href="{{$urlCat}}">{{$name}}</a></li>
	@endforeach
</ul>
