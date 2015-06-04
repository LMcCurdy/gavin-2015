<?php get_header(); ?>
    <div class="orangeJuice">

    <h1>Oran<span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 400 600" enable-background="new 0 0 400 600" xml:space="preserve">
<path fill="#F47A20" d="M326.1,386.5c-40.4-11.6-169-18.8-189.9-24.5c-8.7-2.9-18-7.9-18-18.8c0-10.1,13-16.6,20.9-20.9
  c15.9,3.6,31.8,5.8,47.7,5.8c75.8,0,169.7-38.3,169.7-126.4c0-48.4-27.4-78-65.7-102.5c4.3-5.1,7.9-9.4,15.2-9.4
  c10.1,0,27.4,13,44.8,13c23.8,0,44.8-18.8,44.8-42.6c0-23.8-20.9-42.6-44-42.6c-39,0-74.4,37.5-91,70C238,81,214.9,76.7,191.1,76.7
  c-75.8,0-169.7,41.9-169.7,129.3c0,52,33.9,83.8,78.7,104l-6.5,3.6C64.7,328,25,343.9,25,382.1c0,35.4,25.3,47.6,52,62.8
  c-30.3,10.1-69.3,25.3-69.3,62.8c0,66.4,119.1,69.3,164.6,69.3c168.2,0,222.4-52.7,222.4-111.9C394.7,421.8,365.1,398,326.1,386.5z
   M125.4,198.7c0-41.9,19.5-93.9,68.6-93.9c50.5,0,65.7,62.1,65.7,102.5c0,42.6-18.8,92.4-67.9,92.4c-14.3,0-25.7-4.5-34.8-11.8
  c-16.1,6.2-47.8,18.3-47.8,18.4c0,0.1,21.3-25.2,32-37.4C129.5,248.4,125.4,221.1,125.4,198.7z M188.2,553.3
  c-36.1,0-98.2-4.3-98.2-54.2c0-19.5,11.6-34.7,26.7-46.2l117.7,17.3c65,7.2,71.5,14.4,71.5,35.4
  C305.9,551.8,219.3,553.3,188.2,553.3z"/>
</svg></span>e Juice</h1>
    <h2>eat. sleep. create. repeat.</h2>

    </div>

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

<div class="social-share">
<a href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>&via=gavinadv&text=I%20just%20read%20this%20awesome%20article%20on%20Orange%20Juice%20a%20blog%20by%20Gavin"><i class="fa fa-twitter"></i></a>
<a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php the_permalink();?>&p[images][0]=<?php echo $imgsrc; ?> &p[title]=<?php the_title(); ?> &p[summary]=<?php the_title(); ?>"  onclick="window.open('http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php the_permalink();?>&p[images][0]=<?php echo $imgsrc; ?> &p[title]=<?php the_title(); ?> &p[summary]=<?php the_title(); ?>', 'newwindow', 'width=600, height=600'); return false;"><i class="fa fa-facebook"></i></a>
</div>

</div>
    <p class="post-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </p>
    <p class="date"><?php the_date(); ?></p>
    <?php the_excerpt(); ?>
    </div>
  <?php endwhile; wp_reset_query(); ?>
<?php else: ?>
  <div class="wrap">
  <p>Whoops! There are currently no post within this category. You better believe our writers are hard at work to bring you new and fresh content. Check back again soon.</p>
  </div>
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
    <h3>Check Us Out<span>Socially</span></h3>
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