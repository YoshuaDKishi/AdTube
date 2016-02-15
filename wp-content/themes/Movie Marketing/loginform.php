
<?php
/*
Template Name: loginform Template
*/
?>


<?php 
	get_header(); 
?>

<div id="wrap">
  <div id="logImage">
    <div id="logCatch">
      <p class="logLarge">成果報酬型YoutuberASP</p>
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
		<?php echo do_shortcode( '[swpm_registration_form level=5]'); ?>
		</div>


	</div>

<div class="logContent2">
	<div class="entry-content">
		<div class="col-md-12">
        	<center>
        	<h3> ログインはこちら</h3>
        	</center>
      	</div>

		<?php echo do_shortcode( '[swpm_login_form level=5]'); ?>

	</div>
		
</div>
<!--logcontent2-->

<div class="descriptionAdtube">

	<div class="entry-content">
		<div class="col-md-12">
        	<center>
        	<h3> AdTuberASPサービスについて</h3>
        	</center>
      	</div>



     </div>
</div>
<!--descriptionAdtube-->



</div>
<!--logContentBlock-->

<?php
get_footer(); ?>