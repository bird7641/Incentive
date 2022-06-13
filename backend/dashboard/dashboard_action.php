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


    if ($_POST["action"] == "fetch_dashboard") {

        $stmt = "SELECT
            tbstaff.staffID,
            tbstaff.staffNameTH,
            tbsite.siteName,
            tbcommu.commuActual AS CommuActual,
        IF
            ( tbcommu.commuActual >= 4, 1, 0 ) AS ResultActual,
            tbtimestamp.timestampLate AS LateActual,
        IF
            ( tbtimestamp.timestampLate > 0, 0, 1 ) AS ResultLate,
            tbtimestamp.timestampAbsence AS AbsenceActual,
        IF
            ( tbtimestamp.timestampAbsence > 0, 0, 1 ) AS ResultAbsence,
            ( SELECT COUNT( staffID ) AS ComplantCount FROM tbcomplaint WHERE staffID = tbstaff.staffID ) AS ComplantActual,
        IF
            ( ( SELECT COUNT( staffID ) AS ComplantCount FROM tbcomplaint WHERE staffID = tbstaff.staffID ) > 0, 0, 1 ) AS ResultComplant,
            ( SELECT COUNT( staffID ) AS WarnCount FROM tbwarning WHERE staffID = tbstaff.staffID ) AS WarnActual,
        IF
            ( ( SELECT COUNT( staffID ) AS WarnCount FROM tbwarning WHERE staffID = tbstaff.staffID ) > 0, 0, 1 ) AS ResultWarn
        FROM
            tbstaff
            LEFT OUTER JOIN tbsite ON tbsite.siteID = tbstaff.siteID
            LEFT OUTER JOIN tbcommu ON tbcommu.staffID = tbstaff.staffID
            LEFT OUTER JOIN tbtimestamp ON tbtimestamp.staffID = tbstaff.staffID 
             WHERE tbstaff.staffID = '".$_SESSION["staffID"]."' ";

        $query = $conn->query($stmt);
        $result = $query->fetch_array(MYSQLI_ASSOC);


        echo json_encode($result);
    }
}
