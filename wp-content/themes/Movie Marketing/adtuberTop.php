
<?php
/*
Template Name: adtuberTop Template
*/
?>


<?php 
	get_header(); 
?>

<div id="wrap">
  <div id="logImage">
    <div id="logCatch">
      <p class="logLarge">Youtuber</p>
      <p class="logSmaller"></p>
    <div id="container">
        <div id="main">

      </div>
        <!-- #main -->
    </div>
    <!-- #container -->
  </div>
  <!-- #catch -->
    <img id="logtop" src="<?php echo get_template_directory_uri(); ?>/picture/foto.jpg" >
    </img>
  </div>
   <!-- #mainimage -->
</div>
<!--wrap-->


<div class ="logContentblock">

<div class="logContent">
		<div class="entry-content">
			<div class="col-md-12">
	        <center>
	        <h2>広告出稿のサービスはこちら</h2>
	        </center>
	     </div>
		<?php echo do_shortcode( '[swpm_profile_form]'); ?>
		</div>


	</div>

</div>

<?php 
	get_footer(); 
?>