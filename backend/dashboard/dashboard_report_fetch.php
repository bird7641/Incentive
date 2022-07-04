<?php

//fetch.php
//session_start();
include("../../backend/dblink.php");

$textsearch = $_POST["textsearch"];
/*
$hidden_list_TP_search = $_POST["hidden_list_TP_search"];
 */
$stmt = "SELECT * FROM v_emp  ";
if ($textsearch != "") {
    $stmt = $stmt . "WHERE staffID LIKE '%" . $textsearch . "%' OR staffNameTH LIKE '%" . $textsearch . "%' OR siteName LIKE '%" . $textsearch . "%'";
}

$stmt = $stmt . "ORDER BY staffID ASC";
//$stmt = $stmt . "WHERE partnerStatus = 'Y' AND partnerName LIKE '%".$_POST['query']."%' ";

$query = $conn->query($stmt);

?>


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
                <td class="text-center"><?php echo $result["ResultActual"]; ?></td>
                <td class="text-center"><?php echo $result["ResultLate"]; ?></td>
                <td class="text-center"><?php echo $result["ResultAbsence"]; ?></td>
                <td class="text-center"><?php echo $result["ResultComplant"]; ?></td>
                <td class="text-center"><?php echo $result["ResultWarn"]; ?></td>
                <td class="text-center"><?php echo $result["ResultActual"] + $result["ResultLate"] + $result["ResultAbsence"] + $result["ResultComplant"] + $result["ResultWarn"]; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


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