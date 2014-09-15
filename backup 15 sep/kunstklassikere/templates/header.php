<header class="banner headerclass" role="banner">
<?php if (kadence_display_topbar()) : ?>

<?php endif; ?>
<?php global $virtue; if(isset($virtue['logo_layout'])) {
  if($virtue['logo_layout'] == 'logocenter') {$logocclass = 'col-md-12'; $menulclass = 'col-md-12';}
  else if($virtue['logo_layout'] == 'logohalf') {$logocclass = 'col-md-6'; $menulclass = 'col-md-6';}
  else {$logocclass = 'col-md-4'; $menulclass = 'col-md-8';} 
} else {$logocclass = 'col-md-4'; $menulclass = 'col-md-8'; }?>
  <div class="container">
    <div class="row">
          <div class="clearfix kad-header-left">
            <div id="logo" class="logocase">
              <a class="brand logofont" href="<?php echo home_url(); ?>/">
              <h1>
                      <?php global $virtue; if (!empty($virtue['x1_virtue_logo_upload']['url'])) { ?> <div id="thelogo"><img src="<?php echo $virtue['x1_virtue_logo_upload']['url']; ?>" alt="<?php  bloginfo('name');?>" class="kad-standard-logo" />
                         <?php if(!empty($virtue['x2_virtue_logo_upload']['url'])) {?> <img src="<?php echo $virtue['x2_virtue_logo_upload']['url'];?>" class="kad-retina-logo" style="max-height:<?php echo $virtue['x1_virtue_logo_upload']['height'];?>px" /> <?php } ?>
                        </div> <?php } else { bloginfo('name'); } ?>
                        </a>
              <p class="kad_tagline belowlogo-text"><?php bloginfo('description'); ?>  </p>
              </h1>
              <p>
             
              </p>
           </div> <!-- Close #logo -->
       </div><!-- close logo span -->

     
    </div> <!-- Close Row -->
           <div class="<?php echo $menulclass; ?> kad-header-right" style="width:100%;">
         <nav id="nav-main" class="clearfix" role="navigation">
          <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu')); 
            endif;
           ?>
         </nav> 
        </div> <!-- Close span7 -->  
    <?php if (has_nav_menu('mobile_navigation')) : ?>
           <div id="mobile-nav-trigger" class="nav-trigger">
              <a class="nav-trigger-case mobileclass collapsed" rel="nofollow" data-toggle="collapse" data-target=".kad-nav-collapse">
                <div class="kad-navbtn"><i class="icon-reorder"></i></div>
                <div class="kad-menu-name"><?php echo __('Menu', 'virtue'); ?></div>
              </a>
            </div>
            <div id="kad-mobile-nav" class="kad-mobile-nav">
              <div class="kad-nav-inner mobileclass">
                <div class="kad-nav-collapse">
                 <?php wp_nav_menu( array('theme_location' => 'mobile_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mnav')); ?>
               </div>
            </div>
          </div>   
          <?php  endif; ?> 
  </div> <!-- Close Container -->
  <?php
            if (has_nav_menu('secondary_navigation')) : ?>
  <section id="cat_nav" class="navclass">
    <div class="container">
     <nav id="nav-second" class="clearfix" role="navigation">
     <?php wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'sf-menu')); ?>
   </nav>
    </div><!--close container-->
    </section>
    <?php endif; ?> 
     <?php global $virtue; if (!empty($virtue['virtue_banner_upload']['url'])) { ?> <div class="container"><div class="virtue_banner"><img src="<?php echo $virtue['virtue_banner_upload']['url']; ?>" /></div></div> <?php } ?>
</header>
<div class="container">
<hr class="dividertop">
</div>