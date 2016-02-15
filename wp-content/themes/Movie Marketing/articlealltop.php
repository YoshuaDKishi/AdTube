
<?php
/*
Template Name: articlealltop Template
*/
?>


<?php 
	get_header(); 
?>


<?php
	$articleall = $_GET['id'];

?>

<div class="alltopsitedesign">
	<div class="alltopsitedesign">
		<div class="contentblockx">
			<center>
			<h2 class="entry-title">おすすめのコンテンツ</h2>
			</center>
		<div class="topcontent col-md-9 col-sm-9 col-xs-12">
	    <?php $myposts = getPostByCatId(25, 1,rand); ?>
	      <?php  foreach ( $myposts as $post ) : setup_postdata( $post )  ;  
	        ?> 
	          <a href="<?php the_permalink() ?>">
	            <div class="boxdesign hvr-ripple-out">  
	              <div class="col-md-12 col-sm-12 col-xs-12">   
	                <div class="topthumbnail">
	                  <?php
	                  $image_id = get_post_thumbnail_id();
	                  $image_url = wp_get_attachment_image_src($image_id, true);
	                  ?>            
	                    <div class="count-section">
	                      <div class="pvcount">
	                          <?php the_title(); ?>
	                      </div>
	                      <!--pvcount-->
	                    </div>
	                    <!--count-section-->
	                  <img src="<?php echo $image_url[0]; ?>">
	                </div>
	                <!--thumbnail-->
	              </div>
	                <!--col-md-12 col-sm-12 col-xs-12-->        
	      	<?php  wp_reset_postdata();
	      	endforeach; ?>
	       
	         </div>
			<!--boxdesign-->   
	        </a>   
	      </div>
	      <!--topcontent-->
			<ul class="col-md-3 col-sm-3 col-xs-12" >
						<?php
						get_sidebar(); ?>
			</ul>
		</div>
		<!--contentblockx-->
	</div>
	<div class="alltopsitedesign">
		<div class="contentblock">
			<div class="entry-content">
				<ul id="event" class="col-md-12 col-sm-12 col-xs-12"> 
						<center>
			<h2 class="entry-title">全てのコンテンツ</h2>
			</center>
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

					<?php endforeach; wp_reset_postdata(); ?>				
				</li>

			</ul>
		

			</div>
		</div>
	</div>

</div>

<?php 
	get_footer(); 
?>

