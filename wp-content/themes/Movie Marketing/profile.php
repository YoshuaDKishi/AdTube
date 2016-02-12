
<?php
/*
Template Name: profile Template
*/
?>


<?php 
	get_header(); 
?>




<div class ="logContentblock">

<div class="logContent">
		<div class="entry-content">
			<div class="col-md-12">
	        <center>
	        <h2>会員登録はこちら！</h2>
	        </center>
	     </div>
		<?php echo do_shortcode( '[swpm_profile_form]'); ?>
		</div>


	</div>


<div class="descriptionAdtube">

	<div class="entry-content">
		<div class="col-md-12">
        	<center>
        	<h3> AdTuberとは？</h3>
        	</center>
      	</div>



     </div>
</div>
<!--descriptionAdtube-->



</div>
<!--logContentBlock->

<?php
get_footer(); ?>