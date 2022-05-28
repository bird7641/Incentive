<?php
include '../../assets/phpspreadsheet/vendor/autoload.php';

$mysqli = new mysqli('localhost', 'root', '', 'incentive');
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
} else {
    echo "Connected";
}
$mysqli->set_charset("utf8");



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');



    $arr_file = explode('.', $_FILES['file']['name']);
    $extension = end($arr_file);

    if ('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }

    $spreadsheet = $reader->load($_FILES['file']['tmp_name']);

    $sheetData = $spreadsheet->getActiveSheet()->toArray();

    if (!empty($sheetData)) {
        for ($i = 1; $i < count($sheetData); $i++) {
            $timestampID = $sheetData[$i][0];
            $staffID = $sheetData[$i][1];
            $timestampLate = $sheetData[$i][2];
            $timestampAbsence = $sheetData[$i][3];
            $timestampDate = $sheetData[$i][4];
            $addDate = $sheetData[$i][5];
            $addBy = $sheetData[$i][6];
            $sql = "INSERT INTO tbtimestamp(timestampID, staffID,timestampLate,
                timestampAbsence,
                timestampDate,
                addDate,
                addBy
                ) VALUES('$timestampID', '$staffID', '$timestampLate', '$timestampAbsence', '$timestampAbsence', '$timestampDate', '$addDate', '$addBy')";

            $mysqli->query($sql);
            if ($mysqli) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }

else{
    echo "Error 1";
}
