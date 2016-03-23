
  <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

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
  


    <!-- start style switcher -->
    <!-- remove this section when you want to remove the style switcher -->
    <!--        <script type="text/javascript" src="js/style-switcher/style-switcher.js"></script>  -->
    <!-- /end style switcher -->

    <!-- capthca script -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- /end capthca script -->

    <!-- scripting (at the bottom for faster loading) -->
    <script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>


    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1.js"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" src="js/jquery.easy-pie-chart.js"></script>
    <script type="text/javascript" src="js/library.js"></script>
    <script type="text/javascript" src="js/function.js"></script>
    <script type="text/javascript" src="js/mail_validation.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jquery.royalslider.min.js"></script>        


    <!-- External libraries: jQuery & GreenSock -->

    <script src="/layerslider/js/jquery.js" type="text/javascript"></script>
    <script src="/layerslider/js/greensock.js" type="text/javascript"></script>
    <script src="/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
    <script src="/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
    
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
    <script src="https://cdn.jsdelivr.net/scrollreveal.js/3.1.1/scrollreveal.min.js"></script>
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

