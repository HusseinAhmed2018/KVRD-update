$(window).ready(function () {
    var video = document.getElementById("myVideo");
    var btn = document.getElementById("myBtn");
    $('.play').click(function () {
        if ($('#myVideo').hasClass('opened')) {
            if (video.paused) {
                video.play();
                btn.innerHTML = '<i class="fas fa-pause-circle"></i>'

            } else {
                video.pause();
                btn.innerHTML = '<i class="fas fa-play-circle"></i>'
            }
        }
        else {
            $('#myVideo').addClass('opened');
            $('.forVideo').css('display', 'none');
            $('#myVideo').css('display', 'block');
            btn.innerHTML = '<i class="fas fa-pause-circle"></i>'
        }

    });
    if (video != null) {
        video.onended = function (e) {
            btn.innerHTML = '<i class="far fa-play-circle"></i>'
        };
    }

    // home first slider
    var homeFirstSlider = new Swiper('.home-first-slider', {
        slidesPerView: 1,
        navigation: {
            nextEl: '.swiper-button-next.allWordsbtn',
            prevEl: '.swiper-button-prev.allWordsbtn',
        },
    });
    var designSlider = new Swiper('.design-slider', {
        slidesPerView: 1,
        navigation: {
            nextEl: '.designBtn.swiper-button-next',
            prevEl: '.designBtn.swiper-button-prev',
        },
        observer: true,
        observeParents: true,
    });
    var constructionSlide = new Swiper('.construction-slider', {
        slidesPerView: 1,
        navigation: {
            nextEl: '.constructionBtn.swiper-button-next',
            prevEl: '.constructionBtn.swiper-button-prev',
        },
        observer: true,
        observeParents: true,
    });

    $('.flexslider').flexslider({
        animation: "slide",
        loop: false,
        // start: function (slider) {
        //     $('.flex-active-slide').next().click(function (event) {
        //         event.preventDefault();
        //         slider.flexAnimate(slider.getTarget("next"));
        //     });
        // }
    });
    $('.flex-next').prepend('<span class="mr-3 lightGray">/</span>');

    /* add more inputs when clicking new Experience */
    var count = 0;
    var empNo = 2;
    var el = document.getElementsByClassName('singleEmployee');
    if (el.length != 0) {
        var data = (document.getElementsByClassName('singleEmployee')[0]).outerHTML;
        $('.historyBtn').click(function (e) {
            e.preventDefault();
            $('.toAppend').append(data);
            count++;
            el[count].getElementsByTagName('span')[0].innerText = "Employer " + parseInt(empNo);
            var input = el[count].getElementsByTagName('input');
            for (var i = 0; i < input.length; i++) {
                var attributeName = (input[i].getAttribute('placeholder')).toLowerCase() + parseInt(empNo);
                input[i].setAttribute('name', attributeName.replace(/\s/g, ''));
            }
            empNo++;
        });
    }

    $('.searchIcon').click(function (e) {
        var parent = $(this).parents().eq(2);
        parent.find('.searchForm').css('display', 'inline-block');
        parent.find('.toHide').css('display', 'none');
    });
    $('.navIcon').click(function () {
        $('.responsiveMenu').addClass('displayResponsive')
    });
    $('.closeSubMenu').click(function () {
        $('.responsiveMenu').removeClass('displayResponsive')
    });

    function activateSlider(clickedIndex) {
        $('.gallery .gallerySlider[data-index=' + clickedIndex + "]").addClass('slider-opened');
        $('.gallery .common[data-index=' + clickedIndex + "]").css('display', 'block');
    }

    $('.galleryData a').click(function (e) {
        $('.galleryData a i').remove();
        $('.galleryData a').removeClass('mainColor ');
        $(this).prepend('<i class="fas fa-caret-right m-0"></i>');
        $(this).addClass('mainColor ');
        var clickedIndex = $(this).attr('data-index');
        var openedIndex = $('.gallery .slider-opened').attr('data-index')
        if (clickedIndex != openedIndex) {
            $('.gallery .slider-opened').removeClass('slider-opened');
            $('.gallery .common').css('display', 'none');
            activateSlider(clickedIndex);
        }
    });
});