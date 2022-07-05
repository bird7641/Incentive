<?php

//fetch.php
//session_start();
include("../../backend/dblink.php");
$textsearch_site = $_POST["textsearch_site"];

$stmt = "SELECT 
siteID,
siteName,
siteType,
siteDeveloper,
siteUnit,
siteStatus
FROM tbsite   ";

if ($textsearch_site != "") {
    $stmt = $stmt . "WHERE  (siteName LIKE '%" . $textsearch_site . "%' OR siteID LIKE '%" . $textsearch_site . "%' ) AND siteStatus != 'InActive' ";
} else {
    $stmt = $stmt . "WHERE  siteStatus != 'InActive' ";
}

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