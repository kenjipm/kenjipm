<html>
	<head>
		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimal-ui">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="theme-color" content="#E0E0E0">
		<title><?=$page_title?></title>
		<link rel="manifest" href="<?=base_url('manifest.json')?>">
		<link rel="shortcut icon" href="<?=base_url('img/favicon.png')?>" />
		<link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css')?>"/>
		<link rel="stylesheet" type="text/css" href="<?=base_url('css/fa/css/all.css')?>"/>
		<script type="text/javascript" src="<?=base_url('js/jquery-3.4.1.min.js')?>"></script>
		<script type="text/javascript" src="<?=base_url('js/popper.min.js')?>"></script>
		<script type="text/javascript" src="<?=base_url('js/bootstrap.min.js')?>"></script>
		
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
		
		<link rel="stylesheet" type="text/css" href="<?=base_url('css/default.css')?>"/>
		<?php
			if ($_SERVER['SERVER_NAME'] != "localhost") {
				?>
				<script type="text/javascript" src="<?=base_url('js/serviceworker.js')?>"></script>
				<?php
			}
		?>
		<script type="text/javascript" src="<?=base_url('js/default.js')?>"></script>
		<?php if (isset($js_list)) { foreach ($js_list as $js) { ?> <script type="text/javascript" src="<?=base_url('js/'.$js.'.js')?>"></script> <?php } } ?>
		<?php if (isset($css_list)) { foreach ($css_list as $css) { ?> <link rel="stylesheet" type="text/css" href="<?=base_url('css/'.$css.'.css')?>"/> <?php } } ?>
		
	</head>
	<body class="d-flex flex-column">
		<div id="page-content" class="container-fluid d-flex flex-column">
			<div id="kpm-header" class="pt-3 text-white">
				<div class="text-right text-bottom pr-4">
					<h1>Hi! I'm Kenji!</h1>
					<h2>and welcome to my site</h2>
				</div>
				<nav id="kpm-nav" class="pt-5 nav justify-content-center font-weight-bold">
					<a class="nav-link text-decoration-none text-white" href="<?=base_url('thought/')?>"><h2><small>Thoughts</small></h2></a>
					<span class="nav-link"><h2><small></small></h2></span>
					<a class="nav-link text-decoration-none text-white" href="<?=base_url('/')?>"><h2><small>Guitar Tab</small></h2></a>
					<span class="nav-link"><h2><small></small></h2></span>
					<a class="nav-link text-decoration-none text-white" href="<?=base_url('/portfolio/')?>"><h2><small>Portfolio</small></h2></a>
					<span class="nav-link"><h2><small></small></h2></span>
					<a class="nav-link text-decoration-none text-white" href="<?=base_url('/contact/')?>"><h2><small>Contact</small></h2></a>
					<span class="nav-link"><h2><small></small></h2></span>
					<a class="nav-link text-decoration-none text-white" href="<?=base_url('/about/')?>"><h2><small>About Me</small></h2></a>
				</nav>
			</div>
			<div id="kpm-body" class="row pt-4">