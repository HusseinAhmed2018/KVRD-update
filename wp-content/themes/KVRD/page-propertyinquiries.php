<?php get_header(); ?>

<?php // Show the selected property content.
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>

        <section class="property-1 position-relative d-flex background" id="firstSection">

            <p class="align-self-center white pageHead">
                <span class="d-block">PROPERTY</span>
                <span class="d-block">INQUIRIES</span>
            </p>
        </section>

        <section class="property-2">
            <p>PLEASE WRITE YOUR DETAILS HERE:</p>

            <form action="">
                <div class="form-group">
                    <div class="row">
                        <label for="name" class="f-22 col-md-4 p-0">Full Name :</label>
                        <input id="name" type="text" class="form-control f-input col-md-8" id="name" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="email" class="f-22 col-md-4 p-0">Email:</label>
                        <input id="prop_email" type="email" class="form-control f-input col-md-8" id="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="mobile" class="f-22 col-md-4 p-0">Mobile :</label>
                        <input id="mobile" min="1" max="5" type="text" class="form-control f-input col-md-8" id="mobile"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row position-relative">
                        <label for="owner" class="f-22 col-md-4 p-0">KVRD Homeowner : </label>
                        <i class="fas fa-angle-down"></i>
                        <select name="" id="owner" class="form-control f-input col-md-8">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row position-relative">
                        <label for="project" class="f-22 col-md-4 p-0">Projects of Interest : </label>
                        <i class="fas fa-angle-down"></i>
                        <select name="" id="project" class="form-control f-input col-md-8">
                            <option value="">Select one of the projects below</option>
                            <option value="project1">Project 1</option>
                            <option value="project2">Project 2</option>
                            <option value="project3">Project 3</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row position-relative">
                        <label for="type" class="f-22 col-md-4 p-0">Type :</label>
                        <i class="fas fa-angle-down"></i>
                        <select name="" id="type" class="form-control f-input col-md-8">
                            <option value="">Select Type</option>
                            <option value="type1">Type 1</option>
                            <option value="type2">Type 2</option>
                            <option value="type3">Type 3</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="bedroom" class="f-22 col-md-4 p-0">Bedroom Number :</label>
                        <input type="text" id="bedroom" class="form-control f-input col-md-8">
                    </div>
                </div>

                <button id="prop_submit" type="submit" class="aperturaMedium">
                    SUBMIT
                </button>
            </form>
        </section>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(function () {

                $('#prop_submit').click(function (e) {
                    e.preventDefault();
                    var name = $("#name").val();
                    var email = $("#prop_email").val();
                    var mobile = $("#mobile").val();
                    var owner = $("#owner").val();
                    var project = $("#project").val();
                    var type = $("#type").val();
                    var bedroom = $("#bedroom").val();

                    var errors = [];

                    if(email == ''){
                        errors.push("email its required");
                    }

                    if(mobile == ''){
                        errors.push('number its required!');
                    }else{
                        if(mobile.length < 8 || mobile.length >15){
                            errors.push('Invalid number format!');
                        }
                    }


                    if(errors != ''){
                        $('#alert_danger').empty();

                        for (i = 0; i < errors.length; i++) {
                            // console.log(errors[i]);

                            $('#alert_danger').append('<div id="danger' + i + '" class="alert alert-danger text-center"></div>');
                            $("#danger" + i).append('<strong>Error!</strong> ' + errors[i]);

                        }

                        $("#alert_danger").fadeTo(2000, 5000).slideUp(5000, function () {
                            $("#alert_danger").slideUp(5000);
                        });
                    }

                    if (errors == '') {

                        $.ajax({
                            type: 'POST',
                            dataType: "json",
                            url: ajaxurl,
                            cache: false,
                            data: {
                                "action": "property",
                                email: email,
                                name: name,
                                mobile: mobile,
                                owner: owner,
                                project: project,
                                type: type,
                                bedroom: bedroom
                            },
                            success: function (data) {
                                // console.log(data);
                                error = data[0].error;
                                success = data[0].success;

                                if (data[0].error != '') {
                                    $('#alert_danger').empty();

                                    for (i = 0; i < data.length; i++) {
                                        // console.log(data[i].error);

                                        $('#alert_danger').append('<div id="danger' + i + '" class="alert alert-danger text-center"></div>');
                                        $("#danger" + i).append('<strong>Error!</strong> ' + data[i].error);

                                    }

                                    $("#alert_danger").fadeTo(500000, 500000).slideUp(500000, function () {
                                        $("#alert_danger").slideUp(500000);
                                    });


                                } else {

                                    $(".alert-success").fadeTo(500000, 500000).slideUp(500000, function () {
                                        $(".alert-success").slideUp(500000);
                                    });
                                    $(".alert").html('<strong>Success!</strong> ' + success);

                                    $("#name").val('') ;
                                    $("#prop_email").val('');
                                    $("#mobile").val('');
                                    $("#owner").val('');
                                    $("#project").val('');
                                    $("#type").val('');
                                    $("#bedroom").val('');

                                }
                            }
                        });
                    }
                });


            });
        </script>
    <?php
    endwhile;
endif;
?>


<?php get_footer(); ?>