<?php

//fetch.php
//session_start();
include("../../backend/dblink.php");

/* $hidden_list_ap_search = $_POST["hidden_list_ap_search"];

$hidden_list_TP_search = $_POST["hidden_list_TP_search"];
 */
$stmt = "SELECT 
staffID,
tbstaff.siteID,
staffNameTH,
staffPosition,
staffSection,
staffProfitCenter,
staffGroup,
staffStatus,
staffStartWorkDate,
staffEndWorkDate,
staffLevel,
tbstaff.addDate,
tbstaff.addBy,
tbstaff.editDate,
tbstaff.editBy,
siteName
FROM tbstaff LEFT OUTER JOIN tbsite ON tbstaff.siteID = tbsite.siteID WHERE staffStatus != 'N' ";

$stmt = $stmt . "ORDER BY tbstaff.staffID ASC";
//$stmt = $stmt . "WHERE partnerStatus = 'Y' AND partnerName LIKE '%".$_POST['query']."%' ";

$query = $conn->query($stmt);

?>


<table id="table_staff_fetch" class=" table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
    <thead>
        <tr>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                รหัสพนักงาน
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ชื่อ-สกุล
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ตำแหน่ง
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                โครงการ
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
                <td class="text-center"><?php echo $result["staffID"]; ?></td>
                <td class="text-center"><?php echo $result["staffNameTH"]; ?></td>
                <td class="text-center"><?php echo $result["staffPosition"]; ?></td>
                <td class="text-center"><?php echo $result["siteName"]; ?></td>
                <td class="text-center">
                    <?php
                    if ($result['staffLevel'] == 'Admin' || $result['staffLevel'] == 'User') {
                    ?>

                        <button type="button" class="btn btn-success btn-sm btn-round btn-icon btn-sm edit_staff" data-toggle="modal" data-target="#modal_edit_staff" name="edit_staff" title="แก้ไขข้อมูล staff" id_staff_edit="<?php echo $result["staffID"]; ?>">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm btn-round btn-icon btn-sm del_staff" name="del_staff" title="ลบข้อมูล staff" id_staff_del="<?php echo $result["staffID"]; ?>">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>

                        <?php
                    } elseif ($result['staffLevel'] == 'SuperAdmin') {
                        if ($result["staffID"] == $_SESSION['staffID']) {
                        ?>
                            <button type="button" class="btn btn-success btn-sm btn-round btn-icon btn-sm edit_staff" data-toggle="modal" data-target="#modal_edit_staff" name="edit_staff" title="แก้ไขข้อมูล staff" id_staff_edit="<?php echo $result["staffID"]; ?>">
                                <i class="now-ui-icons ui-2_settings-90"></i>
                            </button>
                    <?php
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function() {

        var table = $('#table_staff_fetch').DataTable({
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