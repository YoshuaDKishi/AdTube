<?php
/*
Template Name: footer Template
*/ 
?>

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

<footer class="footer">
  <div class ="slabel"><span class="glyphicon glyphicon-scissors" aria-hidden="true"></span></div>
  <div id ="appearme"></div>
<div><center><p class="large">AdTube</p></center></div>
    <div class="container">

        <div class="row upper-section">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class = "ftop">カテゴリで探す</div>
                <ul class="footernav">
                    <li class="button hvr-buzz-out"><a class ="flink1" href=""> <span class="glyphicon glyphicon-fire" aria-hidden="true"></span>食品関連</a></li>
                    <li class="button hvr-buzz-out"><a class ="flink2" href=""><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>文具関連</a></li>
                    <li class="button hvr-buzz-out"><a class ="flink3" href="#recruit"><span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>あああ</a></li>
                    <li class="button hvr-buzz-out"><a class ="flink5" href="mailto:info@example.com?subject=問い合わせ&amp;body=ご記入ください"><span class="glyphicon glyphicon-tint" aria-hidden="true"></span> Contact</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">

                <div class = "ftop">人物で探す</div>
                <ul class="footernav">
                    <li class="button hvr-buzz-out"><a class ="flink6" href="http://fig-leaves.bz/blog"><span class="glyphicon glyphicon-send" aria-hidden="true"> 人気のAdTuber</a></li>
                    <li class="button hvr-buzz-out"><a class ="flink7" href="http://yoshiaki-figleaves.hatenablog.com"><span class="glyphicon glyphicon-knight" aria-hidden="true">新人のAdTuber</a></li>
                     <li class="button hvr-buzz-out"><a class ="flink7" href="http://yoshiaki-figleaves.hatenablog.com"><span class="glyphicon glyphicon-knight" aria-hidden="true">注目のAdTuber</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class = "ftop">AdTuberについて</div>
                <ul class="footernav">
                   <li class="button hvr-buzz-out"><a class ="flink8" href="#recruit"><span class="glyphicon glyphicon-time" aria-hidden="true"> よくある質問</span></a></li>
                   <li class="button hvr-buzz-out"><a class ="flink8" href="#recruit"><span class="glyphicon glyphicon-time" aria-hidden="true"> 利用規約</span></a></li>
                   <li class="button hvr-buzz-out"><a class ="flink8" href="#recruit"><span class="glyphicon glyphicon-time" aria-hidden="true"> プライバシーポリシー</span></a></li>
                   <li class="button hvr-buzz-out"><a class ="flink8" href="#recruit"><span class="glyphicon glyphicon-time" aria-hidden="true"> 会社情報</span></a></li>
                   <li class="button hvr-buzz-out"><a class ="flink8" href="#recruit"><span class="glyphicon glyphicon-time" aria-hidden="true"> お問い合わせ</span></a></li>
                </ul>

            </div>
            <div class="col-xs-12 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-0">
               <dl class="follow">
                  <dt class = "followus">FOLLOW US</dt>
                  <dd>
                      <div class="social">
                        <a href="https://www.facebook.com/FigLeaves.bz" class="scrollpoint sp-effect3"><li class="fa fa-facebook fa-2x"></li></a>
                        <a href="https://twitter.com/FigLeaves_inc" class="scrollpoint sp-effect3">
                          <li class="fa fa-twitter fa-2x"></li></a>
                     </div>
                  </dd>
                </dl>
            </div>
        </div>
        <div class="container">
         <ul class="list-inline bottom-section">
            <li class = "create">Creats future have never existed today.</li>
            <li class = "copyright">Copyright 2016-2017 Fig Leaves, Inc.</li>
          </ul>
       </div>
    </div>
</footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
