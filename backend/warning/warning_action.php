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
    if ($_POST["action"] == "upload_file_warning") {

        $inputFileName = $_FILES['file_warning']['tmp_name'];

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
            $warnDetail_head = $sheetData[0][1];
            /*   $warn1_head = $sheetData[0][2];
            $warn2_head = $sheetData[0][3];
            $warn3_head = $sheetData[0][4];
            $warn4_head = $sheetData[0][5]; */
            $warnDate_head = $sheetData[0][2];


            if ($staffID_head == 'staffID' && $warnDetail_head == 'warnDetail' && $warnDate_head == 'warnDate') {
                for ($i = 1; $i < count($sheetData); $i++) {

                    $staffID = $sheetData[$i][0];
                    $warnDetail = $sheetData[$i][1];
                    /*  $warn1 = $sheetData[$i][2];
                    $warn2 = $sheetData[$i][3];
                    $warn3 = $sheetData[$i][4];
                    $warn4 = $sheetData[$i][5]; */
                    $warnDate = $sheetData[$i][2];


                    $month = date("m", strtotime($warnDate));
                    $year = date("Y", strtotime($warnDate));
                    /*   $sql_check = "SELECT COUNT(staffID) AS countID FROM tbwarning WHERE staffID = '" . $staffID . "' AND ( MONTH(warnDate) = '" . $month . "' AND YEAR(warnDate) = '" . $year . "' )";
                    $query_check = $conn->query($sql_check);
                    $result_check = $query_check->fetch_array(MYSQLI_ASSOC);

                    $countID =  $result_check['countID']; */

                    /*  if ((int)$countID != 0) {
                        echo "รหัสพนักงาน : " . $staffID . " | เดือน : " . $month . " | ปี : " . $year . " มีอยู่ในระบบแล้ว \n";
                    } else { */

                    $sql = "INSERT INTO tbwarning(staffID,
                        warnDetail,
                        warnDate,
                        addDate,
                        addBy
                        ) VALUES('" . $staffID . "', '" . $warnDetail . "','" . $warnDate . "', '" . date("Y-m-d") . "', '" . $_SESSION['staffNameTH'] . "')";

                    $query_timestamp = $conn->query($sql);


                    /*   if ($warn1 == 1) {
                            $warn_emp = 1;
                        } elseif ($warn2 == 1) {
                            $warn_emp = 1;
                        } elseif ($warn3 == 1) {
                            $warn_emp = 1;
                        } elseif ($warn4 == 1) {
                            $warn_emp = 1;
                        } else {
                            $warn_emp = 0;
                        }

                            $sql_check_emp = "SELECT COUNT(staffID) AS countemp FROM tbemp WHERE staffID = '" . $staffID . "' AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "' )";
                        $query_check_emp = $conn->query($sql_check_emp);
                        $result_check_emp = $query_check_emp->fetch_array(MYSQLI_ASSOC);

                        $countemp =  $result_check_emp['countemp'];
                        if ((int)$countemp != 0) {
                            $sql_emp = "
                            UPDATE tbemp 
                            SET 
                            Warning = '".$warn_emp."', 
                            empDate = '" . $warnDate . "',
                            editDate = '" . date("Y-m-d") . "',
				            editBy = '" . $_SESSION['staffNameTH'] . "' 
                            WHERE staffID = '" . $staffID . "' AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "')";
                            //$_SESSION["staffNameTH"]
                        } else {

                            $sql_emp = "INSERT INTO tbemp(staffID,Warning,empDate,addDate,addBy) 
                            VALUES('" . $staffID . "','".$warn_emp."', '" . $warnDate . "', '" . date("Y-m-d") . "', '" . $_SESSION['staffNameTH'] . "')";
                        }

                        $query_emp = $conn->query($sql_emp); */

                    if ($query_timestamp) {
                    } else {
                        echo "Error";
                    }
                    //}
                }
                echo "บันทึกข้อมูล สำเร็จ";
            } else {
                echo "File ใช้นี้ไม่ได้";
            }
        } else {
            echo "File นี้ไม่มีข้อมูล";
        }
    }

    if ($_POST["action"] == "fetch_edit_warning") {
        if (isset($_POST["id_warning_edit"])) {
            $stmt = "SELECT warnID,
            tbwarning.staffID,
            warnDetail,
            warnDate,
            staffNameTH
             FROM tbwarning LEFT OUTER JOIN tbstaff ON tbstaff.staffID = tbwarning.staffID WHERE warnID = '" . $_POST["id_warning_edit"] . "' ";

            $query = $conn->query($stmt);
            $result = $query->fetch_array(MYSQLI_ASSOC);


            echo json_encode($result);
        }
    }

    if ($_POST["action"] == "edit_warning") {

        $stmt = " 
		UPDATE tbwarning
		SET  
		warnDetail = '" . $_POST['txt_warnDetail_e'] . "',
		editDate = '" . date("Y-m-d") . "',
		editBy = '" . $_SESSION['staffNameTH'] . "'
	
		WHERE warnID = '" . $_POST['txt_warnID_e'] . "' ";

        //$_SESSION["staffName"]

        $query = $conn->query($stmt);

        if ($query) {
            echo 'แก้ไขข้อมูล สำเร็จ ';
        } else {
            echo 'แก้ไขข้อมูล ไม่สำเร็จ!!';
        }
    }


    if ($_POST["action"] == "del_warning") {
        if (isset($_POST["id_warning_del"])) {
            $stmt = "DELETE FROM tbwarning WHERE warnID = '" . $_POST["id_warning_del"] . "'";
            $query = $conn->query($stmt);

            if ($query) {
                echo 'ลบข้อมูลเรียบร้อย';
            } else {
                echo 'ไม่สามารถลบข้อมูลได้';
            }
        }
    }
}
