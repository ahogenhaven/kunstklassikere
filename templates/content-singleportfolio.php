
	<div id="pageheader" class="titleclass">
		<div class="container">
			<div class="page-header">
				<div class="portfolionav clearfix">
   			<?php previous_post_link_plus( array('order_by' => 'menu_order', 'loop' => true, 'format' => '%link', 'link' => '<i class="icon-chevron-left"></i>') ); ?>
   			<?php global $virtue; if( !empty($virtue['portfolio_link'])){ ?>
					 <a href="<?php echo get_page_link($virtue["portfolio_link"]); ?>">
				<?php } else {?> 
				<?php } ?>
   				<?php next_post_link_plus( array('order_by' => 'menu_order', 'loop' => true, 'format' => '%link', 'link' => '<i class="icon-chevron-right"></i>') ); ?>
   				<span>&nbsp;</span>
   			</div>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>
		</div><!--container-->
	</div><!--titleclass-->
<div id="content" class="container">
    <div class="row">
      <div class="main <?php echo kadence_main_class(); ?> portfolio-single" role="main">
      <?php while (have_posts()) : the_post(); ?>
      <?php global $post; $layout = get_post_meta( $post->ID, '_kad_ppost_layout', true ); 
						$ppost_type = get_post_meta( $post->ID, '_kad_ppost_type', true );
						 $imgheight = get_post_meta( $post->ID, '_kad_posthead_height', true );
						 $imgwidth = get_post_meta( $post->ID, '_kad_posthead_width', true );
						 $autoplay = get_post_meta( $post->ID, '_kad_portfolio_autoplay', true );
						 if(isset($autoplay) && $autoplay == 'no') {$slideauto = 'false';} else {$slideauto = 'true';}
		if($layout == 'above')  {
				$imgclass = 'col-md-12';
				$textclass = 'pcfull clearfix';
				$entryclass = 'col-md-8';
				$valueclass = 'col-md-4';
				$slidewidth_d = 1140;
		} elseif ($layout == 'three')  {
				$imgclass = 'col-md-12';
				$textclass = 'pcfull clearfix';
				$entryclass = 'col-md-12';
				$valueclass = 'col-md-12';
				$slidewidth_d = 1140;
			} else {
				$imgclass = 'col-md-5';
				$textclass = 'col-md-7 pcside';
				$entryclass = '';
				$valueclass = '';
				$slidewidth_d = 653;
			 	}
			 	$portfolio_margin = '';
		if (!empty($imgheight)) { $slideheight = $imgheight; } else { $slideheight = 450; } 
		if (!empty($imgwidth)) { $slidewidth = $imgwidth; } else { $slidewidth = $slidewidth_d; } 
		 ?>
  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <div class="postclass">
      	<div class="row">
      		<div class="<?php echo $imgclass; ?>">
				<?php if ($ppost_type == 'flex') { ?>
					<div class="flexslider loading kad-light-gallery" style="max-width:<?php echo $slidewidth;?>px;">
                       <ul class="slides">
						<?php global $post;
                          	$image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                          		if(!empty($image_gallery)) {
                    				$attachments = array_filter( explode( ',', $image_gallery ) );
                    					if ($attachments) {
											foreach ($attachments as $attachment) {
												$attachment_url = wp_get_attachment_url($attachment , 'full');
												$caption = get_post($attachment)->post_excerpt;
												$image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
													if(empty($image)) {$image = $attachment_url;}
												echo '<li><a href="'.$attachment_url.'" rel="lightbox" title="'.$caption.'"><img src="'.$image.'" alt="'.$caption.'"/></a></li>';
											}
										}
                    			} else {
                    				$attach_args = array('order'=> 'ASC','post_type'=> 'attachment','post_parent'=> $post->ID,'post_mime_type' => 'image','post_status'=> null,'orderby'=> 'menu_order','numberposts'=> -1);
									$attachments = get_posts($attach_args);
										if ($attachments) {
											foreach ($attachments as $attachment) {
												$attachment_url = wp_get_attachment_url($attachment->ID , 'full');
												$image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
													if(empty($image)) {$image = $attachment_url;}
												echo '<li><a href="'.$attachment_url.'" rel="lightbox"><img src="'.$image.'"/></a></li>';
											}
                    					}	
								} ?>                                
					</ul>

              </div> <!--Flex Slides-->
              <?php } else if ($ppost_type == 'carousel') { ?>
					
					 <div id="imageslider" class="loading carousel_outerrim">
					    <div class="carousel_slider_outer fredcarousel fadein-carousel" style="overflow:hidden; max-width:<?php echo $slidewidth;?>px; height: <?php echo $slideheight;?>px; margin-left: auto; margin-right:auto;">
					        <div class="carousel_slider kad-light-gallery">
					            <?php global $post;
                          		$image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                          		if(!empty($image_gallery)) {
                    				$attachments = array_filter( explode( ',', $image_gallery ) );
                    					if ($attachments) {
										foreach ($attachments as $attachment) {
											$attachment_url = wp_get_attachment_url($attachment , 'full');
											$caption = get_post($attachment)->post_excerpt;
					                    	$image = aq_resize($attachment_url, null, $slideheight, false, false);
					                    	if(empty($image)) {$image = array($attachment_url, $slidewidth, $slideheight);} 
					                        echo '<div class="carousel_gallery_item" style="float:left; display: table; position: relative; text-align: center; margin: 0; width:auto; height:'.$image[2].'px;">';
					                        echo '<div class="carousel_gallery_item_inner" style="vertical-align: middle; display: table-cell;">';
					                        echo '<a href="'.$attachment_url.'" rel="lightbox" title="'.$caption.'">';
					                        echo '<img src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'" />';
					                        echo '</a>'; ?>
					                      </div>
					                    </div>
					                  <?php } ?>
					                  <?php } ?>
					                  <?php } ?>
					            </div>
					            <div class="clearfix"></div>
					              <a id="prevport_carouselslider" class="prev_carousel icon-arrow-left" href="#"></a>
					              <a id="nextport_carouselslider" class="next_carousel icon-arrow-right" href="#"></a>
					          </div> <!--fredcarousel-->
					  </div><!--Container-->
					  <script type="text/javascript">
                jQuery( window ).load(function () {
                    var $wcontainer = jQuery('.carousel_slider_outer');
                    var $container = jQuery('.carousel_slider_outer .carousel_slider');
                      var align = 'center';
                      var carheight = <?php echo $slideheight; ?>;
                          setWidths();
                          $container.carouFredSel({
                              width: '100%',
                              height: carheight,
                              align: align,
                              auto: {play: <?php echo $slideauto; ?>, timeoutDuration: 9000},
                              scroll: {
                                items : 1,
                                easing: 'quadratic'
                              },
                              items: {
                                visible: 1,
                                width: 'variable'
                              },
                              prev: '.carousel_slider_outer .prev_carousel',
                              next: '.carousel_slider_outer .next_carousel',
                              swipe: {
                                onMouse: false,
                                onTouch: true
                              },
                              onCreate: function() {
                                jQuery('.carousel_slider').css('positon','static');
                              }
                            });
                            var cresizeTimer;
                            jQuery(window).resize(function() {
                            clearTimeout(cresizeTimer);
                            cresizeTimer = setTimeout(carouselSlider, 100);
                            });
                            function carouselSlider() {
                            // set the widths on resize
                            $container.trigger("destroy");
                            setWidths();
                              $container.carouFredSel({
                                 width: '100%',
                                  height: carheight,
                                  align: align,
                                  auto: {play: <?php echo $slideauto; ?>, timeoutDuration: 9000},
                                  scroll: {
                                    items : 1,
                                    easing: 'quadratic'
                                  },
                                  items: {
                                    visible: 1,
                                    width: 'variable'
                                  },
                                  prev: '.carousel_slider_outer .prev_carousel',
                                  next: '.carousel_slider_outer .next_carousel',
                                  swipe: {
                                    onMouse: false,
                                    onTouch: true
                                  },
                                });
                            };
                          $wcontainer.animate({'opacity' : 1});
                          $wcontainer.css({ height: 'auto' });
                          $wcontainer.parent().removeClass('loading');
                          // set all the widths to the elements
                          function setWidths() {
                            var unitWidth = $container.width();
                            $container.children().css({ width: unitWidth });
                            if(jQuery(window).width() <= 768) {
                            carheight = null;
                            $container.children().css({ height: 'auto' });
                          }
                        }

                });
                
              </script> 
				<?php 
				} else if ($ppost_type == 'video') { ?>
					<div class="videofit">
                  <?php global $post; $video = get_post_meta( $post->ID, '_kad_post_video', true ); echo $video; ?>
                  </div>
				<?php } else if ($ppost_type == 'none') {
					 $portfolio_margin = "kad_portfolio_nomargin";
				} else {					
							$post_id = get_post_thumbnail_id();
							$img_url = wp_get_attachment_url( $post_id);
							$image = aq_resize( $img_url, $slidewidth, $slideheight, true ); //resize & crop the image
							if(empty($image)) {$image = $img_url; }
							?>
                                <?php if($image) : ?>
                                    <div class="imghoverclass">
                                    	<a href="<?php echo $img_url ?>" rel="lightbox" class="lightboxhover">
                                    		<img src="<?php echo $image ?>" alt="<?php echo get_post($post_id)->post_excerpt; ?>" />
                                    	</a>
                                    </div>
                                <?php endif; ?>
				<?php } ?>
        </div><!--imgclass -->
  		<div class="<?php echo $textclass; ?>">
		    <div class="entry-content <?php echo $entryclass; ?> <?php echo $portfolio_margin; ?>">
		      <?php the_content(); ?>
		  </div>
	    		<div class="<?php echo $valueclass; ?>">
				    <ul class="portfolio-content disc">
				    	<?php global $post; $project_v1t = get_post_meta( $post->ID, '_kad_project_val01_title', true );
				    						$project_v1d = get_post_meta( $post->ID, '_kad_project_val01_description', true );
				    						$project_v2t = get_post_meta( $post->ID, '_kad_project_val02_title', true );
				    						$project_v2d = get_post_meta( $post->ID, '_kad_project_val02_description', true );
				    						$project_v3t = get_post_meta( $post->ID, '_kad_project_val03_title', true );
				    						$project_v3d = get_post_meta( $post->ID, '_kad_project_val03_description', true );
				    						$project_v4t = get_post_meta( $post->ID, '_kad_project_val04_title', true );
				    						$project_v4d = get_post_meta( $post->ID, '_kad_project_val04_description', true );
				    						$project_v5t = get_post_meta( $post->ID, '_kad_project_val05_title', true );
				    						$project_v5d = get_post_meta( $post->ID, '_kad_project_val05_description', true ); ?>
				    <?php if ($project_v1t != '') echo '<li class="pdetails"><span>'.$project_v1t.'</span> '.$project_v1d.'</li>'; ?>
				    <?php if ($project_v2t != '') echo '<li class="pdetails"><span>'.$project_v2t.'</span> '.$project_v2d.'</li>'; ?>
				    <?php if ($project_v3t != '') echo '<li class="pdetails"><span>'.$project_v3t.'</span> '.$project_v3d.'</li>'; ?>
				    <?php if ($project_v4t != '') echo '<li class="pdetails"><span>'.$project_v4t.'</span> '.$project_v4d.'</li>'; ?>
				    <?php if ($project_v5t != '') echo '<li class="pdetails"><span>'.$project_v5t.'</span> <a href="'.$project_v5d.'" target="_new">'.$project_v5d.'</a></li>'; ?>
				    </ul><!--Portfolio-content-->
				</div>
				</div>
    	</div><!--textclass -->
    </div><!--row-->
    <div class="clearfix"></div>
    </div><!--postclass-->
    <footer>
      <?php wp_link_pages(array('before' => '<nav id="page-nav" class="wp-pagenavi"><p>' . __('Pages:', 'virtue'), 'after' => '</p></nav>')); ?>
      <?php global $post; $portfolio_carousel_recent = get_post_meta( $post->ID, '_kad_portfolio_carousel_recent', true ); if ($portfolio_carousel_recent == 'similar') { get_template_part('templates/similarportfolio', 'carousel'); } else if ($portfolio_carousel_recent == 'recent') { get_template_part('templates/recentportfolio', 'carousel');} ?>
    </footer>
    <?php global $virute; if(isset($virtue['portfolio_comments']) && $virtue['portfolio_comments'] == 1) { 
    comments_template('/templates/comments.php'); 
	} ?>
  </article>
<?php endwhile; ?>
</div>