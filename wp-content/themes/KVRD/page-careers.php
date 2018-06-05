<?php get_header(); ?>

<?php // Show the selected careers content.
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>

        <section class="carrer1 background position-relative d-flex justify-content-center" id="firstSection">

        </section>
        <section class="carrer2">
            <div class="myContainer">
                <p class="f-30 formTitle">Application for employment</p>

                <form action="" id="preview_form">

                    <!-- first table -->
                    <p class="tableHeader f-28">
                        Personal Information
                    </p>
                    <div class="row">
                        <div class="col">
                            <input name="name" type="text" placeholder="Name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-4">
                            <input name="address" type="text" placeholder="Address" class="form-control border_right">
                        </div>
                        <div class=" col-md-3">
                            <input name="city" type="text" placeholder="City" class="form-control border_right">
                        </div>
                        <div class=" col-md-3">
                            <input name="state" type="text" placeholder="State" class="form-control border_right">
                        </div>
                        <div class=" col-md-2">
                            <input name="zip" type="text" placeholder="Zip" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-4">
                            <input name="phone" type="text" placeholder="Phone Number" class="form-control border_right">
                        </div>
                        <div class=" col-md-8">
                            <input name="carrer_email" type="email" placeholder="Email Address" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input name="military" type="text" placeholder="military Status" class="form-control">
                        </div>
                    </div>
                    <!-- end of first table -->

                    <!-- second Table -->
                    <p class="tableHeader f-28">
                        Position
                    </p>
                    <div class="row">
                        <div class="col-md-4">
                            <input name="position" type="text" placeholder="position you are applying for" class="form-control border_right">
                        </div>
                        <div class="col-md-6">
                            <input name="start_date" type="text" placeholder="Available start date" class="form-control border_right">
                        </div>
                        <div class="col-md-2">
                            <input name="pay" type="text" placeholder="Desired pay" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Employment desired</label>
                                <br>
                                <div class="d-flex justify-content-around">
                                    <label class="radio-inline"><input type="radio" name="optradio" value="Full Time">Full Time</label>
                                    <label class="radio-inline"><input type="radio" name="optradio" value="Part Time">Part Time</label>
                                    <label class="radio-inline"><input type="radio" name="optradio" value="Seasonal / temporary">Seasonal / Temporary</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of second Table -->

                    <!-- third Table -->
                    <p class="tableHeader f-28">
                        Education
                    </p>
                    <div class="row">
                        <div class="col-md-2">
                            <input name="school" type="text" placeholder="School Name" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input name="location" type="text" placeholder="Location" class="form-control border_right">
                        </div>
                        <div class="col-md-3">
                            <input name="school_year" type="text" placeholder="Year SattEnded" class="form-control border_right">
                        </div>
                        <div class="col-md-3">
                            <input name="degree" type="text" placeholder="Degree Received" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input name="major" type="text" placeholder="Major" class="form-control">
                        </div>
                    </div>

                    <!-- end of third Table -->
                    <!-- fourth table -->
                    <p class="tableHeader f-28">
                        Employment History
                    </p>
                    <table class="table">
                        <div class="row">
                            <div class="col-md-4">
                                <input name="employer1" type="text" placeholder="Employer1" class="form-control aperturaBold">
                            </div>
                            <div class="col-md-4">
                                <input name="job_emp1" type="text" placeholder="job title" class="form-control border_right">
                            </div>
                            <div class="col-md-4">
                                <input name="dates_emp1" type="text" placeholder="Dates Employed" class="form-control border_right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input name="phone_emp1" type="text" placeholder="Work Phone" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input name="start_pay_emp1" type="text" placeholder="starting pay rate" class="form-control border_right">
                            </div>
                            <div class="col-md-4">
                                <input name="end_pay_emp1" type="text" placeholder="Ending Pay rate" class="form-control border_right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input name="address_emp1" type="text" placeholder="Address" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <input name="city_emp1" type="text" placeholder="City" class="form-control border_right">
                            </div>
                            <div class="col-md-2">
                                <input name="state_emp1" type="text" placeholder="State" class="form-control border_right">
                            </div>
                            <div class="col-md-4">
                                <input name="zip_emp1" type="text" placeholder="Zip" class="form-control border_right">
                            </div>
                        </div>

                        <!-- second employer -->
                        <div class="row">
                            <div class="col-md-4">
                                <input name="employer2" type="text" placeholder="Employer2" class="form-control aperturaBold">
                            </div>
                            <div class="col-md-4">
                                <input name="job_emp2" type="text" placeholder="job title" class="form-control border_right">
                            </div>
                            <div class="col-md-4">
                                <input name="dates_emp2" type="text" placeholder="Dates Employed" class="form-control border_right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input name="phone_emp2" type="text" placeholder="Work Phone" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input name="start_pay_emp2" type="text" placeholder="starting pay rate" class="form-control border_right">
                            </div>
                            <div class="col-md-4">
                                <input name="end_pay_emp2" type="text" placeholder="Ending Pay rate" class="form-control border_right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input name="address_emp2" type="text" placeholder="Address" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <input name="city_emp2" type="text" placeholder="City" class="form-control border_right">
                            </div>
                            <div class="col-md-2">
                                <input name="state_emp2" type="text" placeholder="State" class="form-control border_right">
                            </div>
                            <div class="col-md-4">
                                <input name="zip_emp2" type="text" placeholder="Zip" class="form-control border_right">
                            </div>
                        </div>

                        <!-- third employer -->
                        <div class="row">
                            <div class="col-md-4">
                                <input name="employer3" type="text" placeholder="Employer3" class="form-control aperturaBold">
                            </div>
                            <div class="col-md-4">
                                <input name="job_emp3" type="text" placeholder="job title" class="form-control border_right">
                            </div>
                            <div class="col-md-4">
                                <input name="dates_emp3" type="text" placeholder="Dates Employed" class="form-control border_right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input name="phone_emp3" type="text" placeholder="Work Phone" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input name="start_pay_emp3" type="text" placeholder="starting pay rate" class="form-control border_right">
                            </div>
                            <div class="col-md-4">
                                <input name="end_pay_emp3" type="text" placeholder="Ending Pay rate" class="form-control border_right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input name="address_emp3" type="text" placeholder="Address" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <input name="city_emp3" type="text" placeholder="City" class="form-control border_right">
                            </div>
                            <div class="col-md-2">
                                <input name="state_emp3" type="text" placeholder="State" class="form-control border_right">
                            </div>
                            <div class="col-md-4">
                                <input name="zip_emp3" type="text" placeholder="Zip" class="form-control border_right">
                            </div>
                        </div>
                    </table>
                    <!-- end of fourth table -->
                    <div class="row justify-content-center">
                        <button id="careers_Form" class="f-13">
                            SEND Application
                        </button>
                    </div>
                </form>
            </div>
        </section>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {

                $('#careers_Form').click(function (e) {
                    e.preventDefault();
                    var datastring = $("#preview_form").serializeArray();

                    // console.log(datastring);
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: ajaxurl,
                        cache: false,
                        data: {"action": "careers", datastring: datastring},
                        success: function(data) {
                            
                            // console.log(data);
                            error   = data[0].error;
                            success = data[0].success;

                            if(data[0].error != ''){
                                $('#alert_danger').empty();
                                
                                for(i=0; i < data.length; i++ ){
                                    // console.log(data[i].error);

                                    $('#alert_danger'). append('<div id="danger'+i+'" class="alert alert-danger text-center"></div>');
                                    $( "#danger"+i ).append( '<strong>Error!</strong> ' + data[i].error );

                                }

                                 $("#alert_danger").fadeTo(2000, 5000).slideUp(5000, function(){
                                    $("#alert_danger").slideUp(5000);
                                });


                            }else{

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
    <?php
    endwhile;
endif;
?>


<?php get_footer(); ?>