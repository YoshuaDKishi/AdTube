
<?php
/*
Template Name: companyDisplay Template
*/
?>


<?php 
	get_header(); 
?>


<?php
	$articleall = $_GET['id'];

?>

<div class="contentblocks">


<div class="alltopsitedesign">
	<div class="alltopsitedesignx">
		<div class="contentblock">
			<center>
			<h2 class="entry-title">おすすめのコンテンツ</h2>
			</center>
		<div class="topcontent col-md-9 col-sm-9 col-xs-12">
	    <?php $myposts = getPostByCatId($articleall, 1, rand); ?>
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

	      	<div class="col-md-3 col-sm-3 col-xs-12">
			<?php
			get_sidebar(); ?>
		</div>
		
		</div>

		<!--contentblockx-->
	</div>


	<div class="contentblock">
		
		<div class="entry-content">
			<div class="lime">
		<div class="dividerLine"></div>
		</div>
		 <?php $myposts = getPostByCatId($articleall, 1, rand); ?>
	      <?php  foreach ( $myposts as $post ) : setup_postdata( $post )  ;  
	        ?> 
		<center>
			<h2 class="entry-title">全ての動画</h2>
			</center>
			　<table>

  <thead>
    <tr>
    <th>広告主</th>
    <th>プログラム名</th>
    <th>成果報酬</th>
    <th>審査</th>
    <th>成果確定目安</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td data-label="広告主"></td>
    <td data-label="プログラム名"><?php the_title(); ?></td>
    <td data-label="場所">大阪府大阪市どこどこ</td>
    <td data-label="料金">1,000円</td>
    </tr>
    <tr>
    <td data-label="イベント名">ああ</td>
    <td data-label="日時">2015/04/09(木)</td>
    <td data-label="場所">兵庫県神戸市どこどこ</td>
    <td data-label="料金">1,000円</td>
    </tr>
  </tbody>
</table>

<?php  wp_reset_postdata();
	      	endforeach; ?>
	</div>
</div>
</div>

</div>
<?php
get_footer(); ?>