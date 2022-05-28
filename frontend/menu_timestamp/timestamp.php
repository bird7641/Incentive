<div class="row">
    <div class="col-lg-3">
        <div class="card card-chart">
            <form name="frm_upload_file_timestamp" id="frm_upload_file_timestamp" method="post" enctype="multipart/form-data">
                <div class="card-header">
                    <h5 class="card-category">Upload </h5>
                    <h4 class="card-title">Timestamp</h4>

                </div>
                <div class="card-body">
                    <label for="file_timestamp">File Excel</label>
                    <input type="file" class="form-control" id="file_timestamp" name="file_timestamp" placeholder="name@example.com">
                </div>
                <div class="card-footer">
                    <div class="stats text-right">
                        <input type="hidden" id="action" name="action" value="upload_file_timestamp">

                        <button type="submit" id="btn_upload_file_timestamp" name="btn_upload_file_timestamp" class="btn btn-primary btn-round"><span id="text_btn_upload_file_timestamp">Summit</span> <img id="loading_image" src="../frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>


<script>
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

                    $('#CMC_modal_Unlock_Voucher').modal('hide');
                    alert(data);

                    $('#btn_upload_file_timestamp').attr('disabled', false);



                }
            });
        }
    });
</script>