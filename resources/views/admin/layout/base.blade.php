<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Admin Panel - </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="/css/all.css">



<script src="https://use.fontawesome.com/2e638a8146.js"></script>



</head>
<body data-page-id="@yield('data-page-id')">
    

@include('includes.admin-sidebar')




<div class="off-canvas-content admin_title_bar" data-off-canvas-content>
    <!-- Your page content lives here -->
    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas" title="Title"></button>
            <span class="title-bar-title">{{$_ENV['APP_NAME']}}</span>
        </div>
    </div>

   @yield('content')
</div>

<script src="/js/all.js"></script>
</body>
</html>