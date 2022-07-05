<div class="row">

    <div class="col-lg-12">
        <div class="card card-chart">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h4 class="card-title">Warning</h4>
                    </div>
                    <div class="col-md-1 float-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add_warning">Add</button>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-12 text-center">
                        <input type="hidden" class="form-control" id="textsearchYear" name="textsearchYear" placeholder="Search....">
                        <select class="form-control" id="list_searchYear" name="list_searchYear">
                            <option value="">เลือกปี</option>
                            <?php

                            $str_Year = "SELECT distinct YEAR(warnDate) AS Year from tbwarning ORDER BY warnDate DESC ";

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

                            $str_Month = "SELECT distinct MONTH(warnDate) AS Month from tbwarning ORDER BY warnDate DESC ";

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
                <div id="table_warning"> </div>
            </div>
        </div>
    </div>

    <!-- Modal upload warning-->
    <div class="modal fade" id="modal_add_warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form name="frm_upload_file_warning" id="frm_upload_file_warning" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Warning</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="file_warning">File Excel</label>
                        <input type="file" class="form-control" id="file_warning" name="file_warning">
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="action" name="action" value="upload_file_warning">
                        <button type="submit" id="btn_upload_file_warning" name="btn_upload_file_warning" class="btn btn-success btn-round"><span id="text_btn_upload_file_warning">Summit</span> <img id="loading_image" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                        <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit warning-->
    <div class="modal fade" id="modal_edit_warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form name="frm_edit_warning" id="frm_edit_warning" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Warning</h5>
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
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="txt_warnDetail_e">Warn Detail</label>
                                <textarea type="text" class="form-control" id="txt_warnDetail_e" name="txt_warnDetail_e" style="font-size: 15px;"></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" id="txt_warnID_e" name="txt_warnID_e">
                        <input type="hidden" id="action" name="action" value="edit_warning">
                        <button type="submit" id="btn_edit_file_warning" name="btn_edit_file_warning" class="btn btn-success btn-round"><span id="text_btn_edit_warning">Summit</span> <img id="loading_image_edit_warning" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
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
            url: "../backend/warning/warning_fetch.php",
            method: "POST",
            data: {
                query: query,
                textsearch: textsearch,
                textsearchMonth: textsearchMonth,
                textsearchYear: textsearchYear
            },
            beforeSend: function() {
                $("#loading_image_table").show();
                $('#table_warning').hide();
            },
            success: function(data) {
                $('#table_warning').html(data);
                $("#loading_image_table").hide();
                $('#table_warning').show();
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

    $('#frm_upload_file_warning').on('submit', function(event) {
        event.preventDefault();
        if ($('#file_warning').val() == '') {
            alert("กรุณาเพิ่มไฟล์");
        } else {
            $('#btn_upload_file_warning').attr('disabled', true);

            var form_data = $(this).serialize();
            $.ajax({
                url: "../backend/warning/warning_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image").show();
                    $("#text_btn_upload_file_warning").hide();
                },
                success: function(data) {
                    $("#loading_image").hide();
                    $("#text_btn_upload_file_warning").show();

                    $('#modal_add_warning').modal('hide');
                    alert(data);
                    $('#frm_upload_file_warning')[0].reset();

                    $('#btn_upload_file_warning').attr('disabled', false);
                    load_data();


                }
            });
        }
    });

    //Edit warning
    $(document).on('click', '.edit_warning', function() {

        var id_warning_edit = $(this).attr('id_warning_edit');
        var action = 'fetch_edit_warning';
        $.ajax({
            url: "../backend/warning/warning_action.php",
            method: "POST",
            data: {
                id_warning_edit: id_warning_edit,
                action: action
            },
            dataType: "json",
            success: function(data) {
                $("#txt_staffID_e").val(data.staffID);
                $("#txt_staffNameTH_e").val(data.staffNameTH);
                $("#txt_warnDetail_e").val(data.warnDetail);

                $("#txt_warnID_e").val(id_warning_edit);

            }
        });
    });


    $('#frm_edit_warning').on('submit', function(event) {
        event.preventDefault();

        if ($('#txt_warnID_e').val() == '') {
            alert("กรุณาติดต่อผู้พัฒนาระบบ");
        } else if ($('#txt_warnDetail_e').val() == '') {
            alert("กรุณาใส่รายละเอียด Warning");
        } else {

            $('#btn_edit_file_warning').attr('disabled', true);


            $.ajax({
                url: "../backend/warning/warning_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image_edit_warning").show();
                    $("#text_btn_edit_warning").hide();
                },
                success: function(data) {
                    $("#loading_image_edit_warning").hide();
                    $("#text_btn_edit_warning").show();

                    $('#modal_edit_warning').modal('hide');
                    alert(data);

                    $('#btn_edit_file_warning').attr('disabled', false);

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



    //Delete warning
    $(document).on('click', '.del_warning', function() {
        var confirmation = confirm("คุณแน่ใจว่าจะลบ Warning นี้ใช่หรือไม่ ?");

        if (confirmation) {
            var id_warning_del = $(this).attr('id_warning_del');
            var action = 'del_warning';
            $.ajax({
                url: "../backend/warning/warning_action.php",
                method: "POST",
                data: {
                    id_warning_del: id_warning_del,
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

    function IsNumeric(str, obj) {
        var IsNumeric = true;
        var orgi_text = "01";
        var chk_text = str.split("");
        chk_text.filter(function(s) {
            if (orgi_text.indexOf(s) == -1) {
                IsNumeric = false;
                obj.value = str.replace(RegExp(s, "g"), '');
            }
        });
        return IsNumeric;

    }
</script>