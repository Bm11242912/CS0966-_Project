<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
if(isset($_POST["submit"])){
  checkLogin($_POST["email"],$_POST["password"]);
}
?>
<body class="" style="margin-top: -27px;">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="#">
              ระบบจัดการฐานข้อมูลบนเว็บไซต์การบริหารงบประมาณ ของงานบริหารการเงินและงานแผนยุทธศาสตร์
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome</h3>
                  <p class="mb-0">กรุณากรอกอีเมลและรหัสผ่านในการเข้าใช้งาน </p>
                </div>
                <div class="card-body">
                  <form role="form" method="post" action="">
                    <label>อีเมล (E-mail)</label>
                    <div class="mb-3">
                      <input type="text" name="email" class="form-control" placeholder="E-mail" >
                    </div>
                    <label>รหัสผ่าน (Password)</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="mb-3">
                      <a href="register.php" style="float: right;">ลงทะเบียน</a>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="submit" class="btn bg-gradient-warning w-100 mt-4 mb-0">เข้าสู่ระบบ</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
              วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น
          </p>
        </div>
      </div>
    </div>
  </footer>
  
</body>

</html>