$(document).ready(() => { 

    // globale vars

    // fixed header 
    $(this).scroll(function (e) {
        if ($(this).scrollTop() > 150) {
            $('header').addClass('fixed');
            $('header').css('top', '0px');
        } else {
            $('header').removeClass('fixed');
            $('header').css('top', '-82px');
        }
    });

    /* start all section owlCarousel */

        var GlobaleStateOwlCarousel = {
            items: 1,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayHoverPause: true            
        }


        $(".main_slider .owl-carousel").owlCarousel({
            ...GlobaleStateOwlCarousel,
            autoplayTimeout: 4000,
        });

        $(".wrap_sub_slider_1 .owl-carousel").owlCarousel({
            ...GlobaleStateOwlCarousel,
            autoplayTimeout: 6000,
        });
        
        $(".wrap_sub_slider_2 .owl-carousel").owlCarousel({
            ...GlobaleStateOwlCarousel,
            autoplayTimeout: 4000,
        });
        
        $(".wrap_sub_slider_3 .owl-carousel").owlCarousel({
            ...GlobaleStateOwlCarousel,
            autoplayTimeout: 6000,
        });        


        $(".sliders_blogs.owl-carousel").owlCarousel({
            items: 4,
            dots: true,
            loop: true,
            dotsEach: 2,
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    dotsEach: true,
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });


        $(".sliders_posts.owl-carousel").owlCarousel({
            items: 3,
            loop: true,
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    dotsEach: true,
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    
    /* end all section owlCarousel */

    /* start all function drop down */

        $('.btn_sm_navbar').click(function (e) {

            $('.nav_bar').animate({
                left: 0
            }, 300, () => {
                $('.over_lay').fadeIn(50, () => {
                    $('.over_lay').focus()
                });
            })
            
        });

        $('.btn_md_screen').click(function (e) {
            if (!$('.aside_lg_screen').hasClass('show')) {
                $('.aside_lg_screen').animate({
                    left: 0
                }, 300, () => $('.aside_lg_screen').addClass('show'))
            } else {
                $('.aside_lg_screen').animate({
                    left: '-100%'
                }, 300, () => $('.aside_lg_screen').removeClass('show'))                
            }
            
        });        
        
    
    /* end all function drop down */

    /* start all function hide & show */


        // this function to open the box search

        function fade(el, fade, ms, callback) {
            $(el)[fade](ms, 'linear', callback)
        }

        $('.box_search i').click(function (e) { 
            fade('.overlay_search', 'fadeIn' ,100, () => {
                $('.overlay_search input').focus()
            })
        });

        // if use click in escape button the box search will hide
        $('.overlay_search').keyup(function (e) { 
            if (e.keyCode == 27) {
                fade('.overlay_search', 'fadeOut' ,100)
            }
        });

        $('.overlay_search').click(function (e) { 
            fade('.overlay_search', 'fadeOut' ,100)
        });

        $('.over_lay').keyup(function (e) {
            
            if (e.keyCode == 27) {
                $('.nav_bar').animate({
                    left: '-100%'
                }, 300, () => {
                    fade('.over_lay', 'fadeOut', 50)
                })
            }
        });       

        $('.over_lay').click(function (e) { 
            $('.nav_bar').animate({
                left: '-100%'
            }, 300, () => {
                fade('.over_lay', 'fadeOut', 50)
            })
        });
       

        $('.nav_bar').keyup(function (e) {

            if (e.keyCode == 27) {
                $('.nav_bar').animate({
                    left: '-100%'
                }, 300, () => {
                    fade('.over_lay', 'fadeOut', 50)
                })
            }
        });

        $('.aside_lg_screen').keyup(function (e) {

            if (e.keyCode == 27) {
                $('.aside_lg_screen').animate({
                    left: '-100%'
                }, 300, () => {
                    fade('.over_lay', 'fadeOut', 50)
                })
            }
        });        

        $('.btn_floating').click(function (e) { 
            fade('.contact_us', 'fadeIn' ,100, () => $('.contact_us').focus())
        });
        
        
        $('.contact_us').click(function (e) { 
            e.stopPropagation()
            fade('.contact_us', 'fadeOut' ,100)
        });
        

        $('.wrap_contact').click(function (e) { 
            e.stopPropagation()
        });  
        
        $('.contact_us').keyup(function (e) {
            if (e.keyCode == 27) {
                fade('.contact_us', 'fadeOut', 100)
            }
        })

        $('.btn_report').click(function (e) { 
            fade('.form_report', 'fadeIn' ,100, () => $('.form_report').focus())
        });


        $('.form_report').click(function (e) { 
            e.stopPropagation()
            fade('.form_report', 'fadeOut' ,100)
        });
        
        
        $('.form_report').keyup(function (e) {
            if (e.keyCode == 27) {
                fade('.form_report', 'fadeOut', 100)
            }
        }) 
        
        /////////////////////////
        $('.Advertise').click(function (e) { 
            fade('.form_advertise', 'fadeIn' ,100, () => $('.form_advertise').focus())
        });


        $('.form_advertise').click(function (e) { 
            e.stopPropagation()
            fade('.form_advertise', 'fadeOut' ,100)
        });
        
        
        $('.form_advertise').keyup(function (e) {
            if (e.keyCode == 27) {
                fade('.form_advertise', 'fadeOut', 100)
            }
        })  
        /////////////////////        
        
        $('.forget').click(function (e) { 
            fade('.form_auth.forget', 'fadeIn' ,100, () => $('.form_auth.forget').focus())
        });
        
        $('.close_forget').click(function (e) { 
            fade('.form_auth.forget', 'fadeOut', 100)
        });    
        
        $('.reg').click(function (e) { 
            fade('.form_auth.register', 'fadeIn' ,100, () => $('.form_auth.register').focus())
        });
        
        $('.close_register').click(function (e) { 
            fade('.form_auth.register', 'fadeOut', 100)
        });

        $('.ask_now').click(function (e) { 
            fade('.form_auth.ask_questions', 'fadeIn' ,100, () => $('.form_auth.register').focus())
        });
        
        $('.close_ask_questions').click(function (e) { 
            fade('.form_auth.ask_questions', 'fadeOut', 100)
        });         


        $('.close_newslatter').click(function (e) { 
            fade('.wrap_new_sletter', 'fadeOut', 100)
        }); 

        $('.share span').click(function (e) { 

            if (!$('.wrap_social_share').hasClass('show')) {
                fade('.wrap_social_share', 'fadeIn', 100, $('.wrap_social_share ul').animate({
                    height: '145px'
                }, 300, () => {
                    $('.wrap_social_share').addClass('show')
                }))

            } else {
                $('.wrap_social_share ul').animate({
                    height: '0px'
                }, 300, () => {
                    fade('.wrap_social_share', 'fadeOut', 100, () => $('.wrap_social_share').removeClass('show'))                
                })
            }   
        });        
        
             

    /* end all function hide & show */

    /* start all function toggle tabs */

    $('.tabs li a').click(function (e) { 
        e.preventDefault();
        $(this).addClass('active')
        $(this).parent().siblings().children().removeClass('active')
    });

    /* end all function toggle tabs */

    /* start all function push and delete */
    var myInput =  $('[name=tags]').tagify();
    
    /* end all function push and delete*/
    

    /* start function will be after window loading & and setTime */
    setTimeout(() => {
        fade('.wrap_new_sletter', 'fadeIn', 100)
    }, 10000)
    /* end function will be after window loading & and setTime */

    // start use lib nicescroll
    $("body, .contact_us").niceScroll({
        cursorcolor:"#9f7aea",
        cursorwidth:"5px",
        background:"#aaa",
        cursorborder:"1px solid #9f7aea",
        cursorborderradius:10
    });
    
})