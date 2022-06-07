<?php

//fetch.php
//session_start();
include("../../backend/dblink.php");

/* $hidden_list_ap_search = $_POST["hidden_list_ap_search"];

$hidden_list_TP_search = $_POST["hidden_list_TP_search"];
 */
$stmt = "SELECT timestampID,tbtimestamp.staffID,timestampLate,timestampAbsence,timestampDate,staffNameTH
FROM tbtimestamp LEFT OUTER JOIN tbstaff ON tbstaff.staffID = tbtimestamp.staffID ";

$stmt = $stmt . "ORDER BY tbstaff.staffID ASC";
//$stmt = $stmt . "WHERE partnerStatus = 'Y' AND partnerName LIKE '%".$_POST['query']."%' ";

$query = $conn->query($stmt);

?>


<table id="table_timestamp_fetch"  class=" table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
    <thead>
        <tr>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ชื่อ-สกุล
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                จำนวนเข้างานสาย
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                จำนวนขาดงาน
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                วันที่ข้อมูล
            </th>


            <th class="text-center" style="vertical-align:middle;font-size: 16px;">

            </th>
        </tr>
    </thead>

    <tbody style="vertical-align:middle;">

        <?php
        while ($result = $query->fetch_array(MYSQLI_ASSOC)) {
        ?>
            <tr>
                <td class="text-center"><?php echo $result["staffNameTH"]; ?></td>
                <td class="text-center"><?php echo $result["timestampLate"]; ?></td>
                <td class="text-center"><?php echo $result["timestampAbsence"]; ?></td>
                <td class="text-center"><?php echo $result["timestampDate"]; ?></td>

                <td class="text-center">
                    <button type="button" class="btn btn-success btn-sm btn-round btn-icon btn-sm edit_timestamp" data-toggle="modal" data-target="#modal_edit_timestamp" name="edit_timestamp" title="แก้ไขข้อมูล timestamp" id_timestamp_edit="<?php echo $result["timestampID"]; ?>">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-round btn-icon btn-sm del_timestamp" name="del_timestamp" title="ลบข้อมูล timestamp" id_timestamp_del="<?php echo $result["timestampID"]; ?>">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>

                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function() {
        
        var table = $('#table_timestamp_fetch').DataTable({
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