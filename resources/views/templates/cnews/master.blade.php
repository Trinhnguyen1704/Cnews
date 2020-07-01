@include('templates.cnews.header')
<div class="leftpanel">
	@widget('Leftbar')
</div>
<div class="rightpanel">
	<div class="rightbody">
		@yield('content')
	</div>
</div>
@include('templates.cnews.footer')			
			
