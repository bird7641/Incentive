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
    if ($_POST["action"] == "upload_file_staff") {

        $inputFileName = $_FILES['file_staff']['tmp_name'];

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
            $siteID_head = $sheetData[0][1];
            $staffNameTH_head = $sheetData[0][2];
            $staffPosition_head = $sheetData[0][3];
            $staffSection_head = $sheetData[0][4];
            $staffProfitCenter_head = $sheetData[0][5];
            $staffGroup_head = $sheetData[0][6];
            $staffStatus_head = $sheetData[0][7];
            $staffStartWorkDate_head = $sheetData[0][8];
            $staffEndWorkDate_head = $sheetData[0][9];
            $staffLevel_head = $sheetData[0][10];


            if (
                $staffID_head == 'staffID' && $siteID_head == 'siteID' && $staffNameTH_head == 'staffNameTH' && $staffPosition_head == 'staffPosition' &&
                $staffSection_head == 'staffSection' && $staffProfitCenter_head == 'staffProfitCenter' && $staffGroup_head == 'staffGroup' && $staffStatus_head == 'staffStatus' &&
                $staffStartWorkDate_head == 'staffStartWorkDate' && $staffEndWorkDate_head == 'staffEndWorkDate' && $staffLevel_head == 'staffLevel'
            ) {
                for ($i = 1; $i < count($sheetData); $i++) {

                    $staffID = $sheetData[$i][0];
                    $siteID = $sheetData[$i][1];
                    $staffNameTH = $sheetData[$i][2];
                    $staffPosition = $sheetData[$i][3];
                    $staffSection = $sheetData[$i][4];
                    $staffProfitCenter = $sheetData[$i][5];
                    $staffGroup = $sheetData[$i][6];
                    $staffStatus = $sheetData[$i][7];
                    $staffStartWorkDate = $sheetData[$i][8];
                    $staffEndWorkDate = $sheetData[$i][9];
                    $staffLevel = $sheetData[$i][10];

                    $sql_check = "SELECT COUNT(staffID) AS countID FROM tbstaff WHERE staffID = '" . $staffID . "' ";
                    $query_check = $conn->query($sql_check);
                    $result_check = $query_check->fetch_array(MYSQLI_ASSOC);

                    $countID =  $result_check['countID'];

                    if ((int)$countID != 0) {
                        echo "รหัสพนักงาน : " . $staffID  . " มีอยู่ในระบบแล้ว \n";
                    } else {

                        $sql = "INSERT INTO tbstaff (
                            staffID,
                            siteID,
                            staffNameTH,
                            staffPosition,
                            staffSection,
                            staffProfitCenter,
                            staffGroup,
                            staffStatus,
                            staffStartWorkDate,
                            staffEndWorkDate,
                            staffPassword,
                            staffPasswordStatus,
                            staffLevel,
                            addDate,
                            addBy 
                        )
                        VALUES
                            ( '" . $staffID . "', '" . $siteID . "', '" . $staffNameTH . "', '" . $staffPosition . "', '" . $staffSection . "', '" . $staffProfitCenter . "', '" . $staffGroup . "', '" . $staffStatus . "', '" . $staffStartWorkDate . "', '" . $staffEndWorkDate . "','" . strtoupper(md5($staffID)) . "','N', '" . $staffLevel . "', '" . date("Y-m-d") . "', 'Test' )";

                        $query_staff = $conn->query($sql);

                        if ($query_staff) {
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

        $stmt = " 
		UPDATE tbtimestamp
		SET  
		timestampLate = '" . $_POST['txt_timestampLate_e'] . "',
		timestampAbsence = '" . $_POST['txt_timestampAbsence_e'] . "',
		editDate = '" . date("Y-m-d") . "',
		editBy = 'test'
	
		WHERE timestampID = '" . $_POST['txt_timestampID_e'] . "' ";

        //$_SESSION["staffName"]

        $query = $conn->query($stmt);

        if ($query) {
            echo 'แก้ไขข้อมูล สำเร็จ ';
        } else {
            echo 'แก้ไขข้อมูล ไม่สำเร็จ!!';
        }
    }


    if ($_POST["action"] == "del_staff") {
        if (isset($_POST["id_staff_del"])) {
            $stmt = "UPDATE tbstaff
            SET   staffStatus = 'N' WHERE staffID = '" . $_POST["id_staff_del"] . "'";
            $query = $conn->query($stmt);

            if ($query) {
                echo 'ลบข้อมูลเรียบร้อย';
            } else {
                echo 'ไม่สามารถลบข้อมูลได้';
            }
        }
    }
}
