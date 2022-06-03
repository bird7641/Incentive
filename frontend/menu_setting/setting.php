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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add_site">Add</button>

                    </div>
                </div>
            </div>
            <div class="card-body text-center">
                <img id="loading_image_site_table" src="../frontend/img/icon/Spinner_loader.gif" style="display: none;" />
                <div id="table_site"> </div>
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
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>รหัสพนัก</label>
                                                <input type="text" class="form-control" id="txt_staffID" name="txt_staffID" placeholder="รหัสพนัก" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>Fisrtname</label>
                                                <input type="text" class="form-control" id="txt_staffFisrtName" name="txt_staffFisrtName" placeholder="ชื่อ" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" class="form-control" id="txt_staffLastname" name="txt_staffLastname" placeholder="นามสกุล" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Position</label>
                                                <input type="text" class="form-control" id="txt_staffPosition" name="txt_staffPosition" placeholder="Position" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>Section</label>
                                                <input type="text" class="form-control" id="txt_staffSection" name="txt_staffSection" placeholder="Section" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Profitcenter</label>
                                                <input type="text" class="form-control" id="txt_staffProfitcenter" name="txt_staffProfitcenter" placeholder="Profitcenter" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Group</label>
                                                <input type="text" class="form-control" id="txt_staffGroup" name="txt_staffGroup" placeholder="Group" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Startwork</label>
                                                <input type="date" class="form-control" id="txt_staffStartwork" name="txt_staffStartwork" value="<?php echo date("Y-m-d"); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label for="list_staffLevel">Level</label>
                                                <select id="list_staffLevel" name="list_staffLevel" class="form-control">
                                                    <option value="" selected>Choose...</option>
                                                    <option value="User">User</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="SuperAdmin">SuperAdmin</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label for="list_staffSiteID">Site</label>
                                                <select id="list_staffSiteID" name="list_staffSiteID" class="form-control">
                                                    <option value="" selected>Choose...</option>
                                                </select>
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

<!-- Modal edit staff-->
<div class="modal fade" id="modal_edit_staff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form name="frm_edit_staff" id="frm_edit_staff" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>รหัสพนัก</label>
                                <input type="text" class="form-control" id="txt_staffID_e" name="txt_staffID_e" placeholder="รหัสพนัก" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-8 px-1">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="txt_staffNameTH_e" name="txt_staffNameTH_e" placeholder="ชื่อ-นามสกุล" value="">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" id="txt_staffPosition_e" name="txt_staffPosition_e" placeholder="Position" value="">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Section</label>
                                <input type="text" class="form-control" id="txt_staffSection_e" name="txt_staffSection_e" placeholder="Section" value="">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>Profitcenter</label>
                                <input type="text" class="form-control" id="txt_staffProfitcenter_e" name="txt_staffProfitcenter_e" placeholder="Profitcenter" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Group</label>
                                <input type="text" class="form-control" id="txt_staffGroup_e" name="txt_staffGroup_e" placeholder="Group" value="">
                            </div>
                        </div>
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Startwork</label>
                                <input type="date" class="form-control" id="txt_staffStartwork_e" name="txt_staffStartwork_e" value="">
                            </div>
                        </div>
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Endwork</label>
                                <input type="date" class="form-control" id="txt_staffEndwork_e" name="txt_staffEndwork_e" value="">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label for="list_staffLevel_e">Level</label>
                                <select id="list_staffLevel_e" name="list_staffLevel_e" class="form-control">
                                    <option value="" selected>Choose...</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                    <option value="SuperAdmin">SuperAdmin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label for="list_staffSiteID_e">Site</label>
                                <select id="list_staffSiteID_e" name="list_staffSiteID_e" class="form-control">
                                    <option value="" selected>Choose...</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="action" name="action" value="edit_staff">
                    <button type="submit" id="btn_edit_staff" name="btn_edit_staff" class="btn btn-success btn-round"><span id="text_btn_edit_staff">Summit</span> <img id="loading_image_edit_staff" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                    <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>

                </div>
            </form>

        </div>
    </div>
</div>



<!-- Modal upload site-->
<div class="modal fade" id="modal_add_site" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add site</h5>
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
                                    <a class="nav-link active" href="#sitesingle" data-toggle="tab">Single</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#sitefile" data-toggle="tab">File Upload</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="tab-content ">
                        <div class="tab-pane active" id="sitesingle">
                            <form name="frm_add_site" id="frm_add_site" method="post" enctype="multipart/form-data">

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>รหัสพนัก</label>
                                                <input type="text" class="form-control" id="txt_siteID" name="txt_siteID" placeholder="รหัสพนัก" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>Fisrtname</label>
                                                <input type="text" class="form-control" id="txt_siteFisrtName" name="txt_siteFisrtName" placeholder="ชื่อ" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" class="form-control" id="txt_siteLastname" name="txt_siteLastname" placeholder="นามสกุล" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Position</label>
                                                <input type="text" class="form-control" id="txt_sitePosition" name="txt_sitePosition" placeholder="Position" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>Section</label>
                                                <input type="text" class="form-control" id="txt_siteSection" name="txt_siteSection" placeholder="Section" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Profitcenter</label>
                                                <input type="text" class="form-control" id="txt_siteProfitcenter" name="txt_siteProfitcenter" placeholder="Profitcenter" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Group</label>
                                                <input type="text" class="form-control" id="txt_siteGroup" name="txt_siteGroup" placeholder="Group" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Startwork</label>
                                                <input type="date" class="form-control" id="txt_siteStartwork" name="txt_siteStartwork" value="<?php echo date("Y-m-d"); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label for="list_siteLevel">Level</label>
                                                <select id="list_siteLevel" name="list_siteLevel" class="form-control">
                                                    <option value="" selected>Choose...</option>
                                                    <option value="User">User</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="SuperAdmin">SuperAdmin</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label for="list_siteSiteID">Site</label>
                                                <select id="list_siteSiteID" name="list_siteSiteID" class="form-control">
                                                    <option value="" selected>Choose...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" id="action" name="action" value="add_site">
                                    <button type="submit" id="btn_add_site" name="btn_add_site" class="btn btn-success btn-round"><span id="text_btn_add_site">Summit</span> <img id="loading_image_add_site" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                                    <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>

                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="sitefile">
                            <form name="frm_upload_file_site" id="frm_upload_file_site" method="post" enctype="multipart/form-data">

                                <div class="modal-body">
                                    <label for="file_site">File Excel</label>
                                    <input type="file" class="form-control" id="file_site" name="file_site">
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" id="action" name="action" value="upload_file_site">
                                    <button type="submit" id="btn_upload_file_site" name="btn_upload_file_site" class="btn btn-success btn-round"><span id="text_btn_upload_file_site">Summit</span> <img id="loading_image_file_site" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
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

<!-- Modal edit site-->
<div class="modal fade" id="modal_edit_site" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit site</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form name="frm_edit_site" id="frm_edit_site" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>รหัสพนัก</label>
                                <input type="text" class="form-control" id="txt_siteID_e" name="txt_siteID_e" placeholder="รหัสพนัก" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-8 px-1">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="txt_siteNameTH_e" name="txt_siteNameTH_e" placeholder="ชื่อ-นามสกุล" value="">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" id="txt_sitePosition_e" name="txt_sitePosition_e" placeholder="Position" value="">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Section</label>
                                <input type="text" class="form-control" id="txt_siteSection_e" name="txt_siteSection_e" placeholder="Section" value="">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>Profitcenter</label>
                                <input type="text" class="form-control" id="txt_siteProfitcenter_e" name="txt_siteProfitcenter_e" placeholder="Profitcenter" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Group</label>
                                <input type="text" class="form-control" id="txt_siteGroup_e" name="txt_siteGroup_e" placeholder="Group" value="">
                            </div>
                        </div>
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Startwork</label>
                                <input type="date" class="form-control" id="txt_siteStartwork_e" name="txt_siteStartwork_e" value="">
                            </div>
                        </div>
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Endwork</label>
                                <input type="date" class="form-control" id="txt_siteEndwork_e" name="txt_siteEndwork_e" value="">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label for="list_siteLevel_e">Level</label>
                                <select id="list_siteLevel_e" name="list_siteLevel_e" class="form-control">
                                    <option value="" selected>Choose...</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                    <option value="SuperAdmin">SuperAdmin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label for="list_siteSiteID_e">Site</label>
                                <select id="list_siteSiteID_e" name="list_siteSiteID_e" class="form-control">
                                    <option value="" selected>Choose...</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="action" name="action" value="edit_site">
                    <button type="submit" id="btn_edit_site" name="btn_edit_site" class="btn btn-success btn-round"><span id="text_btn_edit_site">Summit</span> <img id="loading_image_edit_site" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                    <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>

                </div>
            </form>

        </div>
    </div>
</div>


<script>
    //staff
    function load_data_staff(query = '') {
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

    function load_staffsite_list(query = '') {
        $.ajax({
            url: '../backend/setting/setting_staff_listSite_fetch.php',
            type: 'post',
            data: {
                query: query
            },
            dataType: 'json',
            success: function(response) {

                var len = response.length;

                $("#list_staffSiteID").empty();
                $("#list_staffSiteID").append("<option value=''>Choose...</option>");
                for (var i = 0; i < len; i++) {
                    var siteID = response[i]['siteID'];
                    var siteName = response[i]['siteName'];


                    $("#list_staffSiteID").append("<option value='" + siteID + "'>" + siteName + "</option>");

                }

                $("#list_staffSiteID_e").empty();
                $("#list_staffSiteID_e").append("<option value=''>Choose...</option>");
                for (var i = 0; i < len; i++) {
                    var siteID = response[i]['siteID'];
                    var siteName = response[i]['siteName'];


                    $("#list_staffSiteID_e").append("<option value='" + siteID + "'>" + siteName + "</option>");

                }
            }
        });
    }


    setTimeout(function() {
        load_data_staff();
        load_data_site();
        load_staffsite_list();
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
        if ($('#txt_staffID').val() == '') {
            alert("กรุณาใส่ รหัสพนักงาน");
        } else if ($('#txt_staffFisrtName').val() == '') {
            alert("กรุณาใส่ ชื่อ");
        } else if ($('#txt_staffLastname').val() == '') {
            alert("กรุณาใส่ นามสกุล");
        } else if ($('#txt_staffPosition').val() == '') {
            alert("กรุณาใส่ Position");
        } else if ($('#txt_staffSection').val() == '') {
            alert("กรุณาใส่ Section");
        } else if ($('#txt_staffProfitcenter').val() == '') {
            alert("กรุณาใส่ Profitcenter");
        } else if ($('#txt_staffGroup').val() == '') {
            alert("กรุณาใส่ Group");
        } else if ($('#list_staffSiteID').val() == '') {
            alert("กรุณาใส่ Site");
        } else {
            $('#btn_add_staff').attr('disabled', true);

            var form_data = $(this).serialize();
            $.ajax({
                url: "../backend/setting/setting_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image_add_staff").show();
                    $("#text_btn_add_staff").hide();
                },
                success: function(data) {
                    $("#loading_image_add_staff").hide();
                    $("#text_btn_add_staff").show();

                    $('#modal_add_staff').modal('hide');
                    alert(data);
                    $('#frm_add_staff')[0].reset();

                    $('#btn_add_staff').attr('disabled', false);
                    load_data();


                }
            });
        }
    });

    //Edit staff
    $(document).on('click', '.edit_staff', function() {

        var id_staff_edit = $(this).attr('id_staff_edit');
        var action = 'fetch_edit_staff';
        $.ajax({
            url: "../backend/setting/setting_action.php",
            method: "POST",
            data: {
                id_staff_edit: id_staff_edit,
                action: action
            },
            dataType: "json",
            success: function(data) {
                $("#txt_staffID_e").val(data.staffID);
                $("#txt_staffNameTH_e").val(data.staffNameTH);
                $("#txt_staffPosition_e").val(data.staffPosition);
                $("#txt_staffSection_e").val(data.staffSection);
                $("#txt_staffProfitcenter_e").val(data.staffProfitCenter);
                $("#txt_staffGroup_e").val(data.staffGroup);
                $("#txt_staffStartwork_e").val(data.staffStartWorkDate);
                $("#txt_staffEndwork_e").val(data.staffEndWorkDate);
                $("#list_staffLevel_e").val(data.staffLevel);
                $("#list_staffSiteID_e").val(data.siteID);

            }
        });
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




    $('#frm_edit_staff').on('submit', function(event) {
        event.preventDefault();

        if ($('#txt_staffID_e').val() == '') {
            alert("กรุณาติดต่อผู้พัฒนาระบบ");
        } else if ($('#txt_staffNameTH_e').val() == '') {
            alert("กรุณาใส่ ชื่อ");
        } else if ($('#txt_staffPosition_e').val() == '') {
            alert("กรุณาใส่ Position");
        } else if ($('#txt_staffSection_e').val() == '') {
            alert("กรุณาใส่ Section");
        } else if ($('#txt_staffProfitcenter_e').val() == '') {
            alert("กรุณาใส่ Profitcenter");
        } else if ($('#txt_staffGroup_e').val() == '') {
            alert("กรุณาใส่ Group");
        } else if ($('#txt_staffStartwork_e').val() == '') {
            alert("กรุณาใส่ วันที่เริ่มงาน");
        } else if ($('#list_staffLevel_e').val() == '') {
            alert("กรุณาใส่ Level");
        } else if ($('#list_staffSiteID_e').val() == '') {
            alert("กรุณาใส่ Site");
        } else {

            $('#btn_edit_staff').attr('disabled', true);


            $.ajax({
                url: "../backend/setting/setting_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image_edit_staff").show();
                    $("#text_btn_edit_staff").hide();
                },
                success: function(data) {
                    $("#loading_image_edit_staff").hide();
                    $("#text_btn_edit_staff").show();

                    $('#modal_edit_staff').modal('hide');
                    alert(data);

                    $('#btn_edit_staff').attr('disabled', false);

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


    //site
    function load_data_site(query = '') {
        /*   var hidden_list_ap_search = $('#hidden_list_ap_search').val();
          var hidden_list_TP_search = $('#hidden_list_TP_search').val(); */
        // var query2 = $('#hidden_country').val();
        $.ajax({
            url: "../backend/setting/setting_site_fetch.php",
            method: "POST",
            data: {
                query: query
            },
            beforeSend: function() {
                $("#loading_image_site_table").show();
                $('#table_site').hide();
            },
            success: function(data) {
                $('#table_site').html(data);
                $("#loading_image_site_table").hide();
                $('#table_site').show();
            }

        });
    }

    

    $('#frm_upload_file_site').on('submit', function(event) {
        event.preventDefault();
        if ($('#file_site').val() == '') {
            alert("กรุณาเพิ่มไฟล์");
        } else {
            $('#btn_upload_file_site').attr('disabled', true);

            var form_data = $(this).serialize();
            $.ajax({
                url: "../backend/setting/setting_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image_file_site").show();
                    $("#text_btn_upload_file_site").hide();
                },
                success: function(data) {
                    $("#loading_image_file_site").hide();
                    $("#text_btn_upload_file_site").show();

                    $('#modal_add_site').modal('hide');
                    alert(data);
                    $('#frm_upload_file_site')[0].reset();

                    $('#btn_upload_file_site').attr('disabled', false);
                    load_data();


                }
            });
        }
    });

    $('#frm_add_site').on('submit', function(event) {
        event.preventDefault();
        if ($('#txt_siteID').val() == '') {
            alert("กรุณาใส่ รหัสพนักงาน");
        } else if ($('#txt_siteFisrtName').val() == '') {
            alert("กรุณาใส่ ชื่อ");
        } else if ($('#txt_siteLastname').val() == '') {
            alert("กรุณาใส่ นามสกุล");
        } else if ($('#txt_sitePosition').val() == '') {
            alert("กรุณาใส่ Position");
        } else if ($('#txt_siteSection').val() == '') {
            alert("กรุณาใส่ Section");
        } else if ($('#txt_siteProfitcenter').val() == '') {
            alert("กรุณาใส่ Profitcenter");
        } else if ($('#txt_siteGroup').val() == '') {
            alert("กรุณาใส่ Group");
        } else if ($('#list_siteSiteID').val() == '') {
            alert("กรุณาใส่ Site");
        } else {
            $('#btn_add_site').attr('disabled', true);

            var form_data = $(this).serialize();
            $.ajax({
                url: "../backend/setting/setting_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image_add_site").show();
                    $("#text_btn_add_site").hide();
                },
                success: function(data) {
                    $("#loading_image_add_site").hide();
                    $("#text_btn_add_site").show();

                    $('#modal_add_site').modal('hide');
                    alert(data);
                    $('#frm_add_site')[0].reset();

                    $('#btn_add_site').attr('disabled', false);
                    load_data();


                }
            });
        }
    });

    //Edit site
    $(document).on('click', '.edit_site', function() {

        var id_site_edit = $(this).attr('id_site_edit');
        var action = 'fetch_edit_site';
        $.ajax({
            url: "../backend/setting/setting_action.php",
            method: "POST",
            data: {
                id_site_edit: id_site_edit,
                action: action
            },
            dataType: "json",
            success: function(data) {
                $("#txt_siteID_e").val(data.siteID);
                $("#txt_siteNameTH_e").val(data.siteNameTH);
                $("#txt_sitePosition_e").val(data.sitePosition);
                $("#txt_siteSection_e").val(data.siteSection);
                $("#txt_siteProfitcenter_e").val(data.siteProfitCenter);
                $("#txt_siteGroup_e").val(data.siteGroup);
                $("#txt_siteStartwork_e").val(data.siteStartWorkDate);
                $("#txt_siteEndwork_e").val(data.siteEndWorkDate);
                $("#list_siteLevel_e").val(data.siteLevel);
                $("#list_siteSiteID_e").val(data.siteID);

            }
        });
    });

    //Delete site
    $(document).on('click', '.del_site', function() {
        var confirmation = confirm("คุณแน่ใจว่าจะลบ siteID นี้ใช่หรือไม่ ?");

        if (confirmation) {
            var id_site_del = $(this).attr('id_site_del');
            var action = 'del_site';
            $.ajax({
                url: "../backend/setting/setting_action.php",
                method: "POST",
                data: {
                    id_site_del: id_site_del,
                    action: action
                },
                success: function(data) {
                    alert(data);
                    load_data_site();
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
    //site




    $('#frm_edit_site').on('submit', function(event) {
        event.preventDefault();

        if ($('#txt_siteID_e').val() == '') {
            alert("กรุณาติดต่อผู้พัฒนาระบบ");
        } else if ($('#txt_siteNameTH_e').val() == '') {
            alert("กรุณาใส่ ชื่อ");
        } else if ($('#txt_sitePosition_e').val() == '') {
            alert("กรุณาใส่ Position");
        } else if ($('#txt_siteSection_e').val() == '') {
            alert("กรุณาใส่ Section");
        } else if ($('#txt_siteProfitcenter_e').val() == '') {
            alert("กรุณาใส่ Profitcenter");
        } else if ($('#txt_siteGroup_e').val() == '') {
            alert("กรุณาใส่ Group");
        } else if ($('#txt_siteStartwork_e').val() == '') {
            alert("กรุณาใส่ วันที่เริ่มงาน");
        } else if ($('#list_siteLevel_e').val() == '') {
            alert("กรุณาใส่ Level");
        } else if ($('#list_siteSiteID_e').val() == '') {
            alert("กรุณาใส่ Site");
        } else {

            $('#btn_edit_site').attr('disabled', true);


            $.ajax({
                url: "../backend/setting/setting_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#loading_image_edit_site").show();
                    $("#text_btn_edit_site").hide();
                },
                success: function(data) {
                    $("#loading_image_edit_site").hide();
                    $("#text_btn_edit_site").show();

                    $('#modal_edit_site').modal('hide');
                    alert(data);

                    $('#btn_edit_site').attr('disabled', false);

                    load_data_site();
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
</script>