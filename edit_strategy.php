<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php
$allStrategic = getAllStrategic();
$currentStrategy = getCurrentStrategy($_GET["id"]);
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveStrategy($_POST["strategics_id"],$_POST["strategy_name"]);
  }else{
    editStrategy($_POST["id"],$_POST["strategics_id"],$_POST["strategy_name"]);
  }
}
if($_GET["id"] == ""){
  $txtHead = "เพิ่ม กลยุทธ์";
}else{
  $txtHead = "แก้ไข กลยุทธ์";
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
        <input type="hidden" class="form-control" name="id" value="<?php echo $currentStrategy["siid"];?>">
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
                      <select name="strategics_id" class="form-control border-input" id="strategics_id">
                        <option value="">-- โปรดเลือก --</option>
                        <?php foreach($allStrategic as $data){ ?>
                          <?php $selected = "";
                          if($currentStrategy['strategics_id'] == $data['id']){
                            $selected = " selected";

                          }
                          ?>
                          <option value="<?php echo $data['id']?>" <?php echo $selected;?>><?php echo $data['strat_name']?> ปี (<?php echo $data['strat_year']?>)</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">กลยุทธ์</label>
                      <input type="text" class="form-control" name="strategy_name" value="<?php echo $currentStrategy["strategy_name"];?>" required>
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

    </div>
  </main>
  
</body>

</html>