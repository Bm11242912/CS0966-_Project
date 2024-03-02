<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php
$allStrategy = getAllStrategy();
$currentProject = getCurrentProject($_GET["id"]);
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveProject($_POST["users_id"],$_POST["strategies_id"],$_POST["project_id"],$_POST["project_name"],$_POST["responsible"],$_POST["coordination"],$_POST["budget"],$_POST["date_create"],$_POST["agency"],$_POST["course"]);
  }else{
    editProject($_POST["id"],$_POST["users_id"],$_POST["strategies_id"],$_POST["project_id"],$_POST["project_name"],$_POST["responsible"],$_POST["coordination"],$_POST["budget"],$_POST["date_create"],$_POST["agency"],$_POST["course"]);
  }

}
if($_GET["id"] == ""){
  $txtHead = "เพิ่ม โครงการ";
}else{
  $txtHead = "แก้ไข โครงการ";
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


      <form name="prduct_detail_form" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="id" value="<?php echo $currentProject["id"];?>">
        <input type="hidden" class="form-control" name="users_id" value="<?php echo $_SESSION["id"];?>">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title"><?php echo $txtHead;?></h4>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">ยุทธศาสตร์</label>
                      <select name="strategies_id" class="form-control border-input" id="strategies_id">
                        <option value="">-- โปรดเลือก --</option>
                        <?php foreach($allStrategy as $data){ ?>
                          <?php $selected = "";
                          if($currentProject['strategies_id'] == $data['id']){
                            $selected = " selected";

                          }
                          ?>
                          <option value="<?php echo $data['id']?>" <?php echo $selected;?>><?php echo $data['strategy_name']?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">รหัสโครงการ</label>
                      <input type="text" class="form-control" name="project_id" value="<?php echo $currentProject["project_id"];?>" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">ชื่อโครงการ</label>
                      <input type="text" class="form-control" name="project_name" value="<?php echo $currentProject["project_name"];?>" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">ผู้รับผิดชอบ</label>
                      <input type="text" class="form-control" name="responsible" value="<?php echo $currentProject["responsible"];?>" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">เจ้าหน้าที่ประสานงาน</label>
                      <input type="text" class="form-control" name="coordination" value="<?php echo $currentProject["coordination"];?>" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">หน่วยงาน</label>
                      <input type="text" class="form-control" name="agency" value="<?php echo $currentProject["agency"];?>" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">หลักสูตร</label>
                      <input type="text" class="form-control" name="course" value="<?php echo $currentProject["course"];?>" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">งบประมาณ</label>
                      <input type="text" class="form-control" name="budget" value="<?php echo $currentProject["budget"];?>" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">วันที่</label>
                      <input type="text" class="form-control" name="date_create" id="date_create" value="<?php echo formatDateFull($currentProject["date_create"]);?>" required>
                    </div>
                  </div>
                </div>
                

                <div align="center">
                  <input type="submit" name="submit" class="btn btn-success btn-round" value="บันทึก">
                  <input type="button" name="button" class="btn btn-danger btn-round" onClick="javascript:history.go(-1)" value="ย้อนกลับ">

                </div>
                <div class="clearfix"></div>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile">
              <img class="img-fluid shadow border-radius-xl" src="assets/img/icons/paper-icon.png" />
            </div>
          </div>
        </div>
      </form>


      <?php
      require_once("footer.php");
      ?>

      <script>
    
      $('#date_create').datetimepicker({
        lang:'th',
        timepicker:false,
        format:'d/m/Y'
      });
    </script>

    </div>
  </main>
  
</body>

</html>