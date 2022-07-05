<div class="content">
    <div id="Level_User" hidden>
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Commu</h5>
                        <h4 class="card-title">Commu Dashboard</h4>
                    </div>
                    <div class="card-body">


                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h5>Actual</h5>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h5 id="commu_actual_count">NaN</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h5>Result</h5>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h5 id="commu_result_count">NaN</h5>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Late</h5>
                        <h4 class="card-title">Late Dashboard</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h5>Actual</h5>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h5 id="late_actual_count">NaN</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h5>Result</h5>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h5 id="late_result_count">NaN</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Absence</h5>
                        <h4 class="card-title">Absence Dashboard</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h5>Actual</h5>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h5 id="absence_actual_count">NaN</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h5>Result</h5>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h5 id="absence_result_count">NaN</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Complaint</h5>
                        <h4 class="card-title">Complaint Dashboard</h4>
                    </div>
                    <div class="card-body">


                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h5>Actual</h5>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h5 id="complaint_actual_count">NaN</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h5>Result</h5>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h5 id="complaint_result_count">NaN</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Warning</h5>
                        <h4 class="card-title">Warning Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h5>Actual</h5>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h5 id="warn_actual_count">NaN</h5>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6 col-md-12">
                                <h5>Result</h5>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h5 id="warn_result_count">NaN</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">SUM</h5>
                        <h4 class="card-title">SUM Dashboard</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-lg-6 col-md-12">
                                <h5>Result</h5>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h5 id="sum_result_count">NaN</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

    <div id="Level_Admin" hidden>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Report</h5>
                        <h4 class="card-title">Report Dashboard</h4>
                    </div>
                    <div class="card-body">


                        <div class="row">
                            <div class="col-lg-3 col-md-12 text-center">
                                <input type="hidden" class="form-control" id="textsearchYear" name="textsearchYear" placeholder="Search....">
                                <select class="form-control" id="list_searchYear" name="list_searchYear">
                                    <option value="">เลือกปี</option>
                                    <?php

                                    $str_Year = "SELECT distinct YEAR(empDate) AS Year from tbemp ORDER BY empDate DESC ";

                                    $Result_Year = $conn->query($str_Year);
                                    while ($Year_list_Array = $Result_Year->fetch_array(MYSQLI_ASSOC)) {
                                        $Year = $Year_list_Array['Year'];
                                        echo "<option value='" . $Year . "' >" . $Year . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-lg-3 col-md-12 text-center">
                                <input type="hidden" class="form-control" id="textsearchMonth" name="textsearchMonth" placeholder="Search....">
                                <select class="form-control" id="list_searchMonth" name="list_searchMonth">
                                    <option value="">เลือกเดือน</option>
                                    <?php

                                    $str_Month = "SELECT distinct MONTH(empDate) AS Month from tbemp ORDER BY empDate DESC ";

                                    $Result_Month = $conn->query($str_Month);
                                    while ($Month_list_Array = $Result_Month->fetch_array(MYSQLI_ASSOC)) {
                                        $Month = $Month_list_Array['Month'];
                                        echo "<option value='" . $Month . "' >" . $Month . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-12 text-center">
                                <input type="text" class="form-control" id="textsearch" name="textsearch" placeholder="Search....">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 text-center">
                                <img id="loading_image_table" src="../frontend/img/icon/Spinner_loader.gif" style="display: none;" />
                                <div id="table_Dashboard"> </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var Level = "<?php echo $_SESSION['staffLevel'] ?>";
    if (Level == 'User') {
        $("#Level_User").prop('hidden', false);
        $('#Level_Admin').prop('hidden', true);
    } else {
        $("#Level_User").prop('hidden', true);
        $('#Level_Admin').prop('hidden', false);

    }
    setTimeout(function() {
        load_data_dashboard();
    }, 1000);

    setTimeout(function() {
        load_data_dashboard_report();
    }, 1000);


    function load_data_dashboard(query = '') {
        var action = 'fetch_dashboard';
        $.ajax({
            url: "../backend/dashboard/dashboard_action.php",
            method: "POST",
            data: {
                query: query,
                action: action
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('#commu_actual_count').text(data.CommuActual);
                $('#commu_result_count').text(data.ResultActual);
                $('#late_actual_count').text(data.LateActual);
                $('#late_result_count').text(data.ResultLate);
                $('#absence_actual_count').text(data.AbsenceActual);
                $('#absence_result_count').text(data.ResultAbsence);
                $('#complaint_actual_count').text(data.ComplantActual);
                $('#complaint_result_count').text(data.ResultComplant);
                $('#warn_actual_count').text(data.WarnActual);
                $('#warn_result_count').text(data.ResultWarn);

                var sum_all = parseInt(data.ResultActual) + parseInt(data.ResultLate) + parseInt(data.ResultAbsence) + parseInt(data.ResultComplant) + parseInt(data.ResultWarn);
                $('#sum_result_count').text(parseInt(sum_all));

            }
        });
    }


    function load_data_dashboard_report(query = '') {
        var textsearch = $('#textsearch').val();
        var textsearchMonth = $('#textsearchMonth').val();
        var textsearchYear = $('#textsearchYear').val();
        $.ajax({
            url: "../backend/dashboard/dashboard_report_fetch.php",
            method: "POST",
            data: {
                query: query,
                textsearch: textsearch,
                textsearchMonth: textsearchMonth,
                textsearchYear: textsearchYear
            },
            beforeSend: function() {
                $("#loading_image_table").show();
                $('#table_Dashboard').hide();
            },
            success: function(data) {
                $('#table_Dashboard').html(data);
                $("#loading_image_table").hide();
                $('#table_Dashboard').show();
            }

        });
    }

    $('#textsearch').keyup(function() {
        var textsearch = $(this).val();
        load_data_dashboard_report(textsearch);
    });
    $('#list_searchMonth').change(function() {
        $('#textsearchMonth').val($('#list_searchMonth').val());
        var textsearchMonth = $('#textsearchMonth').val();
        load_data_dashboard_report(textsearchMonth);
    });
    $('#list_searchYear').change(function() {
        $('#textsearchYear').val($('#list_searchYear').val());
        var textsearchYear = $('#textsearchYear').val();
        load_data_dashboard_report(textsearchYear);
    });
</script>