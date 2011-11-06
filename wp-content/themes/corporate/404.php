<?php get_header(); ?>

 <!-- posts  -->
<div id="posts" class="span-16 prepend-1 append-1">
	<div class="post">
		<h2>Not found!</h2>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>	
	</div>		
</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>