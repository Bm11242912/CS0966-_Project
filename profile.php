<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php
$currentUser = getCurrentUser($_SESSION["id"]);
if(isset($_POST["submit"])){

  editProfile($_POST["id"],$_POST["email"],$_POST["password"],$_POST["firstname"],$_POST["lastname"],$_POST["telephone"],$_POST["positions"],$_POST["faculties"],$_POST["majors"],$_FILES["profile_img"]["name"]);

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
        <input type="hidden" class="form-control" name="id" value="<?php echo $currentUser["id"];?>">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">โปรไฟล์</h4>
              </div>

              <div class="card-body">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">อีเมล (E-mail)</label>
                      <input type="email" class="form-control" name="email" value="<?php echo $currentUser["email"];?>" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">รหัสผ่าน (Password)</label>
                      <input type="password" class="form-control" name="password" value="<?php echo $currentUser["password"];?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">ชื่อ</label>
                      <input type="text" class="form-control" name="firstname" value="<?php echo $currentUser["firstname"];?>" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">นามสกุล</label>
                      <input type="text" class="form-control" name="lastname" value="<?php echo $currentUser["lastname"];?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">หมายเลขโทรศัพท์</label>
                      <input type="text" class="form-control" name="telephone" value="<?php echo $currentUser["telephone"];?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">ตำแหน่ง</label>
                      <input type="text" class="form-control" name="positions" value="<?php echo $currentUser["positions"];?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">คณะ</label>
                      <input type="text" class="form-control" name="faculties" value="<?php echo $currentUser["faculties"];?>" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">สาขา</label>
                      <input type="text" class="form-control" name="majors" value="<?php echo $currentUser["majors"];?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">รูปโปรไฟล์</label>
                      <input type="file" class="form-control" name="profile_img" placeholder="รูปโปรไฟล์" >
                    </div>
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
          <div class="col-md-4">
            <div class="card card-profile">
              <?php if($currentUser["profile_img"] == ""){ ?>
                <img class="img-fluid shadow border-radius-xl" src="assets/img/icons/paper-icon.png" />
              <?php }else{ ?>
                <img class="img-fluid shadow border-radius-xl" src="images/user/<?php echo $currentUser["profile_img"];?>" />
              <?php } ?>
            </div>
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