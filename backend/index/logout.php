<?php
include "../../backend/dblink.php";
$log = "INSERT INTO tbLog ( logDate, logTime, logUser, logIP, logHead, logAction, logRemark )
          VALUES
         (
          '" . date(' Y - m - d ') . "',
          '" . date("H:i:s") . "',
          '" . $_SESSION["staffNameTH"] . "',
          '" . $_SESSION["IPaddress"] . "',
          'Logout',
          'ออกจากระบบด้วยตนเอง',
          '-' 
        )";
$log_query = $conn->query($log);

session_destroy();
header('Location: ../../index.html');
