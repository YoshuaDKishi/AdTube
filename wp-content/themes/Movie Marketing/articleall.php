
<?php
/*
Template Name: articleall Template
*/
?>


<?php 
	get_header(); 
?>


<?php
	$articleall = $_GET['id'];

?>




<div id="content" class="allsitedesign">
	<center>
		<h2 class="entry-title">おすすめのコンテンツ</h2>
	</center>
<div class="topcontent col-md-12 col-sm-12 col-xs-12">

</div>


	<div class="contentblock">
		<div class="entry-content">
			<ul id="event" class="col-md-9 col-sm-9 col-xs-12"> 

				<?php $myposts = getPostByCatId($articleall, -1); ?>
				<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		
			<li class="smallbox hvr-ripple-out">

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
										<?php the_title(); ?>
										</div>
									</div>
								<img src="<?php echo $image_url[0]; ?>"  text-align="center"  >
								</div>

							</div>
					</div>
				
					
					</a>

					<div class="col-md-12 col-sm-12 col-xs-12">
							
			<?php endforeach; wp_reset_postdata(); ?>
			<div class="col-md-12 col-sm-12 col-xs-12">
								
			</li>

		</ul>
		<ul class="col-md-3 col-sm-3 col-xs-12">
			<?php
			get_sidebar(); ?>
		</ul>


	</div>
</div>
</div>

<?php
get_footer(); ?>