<?php get_header(); ?>

 <!-- posts  -->
<div id="posts" class="span-16 prepend-1 append-1">
	<div class="post">
		<h2>Archives by Month:</h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</div>
	<div class="post">
		<h2>Archives by Subject:</h2>
		<ul>
				<?php wp_list_categories('title_li='); ?>
		</ul>
	</div>
</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>