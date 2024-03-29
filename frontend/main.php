<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../frontend/img/icon/favicon.PNG">
  <link rel="icon" type="image/png" href="../frontend/img/icon/favicon.PNG">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Incentive
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!--   <link href="../assets/demo/demo.css" rel="stylesheet" /> -->

  <!-- Jqurey -->
  <link rel="stylesheet" href="../assets/jquery/jquery-ui.css">
  <script src="../assets/jquery/jquery.min.js"></script>
  <script src="../assets/jquery/jquery-ui.js"></script>

  <!-- data table -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
  <!-- data table -->


  <?php
  include "../backend/dblink.php";
  ?>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="crimson">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">

        </a>
        <a href="#" class="simple-text logo-normal">
          Incentive
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="main.php?page=dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php
          if ($_SESSION["staffLevel"] == 'SuperAdmin' ||  $_SESSION["staffLevel"] == 'Admin') {
          ?>
            <li>
              <a href="main.php?page=timestamp">
                <i class="now-ui-icons tech_watch-time"></i>
                <p>Timestamp</p>
              </a>
            </li>
            <li>
              <a href="main.php?page=complaint">
                <i class="now-ui-icons files_paper"></i>
                <p>Complaint</p>
              </a>
            </li>
            <li>
            <li>
              <a href="main.php?page=commu">
                <i class="now-ui-icons location_world"></i>
                <p>Commu</p>
              </a>
            </li>
            <li>
            <li>
              <a href="main.php?page=warning">
                <i class="now-ui-icons ui-1_bell-53"></i>
                <p>Warning</p>
              </a>
            </li>
            <li>
              <a href="main.php?page=setting">
                <i class="now-ui-icons loader_gear"></i>
                <p>Setting</p>
              </a>
            </li>
          <?php
          }
          ?>
          <li>
            <a href="../backend/index/logout.php">
              <i class="now-ui-icons media-1_button-power"></i>
              <p>Logout</p>
            </a>
          </li>


        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">

            <a class="navbar-brand" style="color: #000000;">INCENTIVE</a>
          </div>


          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">


              <li class="nav-item">
                <!--  <img src="img/icon/user_icon.PNG" alt="user" class="rounded-circle" width="40" height="40"> -->
                <span style="color:#000000;font-size: 14px;"><?php echo $_SESSION['staffNameTH'] . " (" . $_SESSION['staffLevel'] . ")" ?></span>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <br><br>
      <div class="content">

        <!-- เนื้อหา -->
        <?php
        $strAction = isset($_GET['page']) ? $_GET['page'] : '';

        switch ($strAction) {

          case "dashboard":
            include("menu_dashboard/dashboard.php");
            break;

          case "timestamp":
            include("menu_timestamp/timestamp.php");
            break;

          case "complaint":
            include("menu_complaint/complaint.php");
            break;

          case "commu":
            include("menu_commu/commu.php");
            break;

          case "warning":
            include("menu_warning/warning.php");
            break;

          case "setting":
            include("menu_setting/setting.php");
            break;


          default:
            include("menu_dashboard/dashboard.php");
        }
        ?>


        <!-- เนื้อหา -->
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>

    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!-- data table -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
  <!-- data table -->
  <!--  Google Maps Plugin    -->
  <!--  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Chart JS -->
  <!-- <script src="../assets/js/plugins/chartjs.min.js"></script> -->
  <!--  Notifications Plugin    -->
  <!-- <script src="../assets/js/plugins/bootstrap-notify.js"></script> -->
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script> -->
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <!-- <script src="../assets/demo/demo.js"></script> -->
  <!--  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script> -->
</body>

</html>