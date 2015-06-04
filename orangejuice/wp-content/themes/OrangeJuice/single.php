<?php get_header(); ?>
<div class="cat-bar clearfix">
<?php 
    $args = array(
  'hide_empty'         => 0,
  'use_desc_for_title' => 1,
  'style'              => 'none',
  'title_li'           => __( '' )
    );
    wp_list_categories( $args ); 
?>

<form method="get" action="<?php bloginfo('url'); ?>/">
<button type="submit" class="btn btn-success">
                <i class="fa fa-search"></i>
            </button>
  <input name="s" type="text" placeholder="Search" />
</form>
</div>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="featured-header">
<?php if ( has_post_thumbnail() ) {
  the_post_thumbnail();
} ?>
<div class="social-share-single">
<a href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>&via=gavinadv&text=I%20just%20read%20this%20awesome%20article%20on%20Orange%20Juice%20a%20blog%20by%20Gavin"><i class="fa fa-twitter"></i></a>
<a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php the_permalink();?>&p[images][0]=<?php echo $imgsrc; ?> &p[title]=<?php the_title(); ?> &p[summary]=<?php the_title(); ?>"  onclick="window.open('http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php the_permalink();?>&p[images][0]=<?php echo $imgsrc; ?> &p[title]=<?php the_title(); ?> &p[summary]=<?php the_title(); ?>', 'newwindow', 'width=600, height=600'); return false;"><i class="fa fa-facebook"></i></a>
</div>
</div>

<div class="post-title-block">
  <h1><?php the_title(); ?></h1>
</div>

<div class="wrap clearfix">
<div class="date-big">
<p><?php the_date(); ?></p>
</div>
<div class="first-content">
<?php the_content(); ?>
</div>
</div>


<?php if( get_field('mid_page_big_text') ): ?>			
<div class="big-middle">
<p><?php the_field('mid_page_big_text'); ?></p>
</div>
<?php endif; ?>

<?php if( get_field('second_half_of_blog_post') ): ?>
	<div class="wrap clearfix">
<div class="second-content">
<?php the_field('second_half_of_blog_post'); ?>
</div>
</div>
<?php endif; ?>
<div class="wrap clearfix">
<div class="social-share-bottom">
<a href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>&via=gavinadv&text=I%20just%20read%20this%20awesome%20article%20on%20Orange%20Juice%20a%20blog%20by%20Gavin"><i class="fa fa-twitter"></i></a>
<a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php the_permalink();?>&p[images][0]=<?php echo $imgsrc; ?> &p[title]=<?php the_title(); ?> &p[summary]=<?php the_title(); ?>"  onclick="window.open('http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php the_permalink();?>&p[images][0]=<?php echo $imgsrc; ?> &p[title]=<?php the_title(); ?> &p[summary]=<?php the_title(); ?>', 'newwindow', 'width=600, height=600'); return false;"><i class="fa fa-facebook"></i></a>
<p>Share This Post</p>
</div>
</div>

<?php endwhile; wp_reset_query(); ?>


 <?php $prevPost = get_previous_post(true);
					if($prevPost) {?>
					<div class="next-link-f"><?php previous_post_link('%link',"NEXT ARTICLE", TRUE); ?></div>
					<div class="prev-box">
                    <?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID);}?>
                    <?php previous_post_link('%link',"%title", TRUE); ?>
                    <?php echo $prevthumbnail ?>
                    </div>



<?php get_footer(); ?>