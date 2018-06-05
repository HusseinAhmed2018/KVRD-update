<?php get_header();?>

    <video muted loop class="myVideo" id="myVideo">
        <source src="<?= get_template_directory_uri().'/asset/images/small.webm';?>" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    <div class="position-absolute play">
        <a href="#" id="myBtn" onclick="myFunction()">
            <i class="far fa-play-circle"></i>
        </a>
    </div>
</section>

<section class="home-2 d-flex justify-content-center align-items-center">
    <div class="sliderContainer d-flex align-items-center">
        <div class="swiper-container home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide knowledge">
                    <div class="aroundSlider">
                        <div class="d-flex justify-content-center inAround">
                            <p class="aperturaMedium">knowledge</p>
                            <p class="f-13">
                                Knowledge lies at the forefront of all our operations, serving as the key foundation on
                                which we develop exceptional research-based strategies that help identify
                                pressing market needs to build unparalleled quality projects with competitive prices,
                                and
                                unmatched value exceeding customers’ every expectation. It also arms us to stay ahead of
                                competition by constantly making well-informed decisions at all times.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide vision">
                    <div class="aroundSlider">
                        <div class="d-flex justify-content-center inAround">
                            <p class="aperturaMedium">Vision</p>
                            <p class="f-13"> Our vision is not just a “picture-perfect” dream of what could be, but
                                rather a sound planned reality driven by in-depth research that guides us every step of
                                the way to create iconic projects where communities can experience the best of
                                integrated living, while we relentlessly work with passion to own a leading market
                                position.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide research">
                    <div class="aroundSlider">
                        <div class="d-flex justify-content-center inAround">
                            <p class="aperturaMedium">Research</p>
                            <p class="f-13"> Research is our vital tool in developing groundbreaking solutions and
                                future-focused projects that meet Egypt’s ever-changing needs. It supports us to
                                transform our vision into an impressive investment reality based on a strategic plan
                                that sets our well-crafted communities apart from competition.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide dev">
                    <div class="aroundSlider">
                        <div class="d-flex justify-content-center inAround">
                            <p class="aperturaMedium">Development</p>
                            <p class="f-13 aperturaBold">
                                We are constantly searching for innovative strategies to grow our business through key partnerships that meet Egypt’s growing demand on quality housing, as wel l as commercial and retail spaces, boasting a solid track record of delivering unique
                                communities that empower integrated living in Egypt while emerging as a strong real estate developer synonymous with credibility and trust.  </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </div>
</section>

<section class="white-bg">
    <div class="img-text d-lg-flex justify-content-start no-gutters pl-lg-0 pb-lg-0">
        <div class="img img-centered col-lg-8" style="margin-right: -15%">
            <img src="<?= get_template_directory_uri().'/asset/images/street.jpg'?>">
        </div>
        <div class="text col-lg-6 align-self-center height-450 on-top">

            <p class="text-uppercase title f-28"><span style="color: #306f87;">What <br> makes us</span> unique?</p>
            <p class="f-18">Our core strength lies in KVRD’s Research Foundation
                that works around the clock to seize every opportunity
                to develop beJer integrated communities through
                practical research, on-going educational programs and
                outreach activities that aim at supporting each of our
                real estate developments by transforming them into
                comprehensive hubs that exceed the demands of our
                clients, today and in the future. KVRD’s expert team of
                professionals help prospect investors get their strategy
                right, not only ensuring they make the best choices that
                best suit their investment needs, but also guarantee
                remarkable outcomes at all times.</p>
        </div>
    </div>
</section>

<section class="home-4">
    <div class="clearfix">
        <div class="singleImg" id="firstProject">
            <img src="<?= get_template_directory_uri().'/asset/images/overlap.jpg'?>" alt="" class="outerImg">
            <div class="projectName">
                <p class="MyriadPro-Regular f-18 firstName">POLARIS</p>
            </div>
            <div class="magnification position-absolute text-center d-none">
                <div class="aroundMagnifier d-flex justify-content-center align-items-center">
                    <a href="#" class="fas fa-search-plus white f-28"></a>
                </div>
                <p>
                    <a href="#" class="f-11">OVERVIEW</a>
                    <span class="sep">/</span>
                    <a href="#" class="f-11">LOCATION</a>
                    <span class="sep">/</span>
                    <a href="#" class="f-11">PROPERTY</a>
                </p>
            </div>
            <div class="popUp2">
                <div class="d-flex justify-content-center popUpImg img-centered col-6">
                    <img src="<?= get_template_directory_uri().'/asset/images/overlap.jpg';?>" alt="" class="outerImg">
                </div>
            </div>
        </div>
        <div class="singleImg" id="secondProject">
            <img src="<?= get_template_directory_uri().'/asset/images/overlap2.jpg'?>" alt="" class="outerImg">
            <div class="projectName">
                <p class="f-18 MyriadPro-Regular white">SIDEWALK</p>
            </div>
            <div class="magnification position-absolute text-center d-none">
                <div class="aroundMagnifier d-flex justify-content-center align-items-center">
                    <a href="#" class="fas fa-search-plus white f-28"></a>
                </div>
                <p>
                    <a href="#" class="f-11">OVERVIEW</a>
                    <span class="sep">/</span>
                    <a href="#" class="f-11">LOCATION</a>
                    <span class="sep">/</span>
                    <a href="#" class="f-11">PROPERTY</a>
                </p>
            </div>
            <div class="popUp2">
                <div class="d-flex justify-content-center popUpImg img-centered col-6">
                    <img src="<?= get_template_directory_uri().'/asset/images/overlap2.jpg';?>" alt="" class="outerImg">
                </div>
            </div>
        </div>
    </div>
    <a href="projects.html" class="f-28 text-center footer">
        <span>OUR</span>
        <span class="aperturaMedium">PROJECTS</span>
    </a>
</section>

<?php get_footer(); ?>