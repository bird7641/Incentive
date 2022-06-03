<?php
include "../../backend/dblink.php";
include '../../vendor/autoload.php';

//วันที่
$dayTH = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'];
$monthTH = [null, 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
$monthTH_brev = [null, 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];


function thai_date_fullmonth($time)
{   // 19 ธันวาคม 2556
    global $dayTH, $monthTH;
    $thai_date_return = date("j", $time);
    $thai_date_return .= " " . $monthTH[date("n", $time)];
    $thai_date_return .= " " . (date("Y", $time) + 543);
    return $thai_date_return;
}


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;


if (isset($_POST["action"])) {
    if ($_POST["action"] == "upload_file_commu") {

        $inputFileName = $_FILES['file_commu']['tmp_name'];

        $arr_file = explode('.', $inputFileName);
        $extension = end($arr_file);

        if ('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else if ('xlsx' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }

        $spreadsheet = $reader->load($inputFileName);

        $sheetData = $spreadsheet->getActiveSheet()->toArray();



        if (!empty($sheetData)) {

            $staffID_head = $sheetData[0][0];
            $commuActual_head = $sheetData[0][1];
            $commuDate_head = $sheetData[0][2];


            if ($staffID_head == 'staffID' && $commuActual_head == 'commuActual' && $commuDate_head == 'commuDate') {
                for ($i = 1; $i < count($sheetData); $i++) {

                    $staffID = $sheetData[$i][0];
                    $commuActual = $sheetData[$i][1];
                    $commuDate = $sheetData[$i][2];



                    $month = date("m", strtotime($commuDate));
                    $year = date("Y", strtotime($commuDate));
                    $sql_check = "SELECT COUNT(staffID) AS countID FROM tbcommu WHERE staffID = '" . $staffID . "' AND ( MONTH(commuDate) = '" . $month . "' AND YEAR(commuDate) = '" . $year . "' )";
                    $query_check = $conn->query($sql_check);
                    $result_check = $query_check->fetch_array(MYSQLI_ASSOC);

                    $countID =  $result_check['countID'];

                    if ((int)$countID != 0) {
                        echo "รหัสพนักงาน : " . $staffID . " | เดือน : " . $month . " | ปี : " . $year . " มีอยู่ในระบบแล้ว \n";
                    } else {

                        $sql = "INSERT INTO tbcommu(staffID,commuActual,
                        commuDate,
                        addDate,
                        addBy
                        ) VALUES('" . $staffID . "', '" . $commuActual . "', '" . $commuDate . "', '" . date("Y-m-d") . "', '" . $_SESSION['staffNameTH'] . "')";

                        $query_commu = $conn->query($sql);

                     /*    $sql_check_emp = "SELECT COUNT(staffID) AS countemp FROM tbemp WHERE staffID = '" . $staffID . "' AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "' )";
                        $query_check_emp = $conn->query($sql_check_emp);
                        $result_check_emp = $query_check_emp->fetch_array(MYSQLI_ASSOC);

                        $countemp =  $result_check_emp['countemp'];
                        if ((int)$countemp != 0) {
                            $sql_emp = "
                            UPDATE tbemp 
                            SET 
                            CUMMU_Target = '4', 
                            CUMMU_Actual = '" . $commuActual . "', 
                            empDate = '" . $commuDate . "',
                            editDate = '" . date("Y-m-d") . "',
				            editBy = '" . $_SESSION['staffNameTH'] . "'
                            WHERE staffID = '" . $staffID . "' AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "' )";
                            //$_SESSION["staffNameTH"]
                        } else {

                            $sql_emp = "INSERT INTO tbemp(staffID,CUMMU_Target,CUMMU_Actual,empDate,addDate,addBy) 
                            VALUES('" . $staffID . "','4', '" . $commuActual . "', '" . $commuDate . "', '" . date("Y-m-d") . "', '" . $_SESSION['staffNameTH'] . "')";
                        }

                        $query_emp = $conn->query($sql_emp); */

                        if ($query_commu ) {
                        } else {
                            echo "Error";
                        }
                    }
                }
                echo "บันทึกข้อมูล สำเร็จ";
            } else {
                echo "File ใช้นี้ไม่ได้";
            }
        } else {
            echo "File นี้ไม่มีข้อมูล";
        }
    }

    if ($_POST["action"] == "fetch_edit_commu") {
        if (isset($_POST["id_commu_edit"])) {
            $stmt = "SELECT commuID,tbcommu.staffID,commuActual,staffNameTH
             FROM tbcommu LEFT OUTER JOIN tbstaff ON tbstaff.staffID = tbcommu.staffID WHERE commuID = '" . $_POST["id_commu_edit"] . "' ";

            $query = $conn->query($stmt);
            $result = $query->fetch_array(MYSQLI_ASSOC);


            echo json_encode($result);
        }
    }

    if ($_POST["action"] == "edit_commu") {

        $stmt = " 
		UPDATE tbcommu
		SET  
		commuActual = '" . $_POST['txt_commuActual_e'] . "',
		editDate = '" . date("Y-m-d") . "',
		editBy = '" . $_SESSION['staffNameTH'] . "'
	
		WHERE commuID = '" . $_POST['txt_commuID_e'] . "' ";

        //$_SESSION["staffName"]

        $query = $conn->query($stmt);

        if ($query) {
            echo 'แก้ไขข้อมูล สำเร็จ ';
        } else {
            echo 'แก้ไขข้อมูล ไม่สำเร็จ!!';
        }
    }


    if ($_POST["action"] == "del_commu") {
        if (isset($_POST["id_commu_del"])) {
           /*  $stmt_emp = "SELECT * FROM tbcommu WHERE commuID = '" . $_POST["id_commu_del"] . "' ";
            $query_emp = $conn->query($stmt_emp);
            $result_emp = $query_emp->fetch_array(MYSQLI_ASSOC);
            $commu_date = $result_emp["commuDate"];
            $month = date("m", strtotime($commu_date));
            $year = date("Y", strtotime($commu_date));

            $stmt_update_emp = " 
            UPDATE tbemp
            SET  
            CUMMU_Actual = null ,
            editDate = '" . date("Y-m-d") . "',
            editBy = '" . $_SESSION['staffNameTH'] . "'
        
            WHERE staffID = '" . $result_emp["staffID"] . "'  AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "' )";

            //$_SESSION["staffName"]

            $query_update_emp = $conn->query($stmt_update_emp); */


            $stmt = "DELETE FROM tbcommu WHERE commuID = '" . $_POST["id_commu_del"] . "'";
            $query = $conn->query($stmt);

            if ($query) {
                echo 'ลบข้อมูลเรียบร้อย';
            } else {
                echo 'ไม่สามารถลบข้อมูลได้';
            }
        }
    }
}
