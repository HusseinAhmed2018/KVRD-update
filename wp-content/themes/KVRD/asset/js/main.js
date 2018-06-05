$(document).ready(function () {
    var mySwiper = new Swiper('.home-slider', {
        slidesPerView: 1,
        loop: true,
        spaceBetween: 100,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });

    $('.side-menu i.fa-bars').click(function () {
        $('.side-menu .menu').toggle();
        $('.side-menu i.fa-bars').toggleClass('fa-times');
    });

    $('.photos .img img').click(function () {
        var index = parseInt(this.dataset.index);
        $('.photos .pop-up').show();
        var photoSwiper = new Swiper('.photo-slider', {
            loop: true,
            spaceBetween: 100,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });
        photoSwiper.slideToLoop(index);
    });

    $(document).keyup(function (e) {
        if (e.keyCode == 27) {
            $('.pop-up').hide();
            $('.popUp2').hide();
            var photoSwiper = document.querySelector('.photo-slider').swiper;
            if (photoSwiper) {
                photoSwiper.destroy();
            }
        }
    });

    $('.videos .play .fa-play-circle').click(function () {
        var video = document.getElementById("myVideo");
        video.src = this.dataset.url;
        $('.videos .pop-up').show();
        video.play();
    });

    function stop_propagation(pp) {
        pp.preventDefault();
        pp.stopImmediatePropagation();
    }

    $('.footerItem.toContactUs').click(function (e) {
        stop_propagation(e);
        document.location = 'contactUs.html#map'
    });
    $('.footerItem.toForm').click(function (e) {
        stop_propagation(e);
        document.location = 'contactUs.html#contactForm'
    });
    $('.home-4 .singleImg').hover(function () {
        $(this).toggleClass('magnified')
    });

    $('.drag a').click(function (e) {
        stop_propagation(e);
        document.location = '#firstSection'
    });

    /* projects javascript code */

    $('.aroundMagnifier a').click(function (e) {
        stop_propagation(e);
        var parents = $(this).parents().eq(2);
        console.log(parents.attr('id'));
        var img = parents.children().eq(0);
        $('.popUp2').css('display', 'block');
        $('.popUpImg img').attr('src', img.attr('src'))
    });

    // $('.magnification p a').click(function(e){
    //     stop_propagation(e);
    //     var id = $(this).parents().eq(2).attr('id');
    //     document.location='projects.html#'+id;
    // })
    // $('.sub-menu li').removeClass('head')
    $('.sub-menu .current-menu-item').addClass('head');
    $('.sub-menu .current-menu-item').prepend('<i class="fas fa-angle-right mainColor"></i>')
    $('.closeMyPopup').click(function (e) {
        $('.popUp2').css('display', 'none');
        e.preventDefault();
        e.stopImmediatePropagation();
    })
});

$(window).on('load', function () {
    var pressSwiper = new Swiper('.swiper-container.press-slider', {
        //loop: true,
        spaceBetween: 40,
        slidesPerView: 4,
        centeredSlides: true,
        //loopAdditionalSlides: 50,
        //loopedSlides: 50,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        breakpoints: {
            767: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            991: {
                slidesPerView: 2,
                spaceBetween: 20
            }
        }
    });
});
