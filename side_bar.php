
	<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-0" href="#" target="_blank">
				<!--<img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">-->
				<span class="ms-1 font-weight-bold" style="color:green;">Menu</span>
			</a>
		</div>
		<hr class="horizontal dark mt-0">
		<div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<?php if($_SESSION["id"] == "" && empty($_SESSION["id"])){ ?>
					<li class="nav-item">
						<a class="nav-link " href="index.php">
							<span class="nav-link-text ms-1">เข้าสู่ระบบ</span>
						</a>
					</li>
				<?php }else{ ?>
					<?php if($_SESSION["role"] == 1){ ?>
						<li class="nav-item">
							<a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>" href="dashboard.php">
								<span class="nav-link-text ms-1">หน้าหลัก</span>
							</a>
						</li>
						<li class="nav-item" >
							<a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_admin.php' ? 'active' : ''; ?> " href="manage_admin.php" >
								<span class="nav-link-text ms-1">จัดการหัวหน้างาน</span>
							</a>
						</li>
						<li class="nav-item" >
							<a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_user.php' ? 'active' : ''; ?> " href="manage_user.php" >
								<span class="nav-link-text ms-1">จัดการผู้ใช้งาน</span>
							</a>
						</li>
						<li class="nav-item" >
							<a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_strategic.php' ? 'active' : ''; ?> " href="manage_strategic.php" >
								<span class="nav-link-text ms-1">จัดการยุทธศาสตร์</span>
							</a>
						</li>
						<li class="nav-item" >
							<a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_strategy.php' ? 'active' : ''; ?> " href="manage_strategy.php" >
								<span class="nav-link-text ms-1">จัดการกลยุทธ์</span>
							</a>
						</li>
						<li class="nav-item" >
							<a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_project.php' ? 'active' : ''; ?> " href="manage_project.php" >
								<span class="nav-link-text ms-1">จัดการโครงการ</span>
							</a>
						</li>
						<li class="nav-item" >
							<a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_activity.php' ? 'active' : ''; ?> " href="manage_activity.php" >
								<span class="nav-link-text ms-1">จัดการกิจกรรม</span>
							</a>
						</li>
						<li class="nav-item" >
							<a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'export_data.php' ? 'active' : ''; ?> " href="export_data.php" >
								<span class="nav-link-text ms-1">Export Data</span>
							</a>
						</li>
						<li class="nav-item" >
							<a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'overview.php' ? 'active' : ''; ?> " href="overview.php" >
								<span class="nav-link-text ms-1">ภาพรวม</span>
							</a>
						</li>
						<!--<li class="nav-item">
							<a class="nav-link  " href="profile.php">
								<span class="nav-link-text ms-1">ข้อมูลส่วนตัว</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link  " href="?logout=true">
								<span class="nav-link-text ms-1">ออกจากระบบ</span>
							</a>
						</li>-->
					<?php } ?>
					<?php if($_SESSION["role"] == 2){ ?>
						<li class="nav-item">
							<a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?> " href="dashboard.php">
								<span class="nav-link-text ms-1">หน้าหลัก</span>
							</a>
						</li>
						<li class="nav-item" >
							<a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_activity.php' ? 'active' : ''; ?> " href="manage_activity.php" >
								<span class="nav-link-text ms-1">จัดการกิจกรรม</span>
							</a>
						</li>
						<!--<li class="nav-item">
							<a class="nav-link " href="download_form.php">
								<span class="nav-link-text ms-1">ดาวน์โหลดแบบฟอร์ม</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link  " href="profile.php">
								<span class="nav-link-text ms-1">ข้อมูลส่วนตัว</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link  " href="?logout=true">
								<span class="nav-link-text ms-1">ออกจากระบบ</span>
							</a>
						</li>-->
					<?php } ?>
					
					
				<?php } ?>
			</ul>
		</div>

	</aside>