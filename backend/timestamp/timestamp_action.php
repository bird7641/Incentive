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
    if ($_POST["action"] == "upload_file_timestamp") {

        $inputFileName = $_FILES['file_timestamp']['tmp_name'];

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
            $timestampLate_head = $sheetData[0][1];
            $timestampAbsence_head = $sheetData[0][2];
            $timestampDate_head = $sheetData[0][3];

            if ($staffID_head == 'staffID' && $timestampLate_head == 'timestampLate' && $timestampAbsence_head == 'timestampAbsence' && $timestampDate_head == 'timestampDate') {
                for ($i = 1; $i < count($sheetData); $i++) {

                    $staffID = $sheetData[$i][0];
                    $timestampLate = $sheetData[$i][1];
                    $timestampAbsence = $sheetData[$i][2];
                    $timestampDate = $sheetData[$i][3];


                    $month = date("m", strtotime($timestampDate));
                    $year = date("Y", strtotime($timestampDate));
                    $sql_check = "SELECT COUNT(staffID) AS countID FROM tbtimestamp WHERE staffID = '" . $staffID . "' AND ( MONTH(timestampDate) = '" . $month . "' AND YEAR(timestampDate) = '" . $year . "' )";
                    $query_check = $conn->query($sql_check);
                    $result_check = $query_check->fetch_array(MYSQLI_ASSOC);

                    $countID =  $result_check['countID'];

                    if ((int)$countID != 0) {
                        echo "รหัสพนักงาน : " . $staffID . " | เดือน : " . $month . " | ปี : " . $year . " มีอยู่ในระบบแล้ว \n";
                    } else {

                        $sql = "INSERT INTO tbtimestamp(staffID,timestampLate,
                        timestampAbsence,
                        timestampDate,
                        addDate,
                        addBy
                        ) VALUES('" . $staffID . "', '" . $timestampLate . "', '" . $timestampAbsence . "', '" . $timestampDate . "', '" . date("Y-m-d") . "', '" . $_SESSION['staffNameTH'] . "')";

                        $query_timestamp = $conn->query($sql);

                        $sql_check_emp = "SELECT COUNT(staffID) AS countemp FROM tbemp WHERE staffID = '" . $staffID . "' AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "' )";
                        $query_check_emp = $conn->query($sql_check_emp);
                        $result_check_emp = $query_check_emp->fetch_array(MYSQLI_ASSOC);

                        $countemp =  $result_check_emp['countemp'];
                        if ((int)$countemp != 0) {
                            $sql_emp = "
                            UPDATE tbemp 
                            SET 
                            Late_Actual = '" . $timestampLate . "', 
                            Absence_Actual = '" . $timestampAbsence . "' , 
                            empDate = '" . $timestampDate . "',
                            editDate = '" . date("Y-m-d") . "',
				            editBy = '" . $_SESSION['staffNameTH'] . "' 
                            WHERE staffID = '" . $staffID . "' AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "' )";
                            //$_SESSION["staffNameTH"]
                        } else {

                            $sql_emp = "INSERT INTO tbemp(staffID,Late_Target,Late_Actual,Absence_Target, Absence_Actual,empDate,addDate,addBy) 
                            VALUES('" . $staffID . "','0', '" . $timestampLate . "','0', '" . $timestampAbsence . "', '" . $timestampDate . "', '" . date("Y-m-d") . "', 'test')";
                        }

                        $query_emp = $conn->query($sql_emp);

                        if ($query_timestamp && $query_emp) {
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

    if ($_POST["action"] == "fetch_edit_timestamp") {
        if (isset($_POST["id_timestamp_edit"])) {
            $stmt = "SELECT timestampID,tbtimestamp.staffID,timestampLate,timestampAbsence,staffNameTH
             FROM tbtimestamp LEFT OUTER JOIN tbstaff ON tbstaff.staffID = tbtimestamp.staffID WHERE timestampID = '" . $_POST["id_timestamp_edit"] . "' ";

            $query = $conn->query($stmt);
            $result = $query->fetch_array(MYSQLI_ASSOC);


            echo json_encode($result);
        }
    }

    if ($_POST["action"] == "edit_timestamp") {

        $stmt_emp = "SELECT * FROM tbtimestamp WHERE timestampID = '" . $_POST["txt_timestampID_e"] . "' ";
        $query_emp = $conn->query($stmt_emp);
        $result_emp = $query_emp->fetch_array(MYSQLI_ASSOC);
        $timestamp_date = $result_emp["timestampDate"];
        $month = date("m", strtotime($timestamp_date));
        $year = date("Y", strtotime($timestamp_date));

        $stmt_update_emp = " 
            UPDATE tbemp
            SET  
            Late_Actual = '" . $_POST['txt_timestampLate_e'] . "' ,
            Absence_Actual = '" . $_POST['txt_timestampAbsence_e'] . "' ,
            editDate = '" . date("Y-m-d") . "',
            editBy = '" . $_SESSION['staffNameTH'] . "'
        
            WHERE staffID = '" . $result_emp["staffID"] . "'  AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "' )";

        $query_update_emp = $conn->query($stmt_update_emp);

        $stmt = " 
		UPDATE tbtimestamp
		SET  
		timestampLate = '" . $_POST['txt_timestampLate_e'] . "',
		timestampAbsence = '" . $_POST['txt_timestampAbsence_e'] . "',
		editDate = '" . date("Y-m-d") . "',
		editBy = '" . $_SESSION['staffNameTH'] . "'
	
		WHERE timestampID = '" . $_POST['txt_timestampID_e'] . "' ";

        //$_SESSION["staffName"]

        $query = $conn->query($stmt);

        if ($query && $query_update_emp) {
            echo 'แก้ไขข้อมูล สำเร็จ ';
        } else {
            echo 'แก้ไขข้อมูล ไม่สำเร็จ!!';
        }
    }


    if ($_POST["action"] == "del_timestamp") {
        if (isset($_POST["id_timestamp_del"])) {

            $stmt_emp = "SELECT * FROM tbtimestamp WHERE timestampID = '" . $_POST["id_timestamp_del"] . "' ";
            $query_emp = $conn->query($stmt_emp);
            $result_emp = $query_emp->fetch_array(MYSQLI_ASSOC);
            $timestamp_date = $result_emp["timestampDate"];
            $month = date("m", strtotime($timestamp_date));
            $year = date("Y", strtotime($timestamp_date));

            $stmt_update_emp = " 
            UPDATE tbemp
            SET  
            Late_Actual = null ,
            Absence_Actual = null ,
            editDate = '" . date("Y-m-d") . "',
            editBy = '" . $_SESSION['staffNameTH'] . "'
        
            WHERE staffID = '" . $result_emp["staffID"] . "'  AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "' )";

            $query_update_emp = $conn->query($stmt_update_emp);

            $stmt = "DELETE FROM tbtimestamp WHERE timestampID = '" . $_POST["id_timestamp_del"] . "'";
            $query = $conn->query($stmt);

            if ($query) {
                echo 'ลบข้อมูลเรียบร้อย';
            } else {
                echo 'ไม่สามารถลบข้อมูลได้';
            }
        }
    }
}
