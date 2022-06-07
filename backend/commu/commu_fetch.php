

<?php

//fetch.php
//session_start();
include("../../backend/dblink.php");

/* $hidden_list_ap_search = $_POST["hidden_list_ap_search"];

$hidden_list_TP_search = $_POST["hidden_list_TP_search"];
 */
$stmt = "SELECT
commuID,
commuActual,
commuDate,
staffNameTH 
FROM
tbcommu
LEFT OUTER JOIN tbstaff ON tbstaff.staffID = tbcommu.staffID ";

$stmt = $stmt . "ORDER BY tbstaff.staffID ASC";
//$stmt = $stmt . "WHERE partnerStatus = 'Y' AND partnerName LIKE '%".$_POST['query']."%' ";

$query = $conn->query($stmt);

?>


<table id="table_commu_fetch"  class=" table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
    <thead>
        <tr>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ชื่อ-สกุล
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                Commu Actual
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
                <td class="text-center"><?php echo $result["commuActual"]; ?></td>
                <td class="text-center"><?php echo $result["commuDate"]; ?></td>

                <td class="text-center">
                    <button type="button" class="btn btn-success btn-sm btn-round btn-icon btn-sm edit_commu" data-toggle="modal" data-target="#modal_edit_commu" name="edit_commu" title="แก้ไขข้อมูล commu" id_commu_edit="<?php echo $result["commuID"]; ?>">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-round btn-icon btn-sm del_commu" name="del_commu" title="ลบข้อมูล commu" id_commu_del="<?php echo $result["commuID"]; ?>">
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
        
        var table = $('#table_commu_fetch').DataTable({
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