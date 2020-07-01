<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/public/tempates/admin/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/public/tempates/admin/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>AdminCP - VinaEnter</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/public/templates/admin/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/public/templates/admin/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="/public/templates/admin/assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/public/templates/admin/assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/public/templates/admin/assets/css/themify-icons.css" rel="stylesheet">
    <script type="text/javascript" src="/public/libs/ckeditor/ckeditor.js"></script>

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://vinaenter.edu.vn" class="simple-text">AdminCP</a>
            </div>
            @php
                $arrCat = [
                    'user' => 'user',
                    'story'=> 'story',
                    'cat'  =>  'cat',
                    'contact' => 'contact'
                ];
                $uri = Request::fullUrl();
                foreach($arrCat as $cat){
                    if(strpos($uri,$cat)!=false){
                    $active = "color:red";
                }else{
                $active = '';
            }
            @endphp
            <ul class="nav">
            	<li id="{{$cat}}">
                    <a href="{{route('admin.'.$cat.'.index')}}" style="{{$active}}">
                        <i class="ti-map"></i>
                        <p>Danh sách {{$cat}}</p>
                    </a>
                </li>
            @php
                }
            @endphp
            	
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                @php
                    if(Auth::check()){
                    $user = Auth::user();
                    $username = $user->username;
                    $link  =  route('auth.logout');
                    $text = "Logout";
                }else{
                 $username = "Khach";
                 $link  =  route('auth.login');
                 $text = "Login";
                }
                @endphp
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('admin.user.index')}}">Chao, {{$username}}</a>
                     <a class="navbar-brand" href="{{$link}}">{{$text}}</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
						<li>
                            <a href="http://vinenter.edu.vn">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

