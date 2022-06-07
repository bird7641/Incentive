

<?php

//fetch.php
//session_start();
include("../../backend/dblink.php");

/* $hidden_list_ap_search = $_POST["hidden_list_ap_search"];

$hidden_list_TP_search = $_POST["hidden_list_TP_search"];
 */
$stmt = "SELECT
complaintID,
complaintType,
complaintDetail,
complaintSource,
complaintDate,
staffNameTH 
FROM
tbcomplaint
LEFT OUTER JOIN tbstaff ON tbstaff.staffID = tbcomplaint.staffID ";

$stmt = $stmt . "ORDER BY tbstaff.staffID ASC";
//$stmt = $stmt . "WHERE partnerStatus = 'Y' AND partnerName LIKE '%".$_POST['query']."%' ";

$query = $conn->query($stmt);

?>


<table id="table_complaint_fetch" class=" table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
    <thead>
        <tr>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;;width:10%">
                ชื่อ-สกุล
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;;width:10%">
                ประเภทเรื่อง
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;;width:40%">
                รายละเอียด
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;;width:10%">
                แหล่งที่มา
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;;width:10%">
                วันที่ข้อมูล
            </th>


            <th class="text-center" style="vertical-align:middle;font-size: 16px;width:10%">

            </th>
        </tr>
    </thead>

    <tbody style="vertical-align:middle;">

        <?php
        while ($result = $query->fetch_array(MYSQLI_ASSOC)) {
        ?>
            <tr>
                <td class="text-center"><?php echo $result["staffNameTH"]; ?></td>
                <td class="text-center"><?php echo $result["complaintType"]; ?></td>
                <td class="text-left"><?php echo $result["complaintDetail"]; ?></td>
                <td class="text-center"><?php echo $result["complaintSource"]; ?></td>
                <td class="text-center"><?php echo $result["complaintDate"]; ?></td>

                <td class="text-center">
                    <button type="button" class="btn btn-success btn-sm btn-round btn-icon btn-sm edit_complaint" data-toggle="modal" data-target="#modal_edit_complaint" name="edit_complaint" title="แก้ไขข้อมูล com" id_complaint_edit="<?php echo $result["complaintID"]; ?>">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-round btn-icon btn-sm del_complaint" name="del_complaint" title="ลบข้อมูล com" id_complaint_del="<?php echo $result["complaintID"]; ?>">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>

                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<style>
  /*   table td {

        max-width: 120px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    table td:hover {
        overflow: visible;
    } */
</style>


<script type="text/javascript">
    $(document).ready(function() {

        var table = $('#table_complaint_fetch').DataTable({
           
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