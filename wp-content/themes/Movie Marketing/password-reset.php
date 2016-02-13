
<?php
/*
Template Name: password-reset Template
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
	        <h2>リセットしたい場合、アドレスを入力</h2>
	        </center>
	     </div>
		<?php echo do_shortcode( '[swpm_reset_form]'); ?>
		</div>

</div>


<img title="Join Now" src="http://localhost:8888/Movie/wp-content/plugins/simple-membership/images/join-now-button-image.gif" alt="Join Now Button" width="277" height="82" />

</div>

<?php
get_footer(); ?>