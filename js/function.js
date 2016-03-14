// JavaScript Document

var api;
var w;
$(function(){	
    
    $(".info_slides").each(function(){
        var cur = $(this);
        cur.children('li').children('a').click(function(){
            var cur_li = $(this).closest('li');
            cur_li.toggleClass('active');
            cur_li.children('.text').slideToggle(300);
            cur_li.siblings().removeClass('active').children('.text').slideUp(300);
            return false;
        })
    })
	
    $('.checkbox').each(function(){
        var cur = $(this);
        var label = cur.find('label');
        var checkbox = cur.find('input[type="checkbox"]');
        if(checkbox.attr('checked') || checkbox.attr('checked') == 'checked'){
            label.addClass('active');
        }
        label.on('click', function(){
            label.toggleClass('active');
            checkbox.removeClass('error');
            if(label.hasClass('active')){
                checkbox.attr('checked', true);
            } else {
                checkbox.attr('checked', false);
            }
        })
    })
    $('.contact_form input[type="text"], .contact_form textarea').on('keyup', function(){
        $(this).removeClass('error');
    })
    
    w = $(window).width();
    if($(".fullwidthbanner").length) {
        $('.fullwidthbanner').revolution({
            delay:9000,
            startheight:520,
            startwidth:960,

            navigationType:"none",					//bullet, thumb, none, both		(No Thumbs In FullWidth Version !)
            navigationArrows:"nexttobullets",		//nexttobullets, verticalcentered, none
            navigationStyle:"round",				//round,square,navbar
			

            touchenabled:"on",						// Enable Swipe Function : on/off
            onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

            navOffsetHorizontal:0,
            navOffsetVertical:20,

            stopAtSlide:-1,
            stopAfterLoops:-1,

            fullWidth:"on"							// Turns On or Off the Fullwidth Image Centering in FullWidth Modus
        });
    }
	
    
	

    topMenu();
    footer();
    carousels();
    infoDeviders();
	
    if($(".fancy").length){
        $("a.fancy").fancybox({        
            'padding'	: 10,
            'transitionIn'	: 'fade',
            'transitionOut'	: 'fade',
            'speedIn' : 600, 
            'speedOut' : 200, 
            'overlayShow'	: true,
            'hideOnContentClick' : true,
            'hideOnOverlayClick' : true,
            'enableEscapeButton' : true
        });
    }
    if($(".fancy-video").length){
        $("a.fancy-video").click(function() {
            $.fancybox({
                'padding' : 0,
                'autoScale' : false,
                'transitionIn' : 'fade',
                'transitionOut' : 'fade',
                'title' : this.title,
                'href' : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                'type' : 'swf',
                'swf' : {
                    'wmode' : 'transparent',
                    'allowfullscreen' : 'true'
                }
            });
            return false;
        });	
    }
})


$(window).resize(function(){
    w = $(window).width();
    footer();
    carousels();
    infographBottom();	
    fixedHeader();
    blockPosition($('#main_advert .slide img'));
})

$(window).load(function(){
    infographBottom();
    blockPosition($('#main_advert .slide img'));
    $('body').css('visibility', 'visible');
    processBox();
    initProgressBarWithImage();
    progress_bars();
    easePieChart();
    trends();
    var hash = location.hash;
    if(hash) {
        $("#top_menu li a[href='" + hash + "']").click();
    }
    fixedHeader();
})


function fixedHeader(){
    if(w > 979){
        var h_bar = $('.notify-bar').outerHeight();
        var h_header = $('#header .inner').height();
        $('#header').css('height', h_header);

    } else {
        $('#header').removeAttr('style');
    }
    $(".notify-close").click(function(){
        var speed = 300;
        $(".notify-bar").slideUp(speed);
        if(w > 979) $('#header').animate({
            'height': '-=' + h_bar + 'px'
        }, speed);
        return false;
    }); 
}

function topMenu(){
    var scrollByClick = false;
    $("#top_menu li a").click(function(){
        var href = $(this).attr('href');
        if(href.search('_anchor') != -1){
            href = href.replace('_anchor', '_marker');
            if($(href).length){
                scrollByClick = true;
                var position = $(href).offset().top;
                $('body, html').animate({
                    scrollTop: position - 120
                }, 500);
                setTimeout(function(){
                    scrollByClick = false;
                }, 500);
                return false;
            }
        }
    });

    $("#top_menu select").change(function(){
        var href = $(this).val();
        if(href.search('_anchor') != -1){
            href = href.replace('_anchor', '_marker');
            scrollByClick = true;
            var position = $(href).offset().top;
            $('body, html').animate({
                scrollTop: position
            }, 500);
            setTimeout(function(){
                scrollByClick = false;
            }, 500);
        }
    });
    var markers	= $('[id*="_marker"]');
    var top = $(window).scrollTop();

    var setActive = function(){
        markers.each(function(){
            var name_marker = '#' + $(this).attr('id');
            if(!scrollByClick) {
                var position = $(this).offset().top;
                var name_anchor = name_marker.replace('_marker', '_anchor');
                if(top >= position - $("#header .inner").outerHeight()){
                    $("#top_menu li a[href='" + name_anchor + "']").closest('li').addClass('active').siblings().removeClass('active');
                    $("#top_menu select option[value='" + name_anchor + "']").attr('selected', true).siblings().attr('selected', false);
                }
            }
        })
    }

    setActive();

    $(window).scroll(function(){
        top = $(window).scrollTop();
        if(top > 15 && w > 768) {
            $("#header").addClass('fixed');
        } else {
            $("#header").removeClass('fixed');
        }
        setActive();

    })
	
}



function footer(){
    var h = $("#footer").height();
    $("#footer").css('margin-top', -(h + parseInt($("#container").css('padding-bottom'))));
    $("#empty").css('height', h - 19);
}

var carousel_enable;
function carousels(){
	
    $(".carousel ul").trigger("destroy", true);
    if(w > 768) {
        $(".carousel").each(function(){
            var ul = $(this).find('ul');
            var prev_arr = $(this).find('.left_arr');
            var next_arr = $(this).find('.right_arr');
			
            ul.carouFredSel({
                width	: "100%",
                align: 'left',
                prev: {
                    button: prev_arr
                },
                next: {
                    button: next_arr
                },
                auto: false
            });
			
        })	
    }
	
}

function infographBottom(){
    var h = 0;
    $('.infograph .desc').each(function(){
        var height = $(this).outerHeight();
        if(height > h) h = height;
    })
    if(h < 153) h = 153;
    $('#wrapper .infograph > sup').css('height', h);		
}

function blockPosition(obj, relative){
    obj.each(function(index, element) {
        var w = $(this).width();
        var h = $(this).height();
		
        var d = w/h;
        if(relative) {
            var parent = relative;
        } else {
            var parent = $(this).parent();
        }
		
        var border_top_p = parseInt(parent.css('border-top')) ? parseInt(parent.css('border-top')) : 0;
        var border_bottom_p = parseInt(parent.css('border-bottom')) ? parseInt(parent.css('border-bottom')) : 0;
        var border_left_p = parseInt(parent.css('border-left')) ? parseInt(parent.css('border-left')) : 0;
        var border_right_p = parseInt(parent.css('border-right')) ? parseInt(parent.css('border-right')) : 0;
		
        var w_p = parent.outerWidth() - border_left_p - border_right_p;
        var h_p = parent.outerHeight() - border_top_p - border_bottom_p;
		
        var d_p = w_p/h_p;
		
        if(d > d_p) {
            h = h_p;
            w = h*d;
            m = "0 0 0 " + (-w/2) + "px";
            l = "50%";
            t = 0;
        } else {
            w = w_p;
            h = w/d;	
            m = -h/2 + "px 0 0 0";
            t = "50%";
            l = 0;
        }
        var position = $(this).css('position');
        if(position != 'relative' && position != 'absolute') position = 'absolute';
        $(this).css({
            "width": w + "px", 
            "height" : h + "px", 
            "margin": m, 
            "top": t, 
            "left": l, 
            "position": position
        });
    });	
}

$(document).ready(function(){ 
 
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    }); 
 
    $('.scrollup').click(function(){
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
        
    $(document).ready(function() {
        $("#clients-slider, #results-slider, #awards-slider").owlCarousel({
            navigation : false, // Show next and prev buttons
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem:true,
            pagination: true
        }); 
    });
 
    $( "#item1" ).click(function() {
        $( "#property-item1" ).removeClass("property-hidden")
    });
    $( "#item2" ).click(function() {
        $( "#property-item2" ).removeClass("property-hidden")
    });
    $( "#item3" ).click(function() {
        $( "#property-item3" ).removeClass("property-hidden")
    });
    $( "#item4" ).click(function() {
        $( "#property-item4" ).removeClass("property-hidden")
    });
    $( "#item5" ).click(function() {
        $( "#property-item5" ).removeClass("property-hidden")
    });
    $( "#item6" ).click(function() {
        $( "#property-item6" ).removeClass("property-hidden")
    });
    
    $(".close-details").click(function() {
        $(".property-item").slideUp(500);
    });
    
    $('.property-link').on('click', function(){
		moreBlock = $(this).closest('.more');
		moreBlock.addClass('load');
        var id = $(this).attr('id').replace('item', '');
		var block = $('#property-item' + id);
		if($('.property-item:visible').length && !$('.property-item:visible').is(block)){
			$('.property-item').hide();
			block.show();
			var time = 0;
		} else {
			var time = 500;
			block.slideDown(time);
		}
		setTimeout(function(){
			var topP = block.offset().top - 20;
			if(window.innerWidth > 979) topP -= $('#header').height();
			var topNow = $(window).scrollTop();
			var speed = (topP - topNow)*0.8;
			if(!block.hasClass('init')){
				var slider = block.find('.royalSlider');
				var map = block.find('.map');
				var tabsBlock = block.find('.tabs');
				map_initialize(map);
				tabs(tabsBlock);
				rsSlider(slider);
				var t = setInterval(function(){
					if(slider.hasClass('rendered')) {
						block.addClass('init');
						clearInterval(t);
						$('html, body').animate({scrollTop: topP}, speed);
						moreBlock.removeClass('load');
					}
				}, 100)
				
			} else {
				$('html, body').animate({scrollTop: topP}, speed);
				moreBlock.removeClass('load');
			}
		
			
		}, time)
		
        return false;
    })
 
});
function tabs(tabsBlock){
    tabsBlock.each(function(index, element) {
        var curObject = $(this);
        if(!curObject.children("li.active").length) curObject.children("li:first").addClass("active").siblings("li").removeClass("active");
        curObject.siblings(".tabs_blocks").children("div").eq(curObject.children("li.active").index()).css('height', 'auto').siblings().css('height', '0');
        curObject.children("li").each(function(index, element) {
            $(this).children("a").bind("click", function(){
                $(this).parent().addClass("active").siblings("li").removeClass("active");
                curObject.siblings(".tabs_blocks").children("div").eq(curObject.children("li.active").index()).css('height', 'auto').siblings(":visible").css('height', '0');
                return false;
            })
        });
    });
}

function rsSlider(slider){
	slider.royalSlider({
        fullscreen: {
            enabled: false,
            nativeFS: true
        },
        controlNavigation: 'thumbnails',
        autoScaleSlider: true, 
        autoScaleSliderWidth: 960,     
        autoScaleSliderHeight: 850,
        loop: false,
        imageScaleMode: 'fit',
        navigateByClick: true,
        numImagesToPreload:2,
        arrowsNav:true,
        arrowsNavAutoHide: true,
        arrowsNavHideOnTouch: true,
        keyboardNavEnabled: true,
        fadeinLoadedSlide: true,
        globalCaption: false,
        globalCaptionInside: false,
        thumbs: {
            appendSpan: true,
            firstMargin: true
        }
    });
	slider.addClass('rendered');
		
}

map();
function map(){
    google.load('maps', '3', {
        other_params: 'sensor=false'
    });
}

function map_initialize(mapBlock) {
	mapBlock.each(function(){
		var currMap = $(this);
		var coordinates = $(this).data('coordinates').split(',');
		var title = $(this).data('title');
		var myMarker = new google.maps.LatLng(coordinates[0],coordinates[1]);
		
		map = new google.maps.Map( this, {
			zoom: 14,
			scrollwheel: false,
			center: myMarker,
			disableDefaultUI: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		var marker1 = new google.maps.Marker({
			position: myMarker,
			map: map,
			title: title,
			icon: 'img/map_marker2.png'
		});
		google.maps.event.addDomListener(window, 'resize', function() {
			map.setCenter(myMarker);
		});
	})
		
    
}