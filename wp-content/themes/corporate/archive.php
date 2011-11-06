<?php get_header(); ?>

 <!-- posts  -->
<div id="posts" class="span-16 prepend-1 append-1">
	
	<div class="post">
	<div class="postheader">
	<div class="posttitle">
		<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; ?>
		<?php if (is_category()) { ?><h2>Archive for '<?php echo single_cat_title(); ?>'</h2>
		<?php } elseif (is_day()) { ?><h2>Archive for <?php the_time('F jS, Y'); ?></h2>
		<?php } elseif (is_month()) { ?><h2>Archive for <?php the_time('F, Y'); ?></h2>
		<?php } elseif (is_year()) { ?><h2>Archive for the year <?php the_time('Y'); ?></h2>
		<?php } elseif (is_tag()) { ?><h2>Tag: <?php single_tag_title(''); ?></h2>
		<?php } elseif (is_search()) { ?><h2>Search results</h2>
		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><h2>Archives</h2>
		<?php } ?>
	</div>
	</div>
	</div>

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