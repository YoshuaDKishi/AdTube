<?php
 get_header(); ?>



<div id="wrap">
  <div id="mainimage">
    <div id="catch">
      <p class="large">AdTube</p>
      <p class="smaller">AdTuberを探そう！</p>
    <div id="container">
        <div id="main">

          <form role="search" method="get" id="searchForm" action="<?php echo home_url( '/' ); ?>">
            <fieldset>
            <div class="input" style=" background-color: rgb(232, 237, 241);">
              <label  for="s"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
              <input  type="text" placeholder="キーワードを入力 " value="" name="s" id="s" style="color: #333333; "/>
            </div>
            <input type="submit" id="searchSubmit" value>
          </fieldset>
          </form>

      </div>
        <!-- #main -->
    </div>
    <!-- #container -->
  </div>
  <!-- #catch -->
    <video id="movie" src="<?php echo get_template_directory_uri(); ?>/picture/topvideo2.mp4" autoplay loop>
    </video>
  </div>
   <!-- #mainimage -->
</div>
<!--wrap-->



<div id="content" class="sitedesign">

 <div class ="contentblock">


    
      <div class="col-md-12">
        <center>
        <h2> <?php echo $cat_name = get_the_category_by_ID( 22 ); ?></h2>
        </center>
      </div>
      <!--col-md-12-->


      <div class="entry-content">
        <ul id="event"> 
        <?php 
        $myposts = getPostByCatId(22, 3);
        foreach ( $myposts as $post ) : setup_postdata( $post )  ;  
        ?> 
          <a href="<?php the_permalink() ?>">
            <li class="boxdesign hvr-ripple-out">  
              <div class="col-md-12 col-sm-12 col-xs-12">   
                <div class="thumbnail">
                  <?php
                  $image_id = get_post_thumbnail_id();
                  $image_url = wp_get_attachment_image_src($image_id, true);
                  ?>            
                    <div class="count-section">
                      <div class="pvcount">
                          <?php if(function_exists('the_views')) {
                            the_views();
                          } ?>
                      </div>
                      <!--pvcount-->
                    </div>
                    <!--count-section-->
                  <img src="<?php echo $image_url[0]; ?>">
                </div>
                <!--thumbnail-->
              </div>
                <!--col-md-12 col-sm-12 col-xs-12-->

                <div class="col-md-12 col-sm-12 col-xs-12 fontclass" ><?php the_title(); ?></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="excerpt">
                    <?php the_excerpt(); ?>
                  </div>
                   <!--exerpt-->
        <?php  wp_reset_postdata();
      endforeach; ?>
                </div>

                <!--col-md-12 col-sm-12 col-xs-12-->
            
           
          </li>

        </a>   
      </ul>
       
      <!--event-->


      <div class="col-md-12 col-sm-12 col-xs-12" >
        <a href="<?php echo get_home_url(); ?>/Movie/articleall?id=<?php echo $category->cat_ID ?>">
          <div class="ripple">
            
            このカテゴリの動画を全て見る＞＞＞＞
            
          <span class="ripple__effect is-orange"> </span>
          </div> 
          <!--ripple-->
        </a> 
      </div>
      <!--col-md-12 col-sm-12 col-xs-12-->
      </div>
      <!--entrycontent-->
      </div>
  <!--contentblock-->
<div class ="contentblock">


    
      <div class="col-md-12">
        <center>
        <h2> <?php echo $cat_name = get_the_category_by_ID( 23 ); ?></h2>
        </center>
      </div>
      <!--col-md-12-->


      <div class="entry-content">
        <ul id="event"> 
        <?php 
                        $myposts = getPostByCatId(23, 3);
                        foreach ( $myposts as $post ) : setup_postdata( $post )  ;  
                        ?> 
          <a href="<?php the_permalink() ?>">
            <li class="boxdesign hvr-ripple-out">  

                <div class="col-md-12 col-sm-12 col-xs-12">
                        
                    <div class="thumbnail">
                      <?php
                      $image_id = get_post_thumbnail_id();
                      $image_url = wp_get_attachment_image_src($image_id, true);
                      ?>            
                        <div class="count-section">
                          <div class="pvcount">
                              <?php if(function_exists('the_views')) {
                                the_views();
                              } ?>
                          </div>
                          <!--pvcount-->
                        </div>
                        <!--count-section-->
                      <img src="<?php echo $image_url[0]; ?>">
                    </div>
                <!--thumbnail-->
                </div>
                <!--col-md-12 col-sm-12 col-xs-12-->

                <div class="col-md-12 col-sm-12 col-xs-12 fontclass" ><?php the_title(); ?></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="excerpt">
                    <?php the_excerpt(); ?>
                  </div>
                   <!--exerpt-->
                 <?php  wp_reset_postdata();
                  endforeach; ?>
                </div>
                <!--col-md-12 col-sm-12 col-xs-12-->
            </li>
        </a>   
      </ul>
       
      <!--event-->


      <div class="col-md-12 col-sm-12 col-xs-12" >
        <a href="<?php echo get_home_url(); ?>/Movie/articleall?id=<?php echo $category->cat_ID ?>">
          <div class="ripple">
            
            このカテゴリの動画を全て見る＞＞
            
          <span class="ripple__effect is-orange"> </span>
          </div> 
          <!--ripple-->
        </a> 
      </div>
      <!--col-md-12 col-sm-12 col-xs-12-->
      </div>
      <!--entrycontent-->
      </div>
  <!--contentblock-->



</div>
<!--sitecontent-->
<?php
 get_footer(); ?>


