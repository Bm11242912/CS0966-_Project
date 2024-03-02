<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php

$allUser = getAllUser();
if (isset($_GET['delete'])) {
  deleteUser($_GET['delete']);
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
              <h5>จัดการข้อมูลผู้ใช้งาน</h5>
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
                <a href="edit_user.php" class="btn btn-success" style="float: right;margin-right: 25px;">เพิ่ม</a>
                <table class="table align-items-left" id="data_table">
                  <thead>
                    <tr>
                      <th>อีเมล</th>
                      <th>ชื่อ-นามสกุล</th>
                      <th>ตำแหน่ง</th>
                      <th>คณะ</th>
                      <th>สาขา</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(empty($allUser)){ ?>
                      <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                    <?php }else{?>
                      <?php foreach($allUser as $data){ ?>
                        <tr>
                          <td><?php echo $data["email"];?></td>
                          <td><?php echo $data["firstname"];?> <?php echo $data["lastname"];?></td>
                          <td><?php echo $data["positions"];?></td>
                          <td><?php echo $data["faculties"];?></td>
                          <td><?php echo $data["majors"];?></td>
                          <td style="text-align: right;">
                            <a href="edit_user.php?id=<?php echo $data["id"];?>" class="btn btn-warning">แก้ไข</a>
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
            td2 = tr[i].getElementsByTagName("td")[2];
            td3 = tr[i].getElementsByTagName("td")[3];
            if (td || td1 || td2 || td3) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
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