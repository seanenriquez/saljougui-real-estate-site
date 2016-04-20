    <!-- scripting (at the bottom for faster loading) -->

    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/jquery.smooth-scroll.js"></script>
    <script>
        $(document).ready(function(){
            /* Reset Button */
            $('form').on('reset', function() {
                setTimeout(function() {
                    $('.check-btn > input').each(function() {
                        $(this).parent().removeClass('checked-btn');
                        if($(this).prop('checked') !== false) {
                            $(this).parent().addClass('checked-btn');
                        }
                    });
                    $('#collapseSearch').removeClass('in');
                    $('html, body').animate({
                        scrollTop: $('header').outerHeight(true) + $('#tag-line').outerHeight(true)
                        }, 500);
                });
            });
        });
    </script>
  
    <!-- External libraries: jQuery & GreenSock -->
    <script src="<?= $BASE_WEB_URL ?>/layerslider/js/jquery.js" type="text/javascript"></script>
    <script src="<?= $BASE_WEB_URL ?>/layerslider/js/greensock.js" type="text/javascript"></script>
    <script src="<?= $BASE_WEB_URL ?>/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
    <script src="<?= $BASE_WEB_URL ?>/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>

    <script type="text/javascript" src='https://www.googl0e.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/jquery.easy-pie-chart.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/mail_validation.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/jquery.royalslider.min.js"></script>        

    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/library.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/function.js"></script>
    
    <!-- Navbar Shrink JS -->
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/nav-shrink.js">
               
    </script>
    <!-- /End of Navbar Shrink JS -->
    <!-- Layer Slider JS controller (view documentation for refrence) -->
    <script type="text/javascript">
        // Running the code when the document is ready
        $(document).ready(function(){

            // Calling LayerSlider on the target element
            $('#layerslider').layerSlider({

                skin:'lightskin'

                // Slider options goes here,
                // please check the 'List of slider options' section in the documentation
            });
        });
    </script>
    <!-- /End  Layer Slider JS controller -->
    
    <!--Scroll Reveal Classes -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/scrollreveal.js/3.1.1/scrollreveal.min.js"></script>
    <script>
        var up = {
            delay    : 200,
            distance : '120px',
            easing   : 'ease-in-out',
            scale    : 1.1,
        };
        var down = {
            delay    :100,
            distance :"10px",
            easing   :"ease-in",
            scale    :1,
            origin   :"top",
        }         

        var appear ={
            delay      :500,
            distance   :"0px",
            easting    :"ease-out",
            scale      : 1,

        }
        var header = {
            origin: "bottom",
            duration:2000,
        }

        var easeLeft = {
            origin     :"right",
            distance   :"100px",
            delay      :1000,
            duration   :800,

        }
        var easeRight = {
            origin     :"left",
            distance   :"100px",
            delay      :1000,
            duration   :800,

        } 
        window.sr = ScrollReveal();
        sr.reveal(".sr-header", header);
        sr.reveal(".box-seq", { duration: 3000 }, 200);
        sr.reveal(".jump", up, 100 );
        sr.reveal(".jump-container", {delay: +100},up);
        sr.reveal(".appear", appear);
        sr.reveal(".ease-left-1", easeLeft,150);
        sr.reveal(".ease-right-1", easeRight,150);
        sr.reveal(".ease-left-2", easeLeft,150);
        sr.reveal(".ease-right-2", easeRight,150);
        sr.reveal(".sr-down", down);

    </script>
    <!-- /End Scroll Reveal js -->


    <!-- /end scripting -->

