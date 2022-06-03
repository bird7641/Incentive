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
    if ($_POST["action"] == "upload_file_complaint") {

        $inputFileName = $_FILES['file_complaint']['tmp_name'];

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
            $complaintType_head = $sheetData[0][1];
            $complaintDetail_head = $sheetData[0][2];
            $complaintSource_head = $sheetData[0][3];
            $complaintDate_head = $sheetData[0][4];



            if ($staffID_head == 'staffID' && $complaintType_head == 'complaintType' && $complaintDetail_head == 'complaintDetail' && $complaintSource_head == 'complaintSource' && $complaintDate_head == 'complaintDate') {
                for ($i = 1; $i < count($sheetData); $i++) {

                    $staffID = $sheetData[$i][0];
                    $complaintType = $sheetData[$i][1];
                    $complaintDetail = $sheetData[$i][2];
                    $complaintSource = $sheetData[$i][3];
                    $complaintDate = $sheetData[$i][4];


                    $month = date("m", strtotime($complaintDate));
                    $year = date("Y", strtotime($complaintDate));
                 /*    
                    $sql_check = "SELECT COUNT(staffID) AS countID FROM tbcomplaint WHERE staffID = '" . $staffID . "' AND ( MONTH(complaintDate) = '" . $month . "' AND YEAR(complaintDate) = '" . $year . "' )";
                    $query_check = $conn->query($sql_check);
                    $result_check = $query_check->fetch_array(MYSQLI_ASSOC);

                    $countID =  $result_check['countID']; */

              

                        $sql = "INSERT INTO tbcomplaint(
                            staffID,
                            complaintType,
                            complaintDetail,
                            complaintSource,
                            complaintDate,
                        addDate,
                        addBy
                        ) VALUES('" . $staffID . "', '" . $complaintType . "', '" . $complaintDetail . "', '" . $complaintSource . "', '" . $complaintDate . "', '" . date("Y-m-d") . "', '" . $_SESSION['staffNameTH'] . "')";

                        $query_complaint = $conn->query($sql);

                        /*    $sql_check_emp = "SELECT COUNT(staffID) AS countemp FROM tbemp WHERE staffID = '" . $staffID . "' AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "' )";
                        $query_check_emp = $conn->query($sql_check_emp);
                        $result_check_emp = $query_check_emp->fetch_array(MYSQLI_ASSOC);

                        $countemp =  $result_check_emp['countemp'];
                        if ((int)$countemp != 0) {
                            $sql_emp = "
                            UPDATE tbemp 
                            SET 
                            CUMMU_Target = '4', 
                            CUMMU_Actual = '" . $complaintActual . "', 
                            empDate = '" . $complaintDate . "',
                            editDate = '" . date("Y-m-d") . "',
				            editBy = '" . $_SESSION['staffNameTH'] . "'
                            WHERE staffID = '" . $staffID . "' AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "' )";
                            //$_SESSION["staffNameTH"]
                        } else {

                            $sql_emp = "INSERT INTO tbemp(staffID,CUMMU_Target,CUMMU_Actual,empDate,addDate,addBy) 
                            VALUES('" . $staffID . "','4', '" . $complaintActual . "', '" . $complaintDate . "', '" . date("Y-m-d") . "', '" . $_SESSION['staffNameTH'] . "')";
                        }

                        $query_emp = $conn->query($sql_emp); */

                        if ($query_complaint) {
                        } else {
                            echo "Error";
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

    if ($_POST["action"] == "fetch_edit_complaint") {
        if (isset($_POST["id_complaint_edit"])) {
            $stmt = "SELECT complaintID,tbcomplaint.staffID,complaintType,complaintDetail,complaintSource,complaintDate,staffNameTH
             FROM tbcomplaint LEFT OUTER JOIN tbstaff ON tbstaff.staffID = tbcomplaint.staffID WHERE complaintID = '" . $_POST["id_complaint_edit"] . "' ";

            $query = $conn->query($stmt);
            $result = $query->fetch_array(MYSQLI_ASSOC);


            echo json_encode($result);
        }
    }

    if ($_POST["action"] == "edit_complaint") {

        $stmt = " 
		UPDATE tbcomplaint
		SET  
		complaintType = '" .$_POST["txt_complaintType_e"]. "',
        complaintDetail = '" .$_POST["txt_complaintDetail_e"]. "',
        complaintSource = '" .$_POST["txt_complaintSource_e"]. "',
		editDate = '" . date("Y-m-d") . "',
		editBy = '" . $_SESSION['staffNameTH'] . "'
	
		WHERE complaintID = '" . $_POST['txt_complaintID_e'] . "' ";

        //$_SESSION["staffName"]

        $query = $conn->query($stmt);

        if ($query) {
            echo 'แก้ไขข้อมูล สำเร็จ ';
        } else {
            echo 'แก้ไขข้อมูล ไม่สำเร็จ!!';
        }
    }


    if ($_POST["action"] == "del_complaint") {
        if (isset($_POST["id_complaint_del"])) {
            /*  $stmt_emp = "SELECT * FROM tbcomplaint WHERE complaintID = '" . $_POST["id_complaint_del"] . "' ";
            $query_emp = $conn->query($stmt_emp);
            $result_emp = $query_emp->fetch_array(MYSQLI_ASSOC);
            $complaint_date = $result_emp["complaintDate"];
            $month = date("m", strtotime($complaint_date));
            $year = date("Y", strtotime($complaint_date));

            $stmt_update_emp = " 
            UPDATE tbemp
            SET  
            CUMMU_Actual = null ,
            editDate = '" . date("Y-m-d") . "',
            editBy = '" . $_SESSION['staffNameTH'] . "'
        
            WHERE staffID = '" . $result_emp["staffID"] . "'  AND ( MONTH(empDate) = '" . $month . "' AND YEAR(empDate) = '" . $year . "' )";

            //$_SESSION["staffName"]

            $query_update_emp = $conn->query($stmt_update_emp); */


            $stmt = "DELETE FROM tbcomplaint WHERE complaintID = '" . $_POST["id_complaint_del"] . "'";
            $query = $conn->query($stmt);

            if ($query) {
                echo 'ลบข้อมูลเรียบร้อย';
            } else {
                echo 'ไม่สามารถลบข้อมูลได้';
            }
        }
    }
}
