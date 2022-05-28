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
            $addDate_head = $sheetData[0][4];
            $addBy_head = $sheetData[0][5];
            if ($staffID_head == 'staffID' && $timestampLate_head == 'timestampLate' && $timestampAbsence_head == 'timestampAbsence' && $timestampDate_head == 'timestampDate' && $addDate_head == 'addDate' && $addBy_head == 'addBy') {
                for ($i = 1; $i < count($sheetData); $i++) {

                    $staffID = $sheetData[$i][0];
                    $timestampLate = $sheetData[$i][1];
                    $timestampAbsence = $sheetData[$i][2];
                    $timestampDate = $sheetData[$i][3];
                    $addDate = $sheetData[$i][4];
                    $addBy = $sheetData[$i][5];

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
                        ) VALUES('" . $staffID . "', '" . $timestampLate . "', '" . $timestampAbsence . "', '" . $timestampDate . "', '" . $addDate . "', '" . $addBy . "')";

                        $conn->query($sql);
                        if ($conn) {
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
}
