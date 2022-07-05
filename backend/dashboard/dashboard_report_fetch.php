<?php

//fetch.php
//session_start();
include("../../backend/dblink.php");

$textsearch = $_POST["textsearch"];
$textsearchMonth = $_POST["textsearchMonth"];
$textsearchYear = $_POST["textsearchYear"];
/*
$hidden_list_TP_search = $_POST["hidden_list_TP_search"];
 */
$stmt = "SELECT * FROM v_emp  ";
if ($textsearch != "" && $textsearchMonth != "" && $textsearchYear != "") {
    $stmt = $stmt . "WHERE (staffID LIKE '%" . $textsearch . "%' OR staffNameTH LIKE '%" . $textsearch . "%' OR siteName LIKE '%" . $textsearch . "%') AND MONTH = '" . $textsearchMonth . "' AND YEAR = '" . $textsearchYear . "' ";
} elseif ($textsearch != "" && $textsearchMonth != "") {
    $stmt = $stmt . "WHERE (staffID LIKE '%" . $textsearch . "%' OR staffNameTH LIKE '%" . $textsearch . "%' OR siteName LIKE '%" . $textsearch . "%') AND MONTH = '" . $textsearchMonth . "'  ";
} elseif ($textsearch != ""  && $textsearchYear != "") {
    $stmt = $stmt . "WHERE (staffID LIKE '%" . $textsearch . "%' OR staffNameTH LIKE '%" . $textsearch . "%' OR siteName LIKE '%" . $textsearch . "%') AND YEAR = '" . $textsearchYear . "'  ";
} elseif ($textsearchMonth != "" && $textsearchYear != "") {
    $stmt = $stmt . "WHERE  MONTH = '" . $textsearchMonth . "' AND YEAR = '" . $textsearchYear . "'  ";
} elseif ($textsearch != "") {
    $stmt = $stmt . "WHERE  (staffID LIKE '%" . $textsearch . "%' OR staffNameTH LIKE '%" . $textsearch . "%' OR siteName LIKE '%" . $textsearch . "%')  ";
} elseif ($textsearchMonth != "") {
    $stmt = $stmt . "WHERE MONTH = '" . $textsearchMonth . "' ";
} elseif ($textsearchYear != "") {
    $stmt = $stmt . "WHERE YEAR = '" . $textsearchYear . "' ";
}

$stmt = $stmt . "ORDER BY Year DESC,Month DESC";
//$stmt = $stmt . "WHERE partnerStatus = 'Y' AND partnerName LIKE '%".$_POST['query']."%' ";

$query = $conn->query($stmt);

?>

<div class="row">
    <div class="col-md-6 text-left">

    </div>
    <div class="col-md-6 text-right">
        <a type="button" class="btn btn-round btn-success btn-sm " href="../backend/dashboard/excel/Excel_Report_Dashboard.xlsx?v=<?php echo date("YmdHis"); ?>" title="Report Dashboard">
            <img src="../frontend/img/icon/excel.PNG" width="30" height="30">
        </a>

    </div>


</div>
<table id="table_dashboard_report_fetch" class=" table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
    <thead>
        <tr>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                รหัสพนักงาน
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ชื่อ-สกุล
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ชื่อโครงการ
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ResultActual
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ResultLate
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ResultAbsence
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ResultComplant
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ResultWarn
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                Sum
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                Status
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                เดือน ปี
            </th>


        </tr>
    </thead>

    <tbody style="vertical-align:middle;">

        <?php
        while ($result = $query->fetch_array(MYSQLI_ASSOC)) {
        ?>
            <tr>
                <td class="text-center"><?php echo $result["staffID"]; ?></td>
                <td class="text-center"><?php echo $result["staffNameTH"]; ?></td>
                <td class="text-center"><?php echo $result["siteName"]; ?></td>
                <td class="text-center"><?php echo $result["ResultCommu"]; ?></td>
                <td class="text-center"><?php echo $result["ResultLate"]; ?></td>
                <td class="text-center"><?php echo $result["ResultAbsence"]; ?></td>
                <td class="text-center"><?php echo $result["ResultComplant"]; ?></td>
                <td class="text-center"><?php echo $result["ResultWarn"]; ?></td>
                <td class="text-center"><?php echo $result["ResultCommu"] + $result["ResultLate"] + $result["ResultAbsence"] + $result["ResultComplant"] + $result["ResultWarn"]; ?></td>
                <td class="text-center"><?php echo $result["ResultStatus"]; ?></td>
                <td class="text-center"><?php echo $result["Month"] . "-" . $result["Year"]; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
include '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//report_Asset_Active
$report_Asset_Active = new Spreadsheet();
$active_sheet = $report_Asset_Active->getActiveSheet();

$report_Asset_Active->getProperties()->setCreator("Maarten Balliauw")->setLastModifiedBy("Maarten Balliauw")->setTitle("Office 2007 XLSX Test Document")->setSubject("Office 2007 XLSX Test Document")->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")->setKeywords("office 2007 openxml php")->setCategory("Test result file");

$styleArray = ['borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => ['argb' => '000000'],],],]; //ตีกรอบแบบทุกช่อง

$styleArray2 = ['alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,],]; //ตัวอักษรอยู่ตรงกลาง

$active_sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
$active_sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
$active_sheet->getPageSetup()->setHorizontalCentered(true); // จัดกึ่งกลางข้อมูลตรงกลางในแนวนอน / true | false

$active_sheet->getColumnDimension('A')->setWidth(15); //ความกว้าง colum A
$active_sheet->getColumnDimension('B')->setWidth(20); //ความกว้าง colum B
$active_sheet->getColumnDimension('C')->setWidth(30); //ความกว้าง colum C
$active_sheet->getColumnDimension('D')->setWidth(30); //ความกว้าง colum D
$active_sheet->getColumnDimension('E')->setWidth(30); //ความกว้าง colum E



$active_sheet->getStyle('A')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง

$active_sheet->getStyle('A3:U3')->applyFromArray($styleArray);

$active_sheet->setCellValue('A3', 'DATE');
$active_sheet->getStyle('B3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('B3', 'EMPID');
$active_sheet->getStyle('C3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('C3', 'NAMETH');
$active_sheet->getStyle('D3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('D3', 'POSITIONNAME');
$active_sheet->getStyle('E3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('E3', 'SITE_NAME');
$active_sheet->getStyle('F3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('F3', 'CUMMU_Target');
$active_sheet->getStyle('G3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('G3', 'CUMMU_Actual');
$active_sheet->getStyle('H3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('H3', 'Late_Target');
$active_sheet->getStyle('I3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('I3', 'Late_Actual');
$active_sheet->getStyle('J3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('J3', 'Absence_Target');
$active_sheet->getStyle('K3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('K3', 'Absence_Actual');
$active_sheet->getStyle('L3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('L3', 'Complaint_Target');
$active_sheet->getStyle('M3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('M3', 'Complaint_Actual');
$active_sheet->getStyle('N3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('N3', 'Warning');
$active_sheet->getStyle('O3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('O3', 'ResultCommu');
$active_sheet->getStyle('P3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('P3', 'ResultLate');
$active_sheet->getStyle('Q3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('Q3', 'ResultAbsence');
$active_sheet->getStyle('R3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('R3', 'ResultComplant');
$active_sheet->getStyle('S3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('S3', 'ResultWarn');
$active_sheet->getStyle('T3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('T3', 'SUM');
$active_sheet->getStyle('U3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('U3', 'STATUS');

/* $active_sheet->getStyle('H3')->applyFromArray($styleArray2); //ตัวอักษรอยู่ตรงกลาง
$active_sheet->setCellValue('H3', 'ราคาทรัพย์สิน'); */


//$active_sheet->getStyle('U')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_00);

$count_report_Asset_Active = 4;

$query2 = $conn->query($stmt);
while ($result2 = $query2->fetch_array(MYSQLI_ASSOC)) {

    $active_sheet->getStyle('A' . $count_report_Asset_Active . ':U' . $count_report_Asset_Active)->applyFromArray($styleArray);

    $active_sheet->setCellValue('A' . $count_report_Asset_Active, $result2["Month"] . "-" . $result2["Year"]);
    $active_sheet->setCellValue('B' . $count_report_Asset_Active, $result2["staffID"]);
    $active_sheet->setCellValue('C' . $count_report_Asset_Active, $result2["staffNameTH"]);
    $active_sheet->setCellValue('D' . $count_report_Asset_Active, $result2["staffPosition"]);
    $active_sheet->setCellValue('E' . $count_report_Asset_Active, $result2["siteName"]);

    $active_sheet->setCellValue('F' . $count_report_Asset_Active, $result2["CUMMU_Target"]);
    $active_sheet->setCellValue('G' . $count_report_Asset_Active, $result2["CUMMU_Actual"]);
    $active_sheet->setCellValue('H' . $count_report_Asset_Active, $result2["Late_Target"]);
    $active_sheet->setCellValue('I' . $count_report_Asset_Active, $result2["Late_Actual"]);
    $active_sheet->setCellValue('J' . $count_report_Asset_Active, $result2["Absence_Target"]);
    $active_sheet->setCellValue('K' . $count_report_Asset_Active, $result2["Absence_Actual"]);
    $active_sheet->setCellValue('L' . $count_report_Asset_Active, 0);
    $active_sheet->setCellValue('M' . $count_report_Asset_Active, $result2["ComplantActual"]);
    $active_sheet->setCellValue('N' . $count_report_Asset_Active, $result2["WarnActual"]);
    $active_sheet->setCellValue('O' . $count_report_Asset_Active, $result2["ResultCommu"]);
    $active_sheet->setCellValue('P' . $count_report_Asset_Active, $result2["ResultLate"]);
    $active_sheet->setCellValue('Q' . $count_report_Asset_Active, $result2["ResultAbsence"]);
    $active_sheet->setCellValue('R' . $count_report_Asset_Active, $result2["ResultComplant"]);
    $active_sheet->setCellValue('S' . $count_report_Asset_Active, $result2["ResultWarn"]);
    $active_sheet->setCellValue('T' . $count_report_Asset_Active, $result2["ResultCommu"] + $result2["ResultLate"] + $result2["ResultAbsence"] + $result2["ResultComplant"] + $result2["ResultWarn"]);
    $active_sheet->setCellValue('U' . $count_report_Asset_Active, $result2["ResultStatus"]);


    $count_report_Asset_Active++;
}


$writer = new Xlsx($report_Asset_Active);
$file_export = "Excel_Report_Dashboard.xlsx";
$writer->save('excel/' . $file_export);
?>

<script type="text/javascript">
    $(document).ready(function() {

        var table = $('#table_dashboard_report_fetch').DataTable({
            "ordering": false,
            destroy: true,

            "scrollX": true,
            "language": {
                "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
                "paginate": {

                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                },
            },
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true,
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
        });
        $(".dataTables_filter").hide();
        $(".dataTables_length").hide();
    });
</script>