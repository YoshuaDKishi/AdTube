<?php
/*
Template Name: header Template
*/ 
?>


  <!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=yes">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>AdTube</title>
    <!-- Bootstrap -->
    <link href = "<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" type='text/css'>
    <link href="jquery.fs.naver.css" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php bloginfo(template_url); ?>/jquery-1.9.1.min.js"></script>
    <script src="<?php bloginfo(template_url); ?>/jquery.fs.naver.js"></script>
    <script type="text/javascript" src="path/footerFixed.js"></script>
    <script type="text/javascript" src="<?php bloginfo(template_url); ?>/js/jquery.color.js"></script>
    <script type="text/javascript" src="<?php bloginfo(template_url); ?>/js/script.js"></script>
    <script type="text/javascript" src="<?php bloginfo(template_url); ?>/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php bloginfo(template_url); ?>/js/drawer.js"></script>
    <script type="text/javascript" src="<?php bloginfo(template_url); ?>/jquery-1.9.1.min.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.slabel')
          .hover(function() {
        $(this).stop(true, true).animate({  left: 180 }, 5210);
          }, function() {
        $(this).stop(true, true).animate({ left: 30 }, 4210);
          });
    });
</script>
<script type="text/javascript"> 
$(function(){

  $('ul.nav li')
    .css({opacity: 0})
    .each(function(i){
      $(this).delay(300*i).animate({opacity:1}, 1500);
    });
});
</script>
<script type="text/javascript">
           $(document).ready(function() {
  $(".drawer").drawer();

});
           
</script>
<script type="text/javascript">
$(document).click(function() {　$('.drawer').drawer('close');　});
</script>
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

  </head>


<body>

    <div>
      <nav class = "navbar navbar-inverse navbar-fixed-top">
        <div class = "navbar-header">
          <button class = "drawer" data-toggle="collapse" data-target=".target">
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
          </button>
         <a class = "navbar-brand" href="FigLeaves.html">AdTube</a>
        </div>
         
          <div id="menubar"  class ="collapse navbar-collapse target">
            <ul id="mainmenu" class = "nav navbar-nav" >
              <li class ="button hvr-buzz-out"><a href="#">動画を探す</a></li>
              <li class ="button hvr-buzz-out"><a href="#">AdTuberになる</a></li>
              <li class ="button hvr-buzz-out"><a href="">ログイン</a></li>
              <li>
                 <form role="search" method="get" id="searchForm" action="<?php echo home_url( '/' ); ?>">
            <fieldset>
            <div class="headInput">
              <label  for="s"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
              <input  type="text" placeholder="キーワードを入力" value="" name="s" id="s" style="color: #333333; "/>
            </div>
            <input type="submit" id="searchSubmit" value>
          </fieldset>
          </form>
              </li>

            </ul>
            
          </div>
          <div id="bordetop">
  </div>
      </nav>
    </div>
