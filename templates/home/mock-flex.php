<div class="sliderclass">
  <div id="imageslider" class="container">
    <div class="flexslider loading" >
        <ul class="slides">
                      <li> 
                       
                      </li>
                      <li> 
                 
                      </li>
        </ul>
      </div> <!--Flex Slides-->
  </div><!--Container-->
</div><!--sliderclass-->

      <script type="text/javascript">
            jQuery(window).load(function () {
                jQuery('.flexslider').flexslider({
                    animation: "slide",
                    animationSpeed: 300,
                    slideshow: true,
                    slideshowSpeed: 7000,

                    before: function(slider) {
                      slider.removeClass('loading');
                    }  
                  });
                });
      </script>