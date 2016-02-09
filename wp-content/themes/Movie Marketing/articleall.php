
<?php
/*
Template Name: articleall Template
*/
?>


<?php
get_header(); ?>
<div id="mainimage">
		<div id="catch">
	
				<p class="textlarge">
					<?php echo $cat_name; ?>
				</p>
		</div>
		<video id="movie" poster="<?php echo get_template_directory_uri(); ?>/img/video.png" autoplay loop>
			<source src="<?php echo get_template_directory_uri(); ?>/img/343014810.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
			<source src="<?php echo get_template_directory_uri(); ?>/img/343014810.webmhd.webm" type='video/webm; codecs="vp8, vorbis"'>
		</video>
		<div id="altVideo"><img src="<?php echo get_template_directory_uri(); ?>/img/video.png" alt="MAKE VALUE KEEP ALIVE"/></div>
</div>
	<!-- #mainimage -->
	<!-- #mainimage -->

	
<div id="content" class="sitedesign">
<h2 class="entry-title">全てのイベント</h2>
	<div class="contentblock">
		<div class="entry-content">
			<ul id="event"> 
				<?php
					 $articleall = $_GET['id'];
				?>
				<?php $args = array(
				  'posts_per_page'   => -1,
				  'offset'           => 0,
				  'category'         => $articleall,
				  'orderby'          => 'post_date',
				  'order'            => 'DESC',
				  'include'          => '',
				  'exclude'          => '',
				  'meta_key'         => '',
				  'meta_value'       => '',
				  'post_type'        => 'post',
				  'post_mime_type'   => '',
				  'post_parent'      => '',
				  'post_status'      => 'publish',
				  'suppress_filters' => true ); ?>
				<?php $myposts = get_posts( $args ); ?>
				<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		
			<li class="smallbox">

				<a href="<?php the_permalink() ?>">
					<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12">

								<?php
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id, true);
								?>
								<div class="allthumbnail">
									<div class="allcount-section">
			  							<div class="allpvcount">
										<?php if(function_exists('the_views')) {
										  the_views();
										} ?>
										</div>
									</div>
								<img src="<?php echo $image_url[0]; ?>"  text-align="center"  >
								</div>

							</div>
							</div>
					
						<div class="col-md-12 col-sm-12 col-xs-12 fontclass" ><?php the_title(); ?></div>
						
						
						<button  type="button" class="btn btn-danger">予約はこちら</button>
					</a>

					<div class="col-md-12 col-sm-12 col-xs-12">
							
			<?php endforeach; wp_reset_postdata(); ?>
			<div class="col-md-12 col-sm-12 col-xs-12">
								
			</li>

		</ul>



	</div>
</div>
</div>

<?php
get_footer(); ?>