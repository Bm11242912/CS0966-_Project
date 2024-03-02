<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php
$allStrategic = getAllStrategic();

if (isset($_GET['delete'])) {
  deleteStrategic($_GET['delete']);
}

?>
<body class="g-sidenav-show  bg-gray-100">
  <?php
  require_once("side_bar.php");
  ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <?php
    require_once("nav.php");
    ?>
    <div class="container-fluid py-4">


      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h5>จัดการยุทธศาสตร์</h5>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table style="width:100%">
                  <tr>
                    <td style="width:50%;"></td>
                    <td style="width:50%;">
                      <input type="text" name="search" id="search" class="form-control border-input" onKeyup="filterSearch();" placeholder="ค้นหา" style="width:95%;" >
                    </td>
                  </tr>

                </table>
                <br/>
                <a href="edit_strategic.php" class="btn btn-success" style="float: right;margin-right: 25px;">เพิ่ม</a>
                <table class="table align-items-left" id="data_table">
                  <thead>
                    <tr>
                      <th>ยุทธศาสตร์</th>
                      <th>ปี</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(empty($allStrategic)){ ?>
                      <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                    <?php }else{?>
                      <?php foreach($allStrategic as $data){ ?>
                        <tr>
                          <td><?php echo $data["strat_name"];?></td>
                          <td><?php echo $data["strat_year"];?></td>
                          <td style="text-align: right;">
                            <a href="edit_strategic.php?id=<?php echo $data["id"];?>" class="btn btn-warning">แก้ไข</a>
                            <a href="?delete=<?php echo $data['id'];?>" class="btn btn-danger" onClick="javascript: return confirm('ยืนยันการลบ');">ลบ</a>
                          </td>
                        </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        function filterSearch() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("search");
          filter = input.value.toUpperCase();
          table = document.getElementById("data_table");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            td1 = tr[i].getElementsByTagName("td")[1];
            if (td || td1) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
      </script>

      <?php
      require_once("footer.php");
      ?>

    </div>
  </main>

</body>

</html>