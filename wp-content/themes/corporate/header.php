<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="robots" content="index,follow" />
	<meta name="revisit-after" content="7 Days" />

	<title>
		<?php if ( is_home() ) { ?><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?><?php } ?>
		<?php if ( is_search() ) { ?><?php echo the_search_query(); ?> | <?php bloginfo('name'); ?><?php } ?>
		<?php if ( is_single() ) { ?><?php wp_title(''); ?> | <?php bloginfo('name'); ?><?php } ?>
		<?php if ( is_page() ) { ?><?php wp_title(''); ?> | <?php bloginfo('name'); ?><?php } ?>
		<?php if ( is_category() ) { ?>Archive <?php single_cat_title(); ?> | <?php bloginfo('name'); ?><?php } ?>
		<?php if ( is_month() ) { ?>Archive <?php the_time('F'); ?> | <?php bloginfo('name'); ?><?php } ?>
		<?php if ( is_tag() ) { ?><?php single_tag_title();?> | <?php bloginfo('name'); ?><?php } ?>
	</title>
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/screen.css" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/print.css" type="text/css" media="print" /> 
	<!--[if IE]>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css" type="text/css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />
	<!--[if lt IE 7]>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ielt7.css" type="text/css" media="screen, projection" />
	<![endif]-->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="shortcut icon" type="image/x-png" href="<?php bloginfo('template_url'); ?>/images/favicon.png" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php wp_head(); ?>	
</head>

<body>
	<div class="container">
		<div id="top" class="span-24">
			<div class="menu">
				<ul>
					<li class="page_item <?php if ( is_home() ) { ?>current_page_item<?php } ?>"><a href="<?php bloginfo('url'); ?>">Home</a></li>
					<?php wp_list_pages('title_li=&depth=-1&sort_column=menu_order'); ?>
					<li><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to RSS feed"><img src="<?php bloginfo('template_directory'); ?>/images/feed.png" alt="Subscribe to RSS feed" /></a></li>
				</ul>
			</div>
		</div>
		<div id="contenttop" class="span-24"></div>
		<div id="contentwrapper" class="span-24">
			<div id="header" class="span-22 prepend-1 append-1">
				<div id="title" class="span-15 prepend-1">
					<a href="<?php bloginfo('url'); ?>"><img class="logo" src="<?php bloginfo('template_directory'); ?>/images/logo.jpg" alt="<?php bloginfo('name'); ?>" /></a>
					<div id="blogtitle">
						<h1><?php bloginfo('name'); ?></h1>
						<h2><?php bloginfo('description'); ?></h2>
					</div>
				</div>
				<div id="searchbar" class="span-5 append-1 last">
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				</div>
			</div>
			
			<?php if (file_exists(TEMPLATEPATH . '/' . 'intro.html')) : ?>
			<div id="introcontainer" class="span-22 prepend-1 append-1 last">
				<div id="intro">
					<div id="introtext" class="span-15">
						<?php readintro('intro.html'); ?>
					</div>
					<img id="introicon" src="<?php bloginfo('template_directory'); ?>/images/people.png" alt="<?php bloginfo('description'); ?>" />
				</div>
			</div>
			<?php endif; ?>