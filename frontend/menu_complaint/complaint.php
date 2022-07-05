<div class="row">

    <div class="col-lg-12">
        <div class="card card-chart">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h4 class="card-title">Complaint</h4>
                    </div>
                    <div class="col-md-1 float-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add_complaint">Add</button>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-12 text-center">
                        <input type="hidden" class="form-control" id="textsearchYear" name="textsearchYear" placeholder="Search....">
                        <select class="form-control" id="list_searchYear" name="list_searchYear">
                            <option value="">เลือกปี</option>
                            <?php

                            $str_Year = "SELECT distinct YEAR(complaintDate) AS Year from tbcomplaint ORDER BY complaintDate DESC ";

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

                            $str_Month = "SELECT distinct MONTH(complaintDate) AS Month from tbcomplaint ORDER BY complaintDate DESC ";

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
                <div id="table_complaint"> </div>
            </div>
        </div>
    </div>

    <!-- Modal upload complaint-->
    <div class="modal fade" id="modal_add_complaint" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form name="frm_upload_file_complaint" id="frm_upload_file_complaint" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Complaint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="file_complaint">File Excel</label>
                        <input type="file" class="form-control" id="file_complaint" name="file_complaint">
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="action" name="action" value="upload_file_complaint">
                        <button type="submit" id="btn_upload_file_complaint" name="btn_upload_file_complaint" class="btn btn-success btn-round"><span id="text_btn_upload_file_complaint">Summit</span> <img id="loading_image" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                        <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit complaint-->
    <div class="modal fade" id="modal_edit_complaint" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form name="frm_edit_file_complaint" id="frm_edit_file_complaint" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Complaint</h5>
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
                            <label for="txt_complaintType_e">Complaint Type</label>
                            <input type="text" class="form-control" id="txt_complaintType_e" name="txt_complaintType_e">
                        </div>

                        <div class="form-group">
                            <label for="txt_complaintDetail_e">Complaint Detail</label>
                            <textarea type="text" class="form-control" id="txt_complaintDetail_e" name="txt_complaintDetail_e"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="txt_complaintSource_e">Complaint Source</label>
                            <input type="text" class="form-control" id="txt_complaintSource_e" name="txt_complaintSource_e">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" id="txt_complaintID_e" name="txt_complaintID_e">
                        <input type="hidden" id="action" name="action" value="edit_complaint">
                        <button type="submit" id="btn_edit_file_complaint" name="btn_edit_file_complaint" class="btn btn-success btn-round"><span id="text_btn_edit_complaint">Summit</span> <img id="loading_image_edit_complaint" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
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
            url: "../backend/complaint/complaint_fetch.php",
            method: "POST",
            data: {
                query: query,
                textsearch: textsearch,
                textsearchMonth: textsearchMonth,
                textsearchYear: textsearchYear
            },
            beforeSend: function() {
                $("#loading_image_table").show();
                $('#table_complaint').hide();
            },
            success: function(data) {
                $('#table_complaint').html(data);
                $("#loading_image_table").hide();
                $('#table_complaint').show();
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


    $('#frm_upload_file_complaint').on('submit', function(event) {
        event.preventDefault();
        if ($('#file_complaint').val() == '') {
            alert("กรุณาเพิ่มไฟล์");
        } else {
            $('#btn_upload_file_complaint').attr('disabled', true);

            var form_data = $(this).serialize();
            $.ajax({
                url: "../backend/complaint/complaint_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image").show();
                    $("#text_btn_upload_file_complaint").hide();
                },
                success: function(data) {
                    $("#loading_image").hide();
                    $("#text_btn_upload_file_complaint").show();

                    $('#modal_add_complaint').modal('hide');
                    alert(data);
                    $('#frm_upload_file_complaint')[0].reset();

                    $('#btn_upload_file_complaint').attr('disabled', false);
                    load_data();


                }
            });
        }
    });

    //Edit complaint
    $(document).on('click', '.edit_complaint', function() {

        var id_complaint_edit = $(this).attr('id_complaint_edit');
        var action = 'fetch_edit_complaint';
        $.ajax({
            url: "../backend/complaint/complaint_action.php",
            method: "POST",
            data: {
                id_complaint_edit: id_complaint_edit,
                action: action
            },
            dataType: "json",
            success: function(data) {
                $("#txt_complaintID_e").val(data.complaintID);
                $("#txt_staffID_e").val(data.staffID);
                $("#txt_staffNameTH_e").val(data.staffNameTH);
                $("#txt_complaintType_e").val(data.complaintType);
                $("#txt_complaintDetail_e").val(data.complaintDetail);
                $("#txt_complaintSource_e").val(data.complaintSource);
            }
        });
    });


    $('#frm_edit_file_complaint').on('submit', function(event) {
        event.preventDefault();

        if ($('#txt_complaintID_e').val() == '') {
            alert("กรุณาติดต่อผู้พัฒนาระบบ");
        } else if ($('#txt_complaintType_e').val() == '') {
            alert("กรุณาใส่ Complaint Type");
        } else if ($('#txt_complaintDetail_e').val() == '') {
            alert("กรุณาใส่ Complaint Detail ");
        } else if ($('#txt_complaintSource_e').val() == '') {
            alert("กรุณาใส่ Complaint Source");
        } else {

            $('#btn_edit_file_complaint').attr('disabled', true);


            $.ajax({
                url: "../backend/complaint/complaint_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image_edit_complaint").show();
                    $("#text_btn_edit_complaint").hide();
                },
                success: function(data) {
                    $("#loading_image_edit_complaint").hide();
                    $("#text_btn_edit_complaint").show();

                    $('#modal_edit_complaint').modal('hide');
                    alert(data);

                    $('#btn_edit_file_complaint').attr('disabled', false);

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



    //Delete complaint
    $(document).on('click', '.del_complaint', function() {
        var confirmation = confirm("คุณแน่ใจว่าจะลบ complaint นี้ใช่หรือไม่ ?");

        if (confirmation) {
            var id_complaint_del = $(this).attr('id_complaint_del');
            var action = 'del_complaint';
            $.ajax({
                url: "../backend/complaint/complaint_action.php",
                method: "POST",
                data: {
                    id_complaint_del: id_complaint_del,
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