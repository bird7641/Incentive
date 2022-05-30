<?php ## ส่วนที่ 1 ติดต่อฐานข้อมูลแบบ TIS620
include("../../backend/dblink.php");


## ส่วนที่ 5 ดึงข้อมูลจากตารางในฐานข้อมูล mySQL เพื่อนำไปแสดงในช่อง DropDown ช่องที่ 2
$strSQL2 = "select DISTINCT siteID,siteName from tbsite  WHERE siteStatus = 'Y' ORDER BY siteID";

$querySQL2 = $conn->query($strSQL2);

$site_arr = array();
while ($resultSQL2 = $querySQL2->fetch_array(MYSQLI_ASSOC)) {

    $siteID = $resultSQL2["siteID"];
    $siteName = $resultSQL2["siteName"];
    // $pfaname = $dp_list_Array["pfaName"];
    // $pfa_arr[] = array("pfaID" => $pfaid, "pfaName" => $pfaname);
    $site_arr[] = array("siteID" => $siteID, "siteName" => $siteName);
}

// encoding array to json format
echo json_encode($site_arr);
