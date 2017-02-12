<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> @yield('title') </title>

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
		<script src="/js/jquery.min.js" charset="utf-8"></script>
		<script src="/js/materialize.min.js" charset="utf-8"></script>
		<script src="/js/lodash.min.js" charset="utf-8"></script>
        @yield('customScripts')
	</body>
</html>
