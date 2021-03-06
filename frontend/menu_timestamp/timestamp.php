<div class="row">

    <div class="col-lg-12">
        <div class="card card-chart">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h4 class="card-title">Timestamp</h4>
                    </div>
                    <div class="col-md-1 float-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add_timestamp">Add</button>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-12 text-center">
                        <input type="hidden" class="form-control" id="textsearchYear" name="textsearchYear" placeholder="Search....">
                        <select class="form-control" id="list_searchYear" name="list_searchYear">
                            <option value="">เลือกปี</option>
                            <?php

                            $str_Year = "SELECT distinct YEAR(timestampDate) AS Year from tbtimestamp ORDER BY timestampDate DESC ";

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

                            $str_Month = "SELECT distinct MONTH(timestampDate) AS Month from tbtimestamp ORDER BY timestampDate DESC ";

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
            </div>
            <div class="card-body text-center">
                <img id="loading_image_table" src="../frontend/img/icon/Spinner_loader.gif" style="display: none;" />
                <div id="table_timestamp"> </div>
            </div>
        </div>
    </div>

    <!-- Modal upload timestamp-->
    <div class="modal fade" id="modal_add_timestamp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form name="frm_upload_file_timestamp" id="frm_upload_file_timestamp" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Timestamp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="file_timestamp">File Excel</label>
                        <input type="file" class="form-control" id="file_timestamp" name="file_timestamp">
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="action" name="action" value="upload_file_timestamp">
                        <button type="submit" id="btn_upload_file_timestamp" name="btn_upload_file_timestamp" class="btn btn-success btn-round"><span id="text_btn_upload_file_timestamp">Summit</span> <img id="loading_image" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                        <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit timestamp-->
    <div class="modal fade" id="modal_edit_timestamp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form name="frm_edit_file_timestamp" id="frm_edit_file_timestamp" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Timestamp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="txt_staffID_e">StaffID</label>
                                <input type="text" class="form-control" id="txt_staffID_e" value="" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="txt_staffNameTH_e">StaffName</label>
                                <input type="text" class="form-control" id="txt_staffNameTH_e" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="txt_timestampLate_e">Timestamp Late</label>
                            <input type="number" class="form-control" id="txt_timestampLate_e" name="txt_timestampLate_e">
                        </div>

                        <div class="form-group">
                            <label for="txt_timestampAbsence_e">Timestamp Absence</label>
                            <input type="number" class="form-control" id="txt_timestampAbsence_e" name="txt_timestampAbsence_e">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" id="txt_timestampID_e" name="txt_timestampID_e">
                        <input type="hidden" id="action" name="action" value="edit_timestamp">
                        <button type="submit" id="btn_edit_file_timestamp" name="btn_edit_file_timestamp" class="btn btn-success btn-round"><span id="text_btn_edit_timestamp">Summit</span> <img id="loading_image_edit_timestamp" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                        <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<script>
    function load_data(query = '') {
        var textsearch = $('#textsearch').val();
        var textsearchMonth = $('#textsearchMonth').val();
        var textsearchYear = $('#textsearchYear').val();
        $.ajax({
            url: "../backend/timestamp/timestamp_fetch.php",
            method: "POST",
            data: {
                query: query,
                textsearch: textsearch,
                textsearchMonth: textsearchMonth,
                textsearchYear: textsearchYear
            },
            beforeSend: function() {
                $("#loading_image_table").show();
                $('#table_timestamp').hide();
            },
            success: function(data) {
                $('#table_timestamp').html(data);
                $("#loading_image_table").hide();
                $('#table_timestamp').show();
            }

        });
    }
    setTimeout(function() {
        load_data();
    }, 1000);

    $('#textsearch').keyup(function() {
        var textsearch = $(this).val();
        load_data(textsearch);
    });
    $('#list_searchMonth').change(function() {
        $('#textsearchMonth').val($('#list_searchMonth').val());
        var textsearchMonth = $('#textsearchMonth').val();
        load_data(textsearchMonth);
    });
    $('#list_searchYear').change(function() {
        $('#textsearchYear').val($('#list_searchYear').val());
        var textsearchYear = $('#textsearchYear').val();
        load_data(textsearchYear);
    });



    $('#frm_upload_file_timestamp').on('submit', function(event) {
        event.preventDefault();
        if ($('#file_timestamp').val() == '') {
            alert("กรุณาเพิ่มไฟล์");
        } else {
            $('#btn_upload_file_timestamp').attr('disabled', true);

            var form_data = $(this).serialize();
            $.ajax({
                url: "../backend/timestamp/timestamp_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image").show();
                    $("#text_btn_upload_file_timestamp").hide();
                },
                success: function(data) {
                    $("#loading_image").hide();
                    $("#text_btn_upload_file_timestamp").show();

                    $('#modal_add_timestamp').modal('hide');
                    alert(data);
                    $('#frm_upload_file_timestamp')[0].reset();

                    $('#btn_upload_file_timestamp').attr('disabled', false);
                    load_data();


                }
            });
        }
    });

    //Edit Timestamp
    $(document).on('click', '.edit_timestamp', function() {

        var id_timestamp_edit = $(this).attr('id_timestamp_edit');
        var action = 'fetch_edit_timestamp';
        $.ajax({
            url: "../backend/timestamp/timestamp_action.php",
            method: "POST",
            data: {
                id_timestamp_edit: id_timestamp_edit,
                action: action
            },
            dataType: "json",
            success: function(data) {
                $("#txt_timestampID_e").val(data.timestampID);
                $("#txt_staffID_e").val(data.staffID);
                $("#txt_staffNameTH_e").val(data.staffNameTH);
                $("#txt_timestampLate_e").val(data.timestampLate);
                $("#txt_timestampAbsence_e").val(data.timestampAbsence);
            }
        });
    });


    $('#frm_edit_file_timestamp').on('submit', function(event) {
        event.preventDefault();

        if ($('#txt_timestampID_e').val() == '') {
            alert("กรุณาติดต่อผู้พัฒนาระบบ");
        } else if ($('#txt_timestampLate_e').val() == '') {
            alert("กรุณาใส่จำนวน Timestamp Late");
        } else if ($('#txt_timestampAbsence_e').val() == '') {
            alert("กรุณาใส่จำนวน Timestamp Absence");
        } else {

            $('#btn_edit_file_timestamp').attr('disabled', true);


            $.ajax({
                url: "../backend/timestamp/timestamp_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image_edit_timestamp").show();
                    $("#text_btn_edit_timestamp").hide();
                },
                success: function(data) {
                    $("#loading_image_edit_timestamp").hide();
                    $("#text_btn_edit_timestamp").show();

                    $('#modal_edit_timestamp').modal('hide');
                    alert(data);

                    $('#btn_edit_file_timestamp').attr('disabled', false);

                    load_data();
                    /*  var search_Partner = $('#search_Partner').val();
                     if (search_Partner == '') {
                         load_data();
                     } else {
                         load_data(search_Partner);
                     } */

                }
            });

        }

    });



    //Delete Timestamp
    $(document).on('click', '.del_timestamp', function() {
        var confirmation = confirm("คุณแน่ใจว่าจะลบ Timestamp นี้ใช่หรือไม่ ?");

        if (confirmation) {
            var id_timestamp_del = $(this).attr('id_timestamp_del');
            var action = 'del_timestamp';
            $.ajax({
                url: "../backend/timestamp/timestamp_action.php",
                method: "POST",
                data: {
                    id_timestamp_del: id_timestamp_del,
                    action: action
                },
                success: function(data) {
                    alert(data);
                    load_data();
                    /* var search_Partner = $('#search_Partner').val();
                    if (search_Partner == '') {
                        load_data();
                    } else {
                        load_data(search_Partner);
                    } */

                }
            });
        }

    });
</script>