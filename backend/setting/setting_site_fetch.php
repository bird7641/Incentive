<!-- data table -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>



<!-- data table -->

<?php

//fetch.php
//session_start();
include("../../backend/dblink.php");

/* $hidden_list_ap_search = $_POST["hidden_list_ap_search"];

$hidden_list_TP_search = $_POST["hidden_list_TP_search"];
 */
$stmt = "SELECT 
siteID,
siteName,
siteType,
siteDeveloper,
siteUnit,
siteStatus



FROM tbsite  WHERE siteStatus != 'InActive' ";

$stmt = $stmt . "ORDER BY siteID ASC";
//$stmt = $stmt . "WHERE partnerStatus = 'Y' AND partnerName LIKE '%".$_POST['query']."%' ";

$query = $conn->query($stmt);

?>


<table id="table_site_fetch" class=" table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
    <thead>
        <tr>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                รหัสโครงการ
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                โครงการ
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                ประเภท
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                Developer
            </th>
            <th class="text-center" style="vertical-align:middle;font-size: 16px;">
                Unit
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
                <td class="text-center"><?php echo $result["siteID"]; ?></td>
                <td class="text-center"><?php echo $result["siteName"]; ?></td>
                <td class="text-center"><?php echo $result["siteType"]; ?></td>
                <td class="text-center"><?php echo $result["siteDeveloper"]; ?></td>
                <td class="text-center"><?php echo $result["siteUnit"]; ?></td>

                <td class="text-center">
                    <button type="button" class="btn btn-success btn-sm btn-round btn-icon btn-sm edit_site" data-toggle="modal" data-target="#modal_edit_site" name="edit_site" title="แก้ไขข้อมูล site" id_site_edit="<?php echo $result["siteID"]; ?>">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-round btn-icon btn-sm del_site" name="del_site" title="ลบข้อมูล site" id_site_del="<?php echo $result["siteID"]; ?>">
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

        var table = $('#table_site_fetch').DataTable({
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