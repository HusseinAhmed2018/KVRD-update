<?php get_header();
if (have_posts()):
    $id = get_the_ID();
    $allow = get_post_meta($id, 'allow');
?>

    <section style="background-image: url('<?= get_template_directory_uri().'/asset/images/carrers.png';?>'); background-size: cover" class="firstSection">
        <div class="myContainer position-relative">
            <div class="mainColorBg position-absolute commonDiv">
                <h1 class="white letter-4"><?=(($allow[0] == 1)? 'Apply Now': 'CAREERS');?></h1>
                <div class="smallHr"></div>
                <div class="row">
                    <p class="white desc letter-4 twoLines col-10 f-normal">
                        It is a long established fact that a reader will be distracted by the readable content of a page when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
                        of letters, as opposed to using ‘Content here, content here’, making it look like readable English. Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a
                        search for ‘lorem ipsum’ will uncover many web sites still in their infancy. Various versions have
                        evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php if($allow[0] == 1):?>
    <section class="p-ver-40 pb-0">
        <div class="myContainer">
            <p class="mainColor f-lg letter-4">
                APPLICATION FOR
            </p>
            <p class="mainColor f-lg letter-4">
                EMPLOYMENT
            </p>
            <div class="smallHr mainColorBg"></div>
        </div>
        <form id="careers_Form" action="" class="applicationForm">
            <div class="personalInfo">
                <div class="myContainer">
                    <p class="aperturaRegular f-big mainColor">Personal Information</p>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="name" id="name" type="text" placeholder="NAME" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="address" type="text" placeholder="ADDRESS" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <select name="city" class="form-control">
                                    <option>Cairo</option>
                                    <option>City</option>
                                    <option>City</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <select name="state" class="form-control">
                                    <option>State</option>
                                    <option>State</option>
                                    <option>State</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="zip" type="text" placeholder="ZIP" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="phone" id="phone" type="text" placeholder="PHONE NUMBER" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="military" type="text" placeholder="MILITARY STATUS" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="carrer_email" id="carrer_email" type="email" placeholder="EMAIL" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position grayBg">
                <div class="myContainer">
                    <p class="aperturaRegular f-big mainColor">Position</p>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <select name="position" class="form-control">
                                    <option>POSITION YOU ARE APPLYING FOR</option>
                                    <option>POSITION YOU ARE APPLYING FOR</option>
                                    <option>POSITION YOU ARE APPLYING FOR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="start_date" type="text" placeholder="AVAILABLE START DATE" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="pay" type="text" placeholder="DESIRED PAY" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="clearfix mt-4">
                                <span class="mainColor aperturaBold f-12 mb-4 float-left">EMPLOYMENT DESIRED</span>
                                <div class="float-left row justify-content-lg-center col-lg-10">
                                    <label class="aperturaRegular position-relative mainColor f-12 col-6 col-lg-3">
                                        Full Time
                                        <input type="radio" class="radio" name="radio" value="Full Time">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="aperturaRegular position-relative mainColor f-12 col-6 col-lg-3">
                                        Part Time
                                        <input type="radio" name="radio" class="radio" value="Part Time">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="aperturaRegular position-relative mainColor f-12 col-10 col-lg-3">
                                        Seasonal / Temporary
                                        <input type="radio" name="radio" class="radio" value="Seasonal / Temporary">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="education">
                <div class="myContainer">
                    <p class="aperturaRegular f-big mainColor">Education</p>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="school" type="text" placeholder="SCHOOL NAME" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="location" type="text" placeholder="LOCATION" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="school_year" type="text" placeholder="YOUR SATTENDED" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="degree" type="text" placeholder="DEGREE RECEIVED" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <input name="major" type="text" placeholder="MAJOT" class="form-control">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="position grayBg">
                <div class="myContainer">
                    <p class="aperturaRegular f-big mainColor">Employment History</p>
                    <div class="toAppend">
                        <div class="singleEmployee">
                            <span class="f-18 aperturaBold mb-4 d-inline-block mainColor">EMPLOYER 1</span>
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" placeholder="JOB TITLE" class="form-control" name="jobTitle1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" placeholder="DATES EMPLOYED" class="form-control" name="datesEmployed1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" placeholder="WORK PHONE" class="form-control" name="workPhone1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" placeholder="STARTING PAY RATE" class="form-control" name="startPayRate1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" placeholder="ENDING PAY RATE" class="form-control" name="endPayRate1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" placeholder="ADDRESS" class="form-control" name="address1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" placeholder="CITY" class="form-control" name="city1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" placeholder="STATE" class="form-control" name="state1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" placeholder="ZIP" class="form-control" name="zip1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="mainColorBg aperturaRegular white border-0 col-md-4 historyBtn">
                        New Employer Experience <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="portfolio">
                <div class="myContainer">
                    <div class="row m-0">
                        <button class="mainColorBg aperturaRegular white border-0 col-md-4 historyBtn">
                            Add Portfolio <i class="fas fa-plus"></i>
                        </button>
                        <div class="col-md-8 letter-4 p-0">
                            <p class="mainColor">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="position grayBg">
                <div class="myContainer text-center">
                    <button type="submit" class="mainColorBg white border-0">Submit</button>
                </div>
            </div>

        </form>
    </section>
    <?php else:?>
    <section class="allProjects mrg-btm-lg">
        <div class="myContainer">
            <p class="text-right mainColor f-lg mrg-btm-xg">NO OPEN VACANCIES</p>
        </div>
    </section>
    <?php endif;?>
<?php
endif;
?>

    <script type="text/javascript">
        $(function() {

            $('#careers_Form').submit(function (e) {
                e.preventDefault();
                var datastring = $("#careers_Form").serializeArray();

                var name        = $( "#name" ).val();
                var email       = $( "#carrer_email" ).val();
                var number      = $( "#phone" ).val();

                var errors = [];

                if(email == ''){
                    errors.push("email its required");
                }

                if(number == ''){
                    errors.push('number its required!');
                }else{
                    if(number.length < 8 || number.length >15){
                        errors.push('Invalid number format!');
                    }
                }

                if(name == ''){
                    errors.push("please type your name");
                }

                if(errors != ''){
                    $('#alert_danger').empty();

                    for (i = 0; i < errors.length; i++) {
                        // console.log(errors[i]);

                        $('#alert_danger').append('<div id="danger' + i + '" class="alert alert-danger text-center"></div>');
                        $("#danger" + i).append('<strong>Error!</strong> ' + errors[i]);

                    }

                    $("#alert_danger").fadeTo(9000, 9000).slideUp(9000, function () {
                        $("#alert_danger").slideUp(9000);
                    });
                }

                // console.log(errors);
                if(errors == '') {
                    console.log(datastring);
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: ajaxurl,
                        cache: false,
                        data: {"action": "careers", datastring: datastring},
                        success: function (data) {

                            console.log(data);
                            error = data[0].error;
                            success = data[0].success;

                            if (data[0].error != '') {
                                $('#alert_danger').empty();

                                for (i = 0; i < data.length; i++) {
                                    // console.log(data[i].error);

                                    $('#alert_danger').append('<div id="danger' + i + '" class="alert alert-danger text-center"></div>');
                                    $("#danger" + i).append('<strong>Error!</strong> ' + data[i].error);

                                }

                                $("#alert_danger").fadeTo(9000, 9000).slideUp(9000, function () {
                                    $("#alert_danger").slideUp(9000);
                                });


                            } else {

                                $(".alert-success").fadeTo(9000, 9000).slideUp(9000, function () {
                                    $(".alert-success").slideUp(9000);
                                });
                                $(".alert").html('<strong>Success!</strong> ' + success);

                            }
                        }
                    });
                }
            });


        });
    </script>

<?php get_footer(); ?>