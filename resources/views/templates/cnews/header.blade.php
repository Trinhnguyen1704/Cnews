<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>@yield('title','Trang chủ')</title>
<meta name="description" content="Thiet ke website, dao tap lap trinh">
<meta name="keywords" content="hiet ke website, dao tap lap trinh">
<link href="/public/templates/cnews/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="main">
		<div class="page">
			<div class="header">
				<div class="header-img">
					<img src="/public/templates/cnews/images/header.jpg" alt="" />
				</div>
				<div class="topmenu">
					<ul>
						<li><a href="{{route('cnews.index.index')}}">Trang chủ</a></li>
						<li><a href="{{route('cnews.news.index')}}">Danh sách truyện</a></li>
						<li><a href="{{route('cnews.contact.index')}}">Liên hệ</a></li>
					</ul>
				</div>
			</div>
			<div class="content">