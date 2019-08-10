<html>
	<head>
		<title><?=$page_title?></title>
		<link rel="shortcut icon" href="/img/favicon.png" />
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/css/fa/css/all.css"/>
		<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129727756-2"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-129727756-2');
		</script>
		
		<!-- Google AdSense -->
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "ca-pub-9751606253270391",
			enable_page_level_ads: true
		  });
		</script>
		
		<link rel="stylesheet" type="text/css" href="/css/default.css"/>
		<script type="text/javascript" src="/js/default.js"></script>
		<?php if (isset($js_list)) { foreach ($js_list as $js) { ?> <script type="text/javascript" src="/js/<?=$js?>.js"></script> <?php } } ?>
		<?php if (isset($css_list)) { foreach ($css_list as $css) { ?> <link rel="stylesheet" type="text/css" href="/css/<?=$css?>.css"/> <?php } } ?>
		
	</head>
	<body class="d-flex flex-column">
		<div id="page-content" class="container-fluid d-flex flex-column">
			<div id="kpm-header" class="pt-3 text-white mb-4">
				<div class="text-right text-bottom pr-4">
					<h1>Hi! I'm Kenji!</h1>
					<h2>and welcome to my site</h2>
				</div>
				<nav id="kpm-nav" class="pt-5 nav justify-content-center font-weight-bold">
					<a class="nav-link text-decoration-none text-white" href="/thought/"><h2><small>Thoughts</small></h2></a>
					<span class="nav-link"><h2><small></small></h2></span>
					<a class="nav-link text-decoration-none text-white" href="/"><h2><small>Guitar Tab</small></h2></a>
					<span class="nav-link"><h2><small></small></h2></span>
					<a class="nav-link text-decoration-none text-white" href="/portfolio/"><h2><small>Portfolio</small></h2></a>
					<span class="nav-link"><h2><small></small></h2></span>
					<a class="nav-link text-decoration-none text-white" href="/contact/"><h2><small>Contact</small></h2></a>
					<span class="nav-link"><h2><small></small></h2></span>
					<a class="nav-link text-decoration-none text-white" href="/about/"><h2><small>About Me</small></h2></a>
				</nav>
			</div>
			<div id="kpm-body" class="row">