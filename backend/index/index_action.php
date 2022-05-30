<?php


include "../../backend/dblink.php";

//กำหนดค่า Access-Control-Allow-Origin ให้ เครื่อง อื่น ๆ สามารถเรียกใช้งานหน้านี้ได้
header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$requestMethod = $_SERVER["REQUEST_METHOD"];

//อ่านข้อมูลที่ส่งมาแล้วเก็บไว้ที่ตัวแปร data
$data = file_get_contents("php://input");

//แปลงข้อมูลที่อ่านได้ เป็น array แล้วเก็บไว้ที่ตัวแปร result
$result = json_decode($data, true);

/* if ($requestMethod == 'GET') {

    $sqllog = "SELECT * FROM IAM.dbo.tbPFA";

    $querylog = sqlsrv_query($conn, $sqllog);

    //สร้างตัวแปร array สำหรับเก็บข้อมูลที่ได้
    $arr = array();
    while ($resultlog = sqlsrv_fetch_array($querylog, SQLSRV_FETCH_ASSOC)) {
        $arr[] = $resultlog;
    }

    echo json_encode($arr);
} */
$action = $_POST['action'];
if ($requestMethod == 'POST') {


    if ($action == 'action_login') {

        $txt_staffID_login = $_POST['txt_staffID_login'];
        $txt_staffPassword_login = $_POST['txt_staffPassword_login'];


        $sqllog = "SELECT * FROM tbstaff WHERE staffID = '" . $txt_staffID_login . "' AND staffPassword = '" . strtoupper(md5($txt_staffPassword_login)) . "' AND staffStatus = 'Y' ";
        $querylog = $conn->query($sqllog);
        $resultlog = $querylog->fetch_array(MYSQLI_ASSOC);


        if ($resultlog) {
            $_SESSION["staffID"] = $resultlog["staffID"];
            $_SESSION["staffNameTH"] = $resultlog["staffNameTH"];
            $_SESSION["staffPosition"] = $resultlog["staffPosition"];
            $_SESSION["staffLevel"] = $resultlog["staffLevel"];

            $_SESSION["IPaddress"] = $_SERVER['REMOTE_ADDR'];

            $_SESSION['staffstart'] = time();
            $_SESSION['staffexpire'] = $_SESSION['staffstart'] + (60 * 120);
            session_write_close();

            if ($resultlog['staffPasswordStatus'] == 'N') {
                //header("location:index_resetpass.php");
                echo json_encode(['status' => 'Reset', 'message' => 'location:index_resetpass.php']);
            } else if ($resultlog['staffPasswordStatus'] == 'Y') {

                $log = "INSERT INTO tblog ( logDate, logTime, logUser, logIP, logHead, logAction, logRemark )
                                VALUES
                                    (
                                        '" . date('Y-m-d') . "',
                                        '" . date("H:i:s") . "',
                                        '" . $_SESSION["staffID"] . "',
                                        '" . $_SESSION["IPaddress"] . "',
                                        'Login',
                                        'เข้าใช้งานระบบได้ตามปกติ',
                                    '-' 
                                    )";
                $log_query = $conn->query($log);

                //header("location:Main.php");
                echo json_encode(['status' => 'Login Success', 'message' => 'location:frontend/Main.php']);
            } else {
                echo json_encode(['status' => 'Login Fail Status', 'message' => 'สถานะ passwordไม่ถูกต้อง']);
            }
        } else {
            $log = "INSERT INTO tblog ( logDate, logTime, logUser, logIP, logHead, logAction, logRemark )
                    VALUES
                        (
                            '" . date('Y-m-d') . "',
                            '" . date("H:i:s") . "',
                            '-',
                            '" . $_SERVER['REMOTE_ADDR'] . "',
                            'Login',
                            'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง',
                        'Username : " . $txt_staffID_login . "' 
                        )";
            $log_query = $conn->query($log);



            echo json_encode(['status' => 'Login Fail no User', 'message' => 'ระบุชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง']);
        }
    }

    if ($action == 'action_resetpassword') {
        $query = "UPDATE tbstaff
        SET  
        staffPassword = '" . strtoupper(md5($_POST['txt_staffPassword_resetpassword'])) . "',
        staffPasswordStatus = 'Y'
        WHERE staffID = '" . $_POST['txt_staffID_resetpassword'] . "'";

        $stmt = $conn->query($query);
        if ($stmt) {
            session_destroy();
            echo json_encode(['status' => 'Resetpassword Success', 'message' => 'เปลี่ยนรหัสผ่านสำเร็จ']);
        } else {
            echo json_encode(['status' => 'Resetpassword Error', 'message' => 'เปลี่ยนรหัสผ่าน ไม่สำเร็จ']);
        }
    }

    if ($action == 'action_forgot') {
        $sqllog = "SELECT * FROM tbstaff WHERE staffID = '" . $_POST['txt_staffID_forgot'] . "'  AND staffStatus = 'Y' ";
        $querylog = $conn->query($sqllog);
        $resultlog = $querylog->fetch_array(MYSQLI_ASSOC);
        if ($resultlog) {
            $query = "UPDATE tbstaff
            SET  
            staffPassword = '" . strtoupper(md5($_POST['txt_staffID_forgot'])) . "',
            staffPasswordStatus = 'N'
            WHERE staffID = '" . $_POST['txt_staffID_forgot'] . "'";

            $stmt = $conn->query($query);
            if ($stmt) {
                session_destroy();
                echo json_encode(['status' => 'Forgot Success', 'message' => 'เปลี่ยนรหัสผ่านสำเร็จ']);
            } else {
                echo json_encode(['status' => 'Forgot Error', 'message' => 'เปลี่ยนรหัสผ่าน ไม่สำเร็จ']);
            }
        } else {
            echo json_encode(['status' => 'Forgot Fail no User', 'message' => 'ระบุชื่อผู้ใช้งานไม่ถูกต้อง']);
        }
    }
}
