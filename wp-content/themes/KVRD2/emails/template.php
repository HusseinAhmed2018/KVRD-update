<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        * {
            margin: 0;
            box-sizing: border-box;
        }

        .f-30 {
            font-size: 30px;
        }

        .f-28 {
            font-size: 28px;
        }

        .myContainer {
            width: 90%;
            margin: auto;
        }

        .carrer2 {
            padding: 70px 0;
        }

        .carrer2 .formTitle {
            color: #686b6f;
            margin-bottom: 35px;
        }

        .carrer2 .tableHeader {
            background-color: #2e5395;
            height: 60px;
            box-shadow: 0 5px #000;
            padding-top: 20px;
            color: #fff;
            padding-left: 10px;
            margin-bottom: 5px;
        }

        td {
            border-top: none !important;
        }

        td:not(:last-child) {
            border-right: 1px solid #000;
        }

        tr {
            box-shadow: 0 1px #000;
        }
    </style>
</head>
<body>
<?php
for ($i=0; $i<= sizeof($data); $i++ ){

    $field[$data[$i]['name']] = $data[$i]['value'];
}
?>
<section class="carrer2">
    <div class="myContainer">
        <p class="f-30 formTitle">Application for employment</p>

        <!-- first table -->
        <p class="tableHeader f-28">
            Personal Information
        </p>
        <table class="table" width="100%" rules="all">
            <tr>
                <td>
                    <?=$field['name'];?>
                </td>
            </tr>
            <tr>
                <td>
                    <?=$field['address'];?>
                </td>
                <td>
                    <?=$field['city'];?>
                </td>
                <td class="border-right-0">
                    <?=$field['state'];?>
                </td>
                <td>
                    <?=$field['zip'];?>
                </td>
            </tr>
            <tr>
                <td>
                    <?=$field['phone'];?>
                </td>
                <td>
                    <?=$field['carrer_email'];?>
                </td>
            </tr>
            <tr>
                <td>
                    <?=$field['military'];?>
                </td>
            </tr>
        </table>
        <!-- end of first table -->

        <!-- second Table -->
        <p class="tableHeader f-28">
            Position
        </p>
        <table class="table" width="100%" rules="all">
            <tr>
                <td>
                    <?=$field['position'];?>
                </td>
                <td colspan="2" class="border-right-0">
                    <?=$field['start_date'];?>
                </td>
                <td>
                    <?=$field['pay'];?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Employment desired :
                    <span><?=$field['optradio'];?></span>
                </td>
            </tr>
        </table>
        <!-- end of second Table -->

        <!-- third Table -->
        <p class="tableHeader f-28">
            Education
        </p>
        <table class="table" width="100%" rules="all">
            <tr>
                <td>
                    <?=$field['school'];?>
                </td>
                <td>
                    <?=$field['location'];?>
                </td>
                <td>
                    <?=$field['school_year'];?>
                </td>
                <td>
                    <?=$field['degree'];?>
                </td>
                <td>
                    <?=$field['major'];?>
                </td>
            </tr>

        </table>
        <!-- end of third Table -->

        <!-- fourth table -->
        <p class="tableHeader f-28">
            Employment History
        </p>
        <table class="table" width="100%" rules="all">
            <tr>
                <td class="font-weight-bold"><?=(($field['employer1'] != '')? $field['employer1'] : 'employer 1' );?></td>
                <td colspan="2"><?=(($field['job_emp1'] != '')? $field['job_emp1'] : 'job title' )?></td>
                <td><?=$field['dates_emp1'];?></td>
            </tr>
            <tr>
                <td><?=(($field['phone_emp1'] != '')?$field['phone_emp1']:'phone');?></td>
                <td colspan="2"><?=(($field['start_pay_emp1'] != '')?$field['start_pay_emp1']:'start pay rate');?></td>
                <td><?=(($field['end_pay_emp1'] != '')?$field['end_pay_emp1']:'ending pay rate');?></td>
            </tr>
            <tr>
                <td><?=(($field['address_emp1'] != '')?$field['address_emp1']:'Address');?></td>
                <td><?=(($field['city_emp1'] != '')?$field['city_emp1']:'city');?></td>
                <td><?=(($field['state_emp1'] != '')?$field['state_emp1']:'state');?></td>
                <td><?=(($field['zip_emp1'] != '')?$field['zip_emp1']:'Zip');?></td>
            </tr>

            <!-- second employer -->
            <tr>
                <td class="font-weight-bold"><?=(($field['employer2'] != '')? $field['employer2'] : 'employer 2' );?></td>
                <td colspan="2"><?=(($field['job_emp2'] != '')? $field['job_emp2'] : 'job title' )?></td>
                <td><?=$field['dates_emp2'];?></td>
            </tr>
            <tr>
                <td><?=(($field['phone_emp2'] != '')?$field['phone_emp2']:'phone');?></td>
                <td colspan="2"><?=(($field['start_pay_emp2'] != '')?$field['start_pay_emp2']:'start pay rate');?></td>
                <td><?=(($field['end_pay_emp2'] != '')?$field['end_pay_emp2']:'ending pay rate');?></td>
            </tr>
            <tr>
                <td><?=(($field['address_emp2'] != '')?$field['address_emp2']:'Address');?></td>
                <td><?=(($field['city_emp2'] != '')?$field['city_emp2']:'city');?></td>
                <td><?=(($field['state_emp2'] != '')?$field['state_emp2']:'state');?></td>
                <td><?=(($field['zip_emp2'] != '')?$field['zip_emp2']:'Zip');?></td>
            </tr>


            <!-- third employer -->
            <tr>
                <td class="font-weight-bold"><?=(($field['employer3'] != '')? $field['employer3'] : 'employer 3' );?></td>
                <td colspan="2"><?=(($field['job_emp3'] != '')? $field['job_emp3'] : 'job title' )?></td>
                <td><?=$field['dates_emp3'];?></td>
            </tr>
            <tr>
                <td><?=(($field['phone_emp3'] != '')?$field['phone_emp3']:'phone');?></td>
                <td colspan="2"><?=(($field['start_pay_emp3'] != '')?$field['start_pay_emp3']:'start pay rate');?></td>
                <td><?=(($field['end_pay_emp3'] != '')?$field['end_pay_emp3']:'ending pay rate');?></td>
            </tr>
            <tr>
                <td><?=(($field['address_emp3'] != '')?$field['address_emp3']:'Address');?></td>
                <td><?=(($field['city_emp3'] != '')?$field['city_emp3']:'city');?></td>
                <td><?=(($field['state_emp3'] != '')?$field['state_emp3']:'state');?></td>
                <td><?=(($field['zip_emp3'] != '')?$field['zip_emp3']:'Zip');?></td>
            </tr>
        </table>
        <!-- end of fourth table -->
    </div>
</section>
</body>
</html>