<div class="row">

    <div class="col-lg-6">
        <div class="card card-chart">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="card-title">Staff</h4>
                    </div>
                    <div class="col-md-2 ">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add_staff">Add</button>

                    </div>
                </div>
            </div>
            <div class="card-body text-center">
                <img id="loading_image_staff_table" src="../frontend/img/icon/Spinner_loader.gif" style="display: none;" />
                <div id="table_staff"> </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-chart">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="card-title">Site</h4>
                    </div>
                    <div class="col-md-2 ">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add_timestamp">Add</button>

                    </div>
                </div>
            </div>
            <div class="card-body text-center">
                <img id="loading_image_table" src="../frontend/img/icon/Spinner_loader.gif" style="display: none;" />
                <div id="table_timestamp"> </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal upload staff-->
<div class="modal fade" id="modal_add_staff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card card-nav-tabs card-plain">
                <div class="card-header card-header-danger">
                    <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#staffsingle" data-toggle="tab">Single</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#stafffile" data-toggle="tab">File Upload</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="tab-content ">
                        <div class="tab-pane active" id="staffsingle">
                            <form name="frm_add_staff" id="frm_add_staff" method="post" enctype="multipart/form-data">

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label>Company (disabled)</label>
                                                <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                                            </div>
                                        </div>
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" value="michael23">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" id="action" name="action" value="add_staff">
                                    <button type="submit" id="btn_add_staff" name="btn_add_staff" class="btn btn-success btn-round"><span id="text_btn_add_staff">Summit</span> <img id="loading_image_add_staff" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                                    <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>

                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="stafffile">
                            <form name="frm_upload_file_staff" id="frm_upload_file_staff" method="post" enctype="multipart/form-data">

                                <div class="modal-body">
                                    <label for="file_staff">File Excel</label>
                                    <input type="file" class="form-control" id="file_staff" name="file_staff">
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" id="action" name="action" value="upload_file_staff">
                                    <button type="submit" id="btn_upload_file_staff" name="btn_upload_file_staff" class="btn btn-success btn-round"><span id="text_btn_upload_file_staff">Summit</span> <img id="loading_image_file_staff" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                                    <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



<script>
    //staff
    function load_data(query = '') {
        /*   var hidden_list_ap_search = $('#hidden_list_ap_search').val();
          var hidden_list_TP_search = $('#hidden_list_TP_search').val(); */
        // var query2 = $('#hidden_country').val();
        $.ajax({
            url: "../backend/setting/setting_staff_fetch.php",
            method: "POST",
            data: {
                query: query
            },
            beforeSend: function() {
                $("#loading_image_staff_table").show();
                $('#table_staff').hide();
            },
            success: function(data) {
                $('#table_staff').html(data);
                $("#loading_image_staff_table").hide();
                $('#table_staff').show();
            }

        });
    }
    setTimeout(function() {
        load_data();
    }, 1000);



    $('#frm_upload_file_staff').on('submit', function(event) {
        event.preventDefault();
        if ($('#file_staff').val() == '') {
            alert("กรุณาเพิ่มไฟล์");
        } else {
            $('#btn_upload_file_staff').attr('disabled', true);

            var form_data = $(this).serialize();
            $.ajax({
                url: "../backend/setting/setting_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image_file_staff").show();
                    $("#text_btn_upload_file_staff").hide();
                },
                success: function(data) {
                    $("#loading_image_file_staff").hide();
                    $("#text_btn_upload_file_staff").show();

                    $('#modal_add_staff').modal('hide');
                    alert(data);
                    $('#frm_upload_file_staff')[0].reset();

                    $('#btn_upload_file_staff').attr('disabled', false);
                    load_data();


                }
            });
        }
    });

    $('#frm_add_staff').on('submit', function(event) {
        event.preventDefault();
        alert("Hi");
    });


    //Delete staff
    $(document).on('click', '.del_staff', function() {
        var confirmation = confirm("คุณแน่ใจว่าจะลบ StaffID นี้ใช่หรือไม่ ?");

        if (confirmation) {
            var id_staff_del = $(this).attr('id_staff_del');
            var action = 'del_staff';
            $.ajax({
                url: "../backend/setting/setting_action.php",
                method: "POST",
                data: {
                    id_staff_del: id_staff_del,
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
    //staff

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