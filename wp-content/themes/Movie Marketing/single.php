
<?php
/*
Template Name:single Template
*/
?>

<?php get_header(); ?>
<?php
	$articleall = $_GET['id'];
?>

<div id="content" class="site-content">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="articleimage">	
			<?php
				$image_id = get_post_thumbnail_id();
				$image_url = wp_get_attachment_image_src($image_id, true);
			?>
			<img src="<?php echo $image_url[0]; ?>" class="thumb" text-align="center" width="100%" min-height="300px"  style="overflow:hidden">
		</div>
	</div>

<div class= "wrapcontent">
	<div class ="contentblock">
	
			<div class="col-md-9 col-sm-9 col-xs-12">	
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
				
					<div class="col-md-12">
						<center>
							<h2><a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</center>
					</div>
				<div class="linecontent1">
					<div class="entry_main">
						<?php the_content(); ?>
							<div class="reservetext">
			<center><a href="#reservation"> 予約はコチラ↓↓↓</a></center></div>
	</div>
					</div>
					
				
			
			<?php endwhile; endif; ?>
			</div>
		
		</div>
	
			
				<div id="spNone" class="col-md-3 col-sm-3 col-xs-12 sidecontents">
					<div class="othertitle">その他のイベント</div>
					<div class="linecontent2">
					<?php get_sidebar(); ?>

				</div>

				<a href="<?php echo get_home_url(); ?>/Restandard/articleall?id=<?php echo $category->cat_ID ?>">
				<div class="ripple">
					
					全てのイベントを見る＞＞
					
				<span class="ripple__effect is-orange">	</span>
				</div> </a>	
			</div>


</div>
</div>
<div id="reservation" class ="contentblock">
	<div class="col-md-12">
		<center>
			<p class="reservetext">予約はコチラ↓↓↓</p><br>
				<p>※　10秒で予約は終わります！</p>	
		</center>
	</div>

	<div class="linecontent3">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="contactbody">
			<?php echo do_shortcode( '[contact-form-7 id="118" title="contact"]' ); ?>
			</div>
	</div>
	</div>

</div>
<div id="pcNone" class="linecontent2">
	<div  class="col-md-12 col-sm-12 col-xs-12 ">
		

				<a href="<?php echo get_home_url(); ?>/Restandard/articleall?id=<?php echo $category->cat_ID ?>">
				<div id="otherall" class="ripple">
					
					その他のイベントを見る＞＞
					
				<span class="ripple__effect is-orange">	</span>
				</div> </a>	
			</div>
</div>


<script>
$(function() {
    var $clickable = $('.ripple');

    /* mousedownだと直ぐに発動し、clickだとマウスボタンを離した時に発動する */
    $clickable.on('mousedown', function(e) {
        var _self   = this;
        var x       = e.offsetX;
        var y       = e.offsetY;

        var $effect = $(_self).find('.ripple__effect');
        var w       = $effect.width();
        var h       = $effect.height();

        /* クリックした座標を中心とする */
        $effect.css({
            left: x - w / 2,
            top: y - h / 2
        });

        /* jsではclassの付け替えをするだけ */
        if (!$effect.hasClass('is-show')) {
            $effect.addClass('is-show');

            /*
             * エフェクトアニメーションが終わったらclassを削除する
             * ここでは、単純にcssで設定するdurationと時間を合わせているだけですが
             * keyframes終了のイベント(AnimationEnd)が取れるかと思うので、それで対応した方が良いかも
             */
            setTimeout(function() {
                $effect.removeClass('is-show');
            }, 750);
        }
        return false;
    });

});
</script>

<?php get_footer(); ?>