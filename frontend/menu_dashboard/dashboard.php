<div class="content">
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

<script>
    function load_data_dashboard(query = '') {
        /*   var hidden_list_ap_search = $('#hidden_list_ap_search').val();
          var hidden_list_TP_search = $('#hidden_list_TP_search').val(); */
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
    setTimeout(function() {
        load_data_dashboard();
    }, 1000);
</script>