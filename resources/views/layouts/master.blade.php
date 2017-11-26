<!DOCTYPE html>
<html>
<head>
	<title>
        @yield("title", "Skincare Finder")
    </title>

	<meta charset='utf-8'>
    <link href='/css/skincare.css' type='text/css' rel='stylesheet'>
    @stack("head")

</head>

<body>
	
	@if(session('alert'))
        <div class='alert'>
            {{ session('alert') }}
        </div>
    @endif

	<header>
		<h1>Skincare Finder</h1>

		<nav>
			<ul>
				<li><a href='/'>Home</a></li>
				<li><a href='/skincare'>Find Skincare</a></li>
				<li><a href='/show-all'>See All Skincare</a></li>
				<li><a href='/show-all/create'>Add New Skincare</a></li>
			</ul>
		</nav>
	</header>

	<section>
		@yield("content")
	</section>

	<footer>
		&copy; Youjin Kim @Harvard Extension School {{ date("Y") }}
	</footer>

	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>

    @stack("body")

</body>
</html>