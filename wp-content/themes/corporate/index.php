<?php get_header(); ?>



 <!-- posts  -->
<div id="posts" class="span-16 prepend-1 append-1">
	<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
	
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="postheader">
				<div class="commentcount">
					<a href="<?php comments_link(); ?>">
						<img src="<?php bloginfo('template_directory'); ?>/images/commentsicon.gif" alt="<?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments')); ?>" />
						<?php comments_number(__('0'), __('1'), __('%')) ?>
					</a>
				</div>
				<div class="posttitle">
					<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<span class="postmeta"><?php the_time('l, F jS, Y'); ?> | <?php the_category(', '); ?> |  <?php the_author_link(); ?> </span>
				</div>
			</div>
			<div class="postcontent"><?php the_content(__('<br/>Continue reading...')); ?></div>
			<div class="posttags"><?php the_tags('Tags: ', ', ', ''); ?></div>
		</div>
		
	<?php endwhile; ?>
	
	<div class="navlinks">
		<?php next_posts_link('&laquo; Previous posts') ?> <?php previous_posts_link('Next posts &raquo;') ?><br/><br/>
		<a href="#posts"><img src="<?php bloginfo('template_directory'); ?>/images/backtotopicon.gif" alt="Back to top" />Back to top</a>
	</div>
	
	<?php else : ?>
	
	<div class="post">
		<h2>Not found!</h2>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>	
	</div>
		
<?php endif; ?>
</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>