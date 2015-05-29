<?php get_header(); ?>

<h1><?php printf( __( 'Search Results for: %s' ), '' . get_search_query() . '' ); ?></h1>


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


<div class="clearfix">
<?php if ( have_posts() ): ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="blog-post-con">
    <div class="post-thumb">
    <?php // check if the post has a Post Thumbnail assigned to it.
if ( has_post_thumbnail() ) {
  the_post_thumbnail();
} ?>
</div>
    <p class="post-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </p>
    <p class="date"><?php the_date(); ?></p>
    <?php the_excerpt(); ?>
    </div>
  <?php endwhile; wp_reset_query(); ?>
<?php else: ?>
  <p>No posts found</p>
<?php endif; ?>
</div>


<div class="prev-next-con clearfix">
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <div class="prev">
    <?php next_posts_link( __( 'Older posts' ) ); ?>
  </div>
  <div class="next">
    <?php previous_posts_link( __( 'Newer posts' ) ); ?>
  </div>
<?php endif; ?>
</div>

<div class="team clearfix">
<div id="driving-action" class="grid-12">
    <h3>Keep up with what’s going down in the<span>social media world</span></h3>
</div>
</div>
<div class="tall-social">

<div class="facebook-t">
<a target="_social" href="//www.facebook.com/GavinAdvertising" ><i class="fa fa-facebook"></i></a>
</div>


<div class="blog-t">
<a target="_social" href="#"><i class="fa fa-comments-o"></i></a>
</div>

<div class="twitter-t">
<a target="_social" href="//twitter.com/gavinadv"><i class="fa fa-twitter"></i></a>
</div>


<div class="ig-t">
<a target="_social" href="//instagram.com/gavinadvertising"><i class="fa fa-instagram"></i></a>
</div>


</div>

<?php get_footer(); ?>
