<!doctype html>
<html lang="en">

<head>
    <title>Incentive</title>
    <link rel="apple-touch-icon" sizes="76x76" href="frontend/img/icon/favicon.png">
    <link rel="icon" type="image/png" href="frontend/img/icon/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css_login/css/style.css">

    <!-- Jqurey -->
    <link rel="stylesheet" href="assets/jquery/jquery-ui.css">
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/jquery/jquery-ui.js"></script>
    <?php session_start(); ?>
</head>

<body>
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(css_login/images/bg-1.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Reset Password</h3>
                                </div>
                            </div>
                            <form class="signin-form" id="frm_resetpassword" name="frm_resetpassword">
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" id="txt_staffID_resetpassword" name="txt_staffID_resetpassword" value="<?php echo $_SESSION['staffID']; ?>" readonly>

                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="txt_staffPassword_resetpassword" name="txt_staffPassword_resetpassword">


                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="action" name="action" value="action_resetpassword">
                                    <button type="submit" id="btn_resetpassword" name="btn_resetpassword" class="btn btn-success btn-round"><span id="text_btn_resetpassword">Submit</span> <img id="loading_image_resetpassword" src="frontend/img/icon/Spinner_loader.gif" style="display:none;" width="20" height="20" /></button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

    <script>
        $('#frm_resetpassword').on('submit', function(event) {
            event.preventDefault();

            if ($('#txt_staffID_resetpassword').val() == '') {
                alert("กรุณาใส่ รหัสพนักงาน");
            } else if ($('#txt_staffPassword_resetpassword').val() == '') {
                alert("กรุณาใส่ Password");
            } else {
                if ($('#txt_staffID_resetpassword').val() == $('#txt_staffPassword_resetpassword').val()) {
                    alert("กรุณาตั้งรหัสผ่านไม่ให้เหมือนกับรหัสพนักงาน");
                } else {

                    $('#btn_resetpassword').attr('disabled', true);
                    $.ajax({
                        url: "backend/index/index_action.php",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $("#loading_image_resetpassword").show();
                            $("#text_btn_resetpassword").hide();
                        },
                        success: function(data) {
                            $("#loading_image_resetpassword").hide();
                            $("#text_btn_resetpassword").show();
                            $('#btn_resetpassword').attr('disabled', false);

                            document.getElementById("frm_resetpassword").reset();

                            if (data.status = 'Resetpassword Success') {
                                console.log(data);
                                window.location.href = "index.html";
                            } else {
                                console.log(data);
                            }

                        }
                    });

                }

            }
        });
    </script>

</body>

</html>