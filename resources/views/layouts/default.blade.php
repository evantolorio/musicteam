<!DOCTYPE html>
<html>
	<head>
		<title> @yield('title') </title>

		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Style sheets -->
		<link href="/css/icon.css" rel="stylesheet" type="text/css">
		<link href="/css/materialize.min.css" rel="stylesheet" type="text/css">
		<link href="/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Navigation Bar -->

        <nav class="navbar-fixed">
            <div class="nav-wrapper" style="background-color:#2680e1;">
                <a href="#" class="brand-logo center">
					<img src="images/music_logo.png" width="50" height="50" class="left" alt="" style="margin-top:.5rem;">
					Victory Los Baños Music Team
				</a>
            </div>
        </nav>

        @yield('content')

		<script src="/js/vue.js" charset="utf-8"></script>
		<script src="/js/vue-resource.min.js" charset="utf-8"></script>
		<source src="/js/sortable.min.js" type="utf-8">
		<source src="/js/vuedraggable.min.js" type="utf-8">
		<script src="/js/jquery.min.js" charset="utf-8"></script>
		<script src="/js/materialize.min.js" charset="utf-8"></script>
		<script src="/js/lodash.min.js" charset="utf-8"></script>
        @yield('customScripts')
	</body>
</html>
