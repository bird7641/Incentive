<div class="row">

    <div class="col-lg-12">
        <div class="card card-chart">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h4 class="card-title">Commu</h4>
                    </div>
                    <div class="col-md-1 float-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add_commu">Add</button>

                    </div>
                </div>
            </div>
            <div class="card-body text-center">
                <img id="loading_image_table" src="../frontend/img/icon/Spinner_loader.gif" style="display: none;" />
                <div id="table_commu"> </div>
            </div>
        </div>
    </div>

    <!-- Modal upload commu-->
    <div class="modal fade" id="modal_add_commu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form name="frm_upload_file_commu" id="frm_upload_file_commu" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Commu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="file_commu">File Excel</label>
                        <input type="file" class="form-control" id="file_commu" name="file_commu">
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="action" name="action" value="upload_file_commu">
                        <button type="submit" id="btn_upload_file_commu" name="btn_upload_file_commu" class="btn btn-success btn-round"><span id="text_btn_upload_file_commu">Summit</span> <img id="loading_image" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                        <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit commu-->
    <div class="modal fade" id="modal_edit_commu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form name="frm_edit_file_commu" id="frm_edit_file_commu" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Commu</h5>
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
                            <label for="txt_commuLate_e">Commu Actual</label>
                            <input type="number" class="form-control" id="txt_commuActual_e" name="txt_commuActual_e">
                        </div>

                     


                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" id="txt_commuID_e" name="txt_commuID_e">
                        <input type="hidden" id="action" name="action" value="edit_commu">
                        <button type="submit" id="btn_edit_file_commu" name="btn_edit_file_commu" class="btn btn-success btn-round"><span id="text_btn_edit_commu">Summit</span> <img id="loading_image_edit_commu" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                        <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<script>
    function load_data(query = '') {
        /*   var hidden_list_ap_search = $('#hidden_list_ap_search').val();
          var hidden_list_TP_search = $('#hidden_list_TP_search').val(); */
        // var query2 = $('#hidden_country').val();
        $.ajax({
            url: "../backend/commu/commu_fetch.php",
            method: "POST",
            data: {
                query: query
            },
            beforeSend: function() {
                $("#loading_image_table").show();
                $('#table_commu').hide();
            },
            success: function(data) {
                $('#table_commu').html(data);
                $("#loading_image_table").hide();
                $('#table_commu').show();
            }

        });
    }
    setTimeout(function() {
        load_data();
    }, 1000);

    $('#frm_upload_file_commu').on('submit', function(event) {
        event.preventDefault();
        if ($('#file_commu').val() == '') {
            alert("กรุณาเพิ่มไฟล์");
        } else {
            $('#btn_upload_file_commu').attr('disabled', true);

            var form_data = $(this).serialize();
            $.ajax({
                url: "../backend/commu/commu_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image").show();
                    $("#text_btn_upload_file_commu").hide();
                },
                success: function(data) {
                    $("#loading_image").hide();
                    $("#text_btn_upload_file_commu").show();

                    $('#modal_add_commu').modal('hide');
                    alert(data);
                    $('#frm_upload_file_commu')[0].reset();

                    $('#btn_upload_file_commu').attr('disabled', false);
                    load_data();


                }
            });
        }
    });

    //Edit commu
    $(document).on('click', '.edit_commu', function() {

        var id_commu_edit = $(this).attr('id_commu_edit');
        var action = 'fetch_edit_commu';
        $.ajax({
            url: "../backend/commu/commu_action.php",
            method: "POST",
            data: {
                id_commu_edit: id_commu_edit,
                action: action
            },
            dataType: "json",
            success: function(data) {
                $("#txt_commuID_e").val(data.commuID);
                $("#txt_staffID_e").val(data.staffID);
                $("#txt_staffNameTH_e").val(data.staffNameTH);
                $("#txt_commuActual_e").val(data.commuActual);
            }
        });
    });


    $('#frm_edit_file_commu').on('submit', function(event) {
        event.preventDefault();

        if ($('#txt_commuID_e').val() == '') {
            alert("กรุณาติดต่อผู้พัฒนาระบบ");
        } else if ($('#txt_commuActual_e').val() == '') {
            alert("กรุณาใส่จำนวน Commu Actual");
        }  else {

            $('#btn_edit_file_commu').attr('disabled', true);


            $.ajax({
                url: "../backend/commu/commu_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image_edit_commu").show();
                    $("#text_btn_edit_commu").hide();
                },
                success: function(data) {
                    $("#loading_image_edit_commu").hide();
                    $("#text_btn_edit_commu").show();

                    $('#modal_edit_commu').modal('hide');
                    alert(data);

                    $('#btn_edit_file_commu').attr('disabled', false);

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



    //Delete commu
    $(document).on('click', '.del_commu', function() {
        var confirmation = confirm("คุณแน่ใจว่าจะลบ commu นี้ใช่หรือไม่ ?");

        if (confirmation) {
            var id_commu_del = $(this).attr('id_commu_del');
            var action = 'del_commu';
            $.ajax({
                url: "../backend/commu/commu_action.php",
                method: "POST",
                data: {
                    id_commu_del: id_commu_del,
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