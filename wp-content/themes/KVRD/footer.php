
<footer>
    <div class="up">
        <div class="myContainer clearfix">
            <div class="logo">
                <a href="<?=home_url();?>"><img src="<?= get_template_directory_uri().'/asset/images/logo.png';?>" alt=""></a>
            </div>
            <div class="float-left content">
                <ul>
                    <?php

                    $current = get_the_ID();

                    if($current != 21){
                        $link1 = get_page_link( 21 );
                        $link2 = get_page_link( 21 );
                    }else{
                        $link1 = '';
                        $link2 = '';
                    }

                    ?>
                    <li><a href="<?=$link1; ?>#map" class="footerItem">OUR LOCATION</a></li>
                    <li><a href="">DISCLAIMER</a></li>
                    <li><a href="<?=$link2; ?>#contactForm" class="footerItem">EMAIL US</a></li>
                    <li>
                        <p class="white">for newsletter</p>

                        <form action="" class="position-relative">

                            <p style="display: none;" class="wrongEmail position-absolute">
                                <i class="fas fa-times"></i>
                                Wrong Email
                            </p>

                            <input id="news_email" type="email" required>

                            <button id="idForm">
                                SUBSCRIBE
                                <i class="fas fa-envelope"></i>
                            </button>
                        </form>

                    </li>

                </ul>

                <?php

                $facebook = get_post_meta(21,'facebook',true);
                $instagram = get_post_meta(21,'instagram',true);
                $twitter = get_post_meta(21,'twitter',true);
                $Linkedin = get_post_meta(21,'linkedin',true);

                ?>
                <div class="socialIcons clearfix float-left">
                    <a href="<?=$facebook;?>" class="item d-flex justify-content-center align-items-center">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="<?=$twitter;?>" class="item d-flex justify-content-center align-items-center">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="<?=$instagram;?>" class="item d-flex justify-content-center align-items-center">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="<?=$Linkedin;?>" class="item d-flex justify-content-center align-items-center">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <div class="down">
        <div class="myContainer text-right position-relative">
            <div class="downContent">
                <div class="smallLogo d-inline-block">
                    <img src="<?= get_template_directory_uri().'/asset/images/logo.png';?>" alt="">
                </div>
                <span class="white">Contact Us | KVRD 2018 @ All Rights Reserved </span>
            </div>
            <div class="drag position-absolute text-center">
                <a href="#">
                    <i class="fas fa-angle-up white"></i>
                </a>
            </div>
        </div>

    </div>
</footer>
<script>
    var video = document.getElementById("myVideo");
    var btn = document.getElementById("myBtn");
    // video.onended = function(e) {
    //         btn.innerHTML = '<i class="far fa-play-circle"></i>'
    //
    //     };
    function myFunction() {
        // if (video.paused) {
        //     video.play();
        //     btn.innerHTML = '<i class="fas fa-pause-circle"></i>'
        //
        // } else {
        //     video.pause();
        //     btn.innerHTML = '<i class="far fa-play-circle"></i>'
        //
        // }
        $('#image').css('display', 'none');
        $('#my-video').css('display', 'block')
    }
</script>

<script type="text/javascript">
    $(function() {

        $('#idForm').click(function (e) {
            e.preventDefault();
            var email = $( "#news_email" ).val();

            $.ajax({
                type: 'POST',
                dataType: "json",
                url: ajaxurl,
                cache: false,
                data: {"action": "news_letter", email: email },
                success: function(data) {

                    // console.log(data[0].error);
                    error   = data[0].error;
                    success = data[0].success;

                    if(data[0].error != ''){
                        $( ".wrongEmail" ).html( '<i class="fas fa-times"></i> ' + error );
                        $('.wrongEmail').css('display', 'block');
                    }else{
                        // console.log(data[0].success);
                        $('.wrongEmail').css('display', 'none');
                        $(".alert-success").fadeTo(2000, 5000).slideUp(5000, function(){
                            $(".alert-success").slideUp(5000);
                        });
                        $( ".alert" ).html( '<strong>Success!</strong> ' + success );

                    }

                }
            });
        });


    });
</script>
</body>
</html>