<?php
$user = getUser($_SESSION["id"]);
if (isset($_GET['logout'])) {
    logout();
  }
?>

<!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0">ระบบจัดการฐานข้อมูลบนเว็บไซต์การบริหารงบประมาณ ของงานบริหารการเงินและงานแผนยุทธศาสตร์</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <div class="dropdown">
          
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $user["firstname"];?> <?php echo $user["lastname"];?>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="dropdown-item" href="?logout=true">ออกจากระบบ</a></li>
          </ul>
        </div>
      </div>
          
        </div>
      </div>
    </nav>
    <!-- End Navbar -->