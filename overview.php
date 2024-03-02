<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>

<?php 
$yThai = date("Y")+543;
$allProject = getAllProjectOverview($yThai);
if(isset($_POST["search"])){
  $yThai = $_POST["txtYear"];
  $textSearch = $_POST["txtSearch"];
  $allProject = getAllProjectOverviewSearch($yThai,$textSearch);
}
?>
<style>
td>div {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  width: 190px
}
</style>

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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">ข้อมูลภาพรวมโครงการ</h4>
            </div>

            <div class="card-body">
              <div class="row">
                <form name="prduct_detail_form" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" name="txtYear" id="txtYear" class="form-control border-input" placeholder="ปีงบประมาณ">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" name="txtSearch" id="txtSearch" class="form-control border-input" placeholder="ค้นหาทั้งหมด">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group" style="text-align: center;">
                      <input type="submit" name="search" class="btn btn-success " value="ค้นหา">
                    </div>
                  </div>
                </div>
              </form>
                <br/>
                <div class="col-md-12">
                  <div class="form-group">
                    <table class="table align-items-left" id="data_table" style="width:100%;">
                      <thead>
                        <tr>
                          <th>ยุทธศาสตร์</th>
                          <th>หน่วยงาน</th>
                          <th >โครงการ</th>
                          <th>ผู้รับผิดชอบ</th>
                          <th >เจ้าหน้าที่ประสานงาน</th>
                          <th>สถานะ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(empty($allProject)){ ?>
                        <?php }else{?>
                          <?php foreach($allProject as $data){ ?>
                            <?php $checkActivitySuccess = getCheckActivitySuccess($data["id"]);?>
                            <tr>
                              <td style="width:25%;"><div title="<?php echo $data["strat_name"];?>"><?php echo $data["strat_name"];?></div></td>
                              <td style="width:10%;"> <div title="<?php echo $data["agency"];?>"> <?php echo $data["agency"];?></div></td>
                              <td style="width:20%;"><div title="<?php echo $data["project_name"];?>"><a href="detail_activity.php?id=<?php echo $data["aid"];?>"><?php echo $data["project_name"];?></a></div></td>
                              <td style="width:15%;"><div title="<?php echo $data["responsible"];?>"><?php echo $data["responsible"];?></div></td>
                              <td style="width:20%;"><div title="<?php echo $data["coordination"];?>"><?php echo $data["coordination"];?> </div></td>
                              <?php if($checkActivitySuccess["numCount"] == 0){?>
                                <td style="width:10%;"><span style="color:green">เรียบร้อย</span></td>
                              <?php }else{ ?>
                                <td style="width:10%;"><span style="color:red">กำลังดำเนินการ</span></td>
                              <?php } ?>
                            </tr>
                          <?php } ?>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

            </div>
          </div>
        </div>


      </div>


      <?php
      require_once("footer.php");
      ?>

      <script>
        function filterSearch() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("txtSearch");
          filter = input.value.toUpperCase();
          table = document.getElementById("data_table");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            td1 = tr[i].getElementsByTagName("td")[1];
            td2 = tr[i].getElementsByTagName("td")[2];
            td3 = tr[i].getElementsByTagName("td")[3];
            td4 = tr[i].getElementsByTagName("td")[4];
            if (td || td1 || td2 || td3 || td4) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1 || td4.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
      </script>

    </div>
  </main>
  
</body>

</html>