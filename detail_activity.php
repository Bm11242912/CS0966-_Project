<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php
$currentDataActivity = getCurrentDataActivity($_GET["id"]);
$allActivityCost = getAllActivityCost($_GET["id"]);
$allActivityProcudure = getAllActivityProcudure($_GET["id"]);


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
        <input type="hidden" class="form-control" name="id" value="<?php echo $currentFaculty["id"];?>">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">ข้อมูลกิจกรรม</h4>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">ยุทธศาสตร์</label>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating"><?php echo $currentDataActivity["strat_name"];?> ปี <?php echo $currentDataActivity["strat_year"];?></label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">กลยุทธ์ </label>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating"><?php echo $currentDataActivity["strategy_name"];?></label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">รหัสโครงการ </label>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating"><?php echo $currentDataActivity["project_id"];?></label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">ชื่อโครงการ</label>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating"><?php echo $currentDataActivity["project_name"];?></label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">ผู้รับผิดชอบ</label>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating"><?php echo $currentDataActivity["responsible"];?></label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">งบประมาณที่ใช้</label>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating"><?php echo number_format($currentDataActivity["total_budget"]);?></label>
                    </div>
                  </div>
                </div>
                <?php if($currentDataActivity["link_budget"] != ""){ ?>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">เอกสารเบิกจ่าย(Link)</label>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="bmd-label-floating"><a href="<?php echo $currentDataActivity["link_budget"];?>">ตรวจสอบข้อมูล</a></label>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <?php if($currentDataActivity["link_summary"] != ""){ ?>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">สรุปผลการดำเนินงาน(Link)</label>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="bmd-label-floating"><a href="<?php echo $currentDataActivity["link_summary"];?>">ตรวจสอบข้อมูล</a></label>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                
                
                

                <div class="clearfix"></div>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile">
              <img class="img-fluid shadow border-radius-xl" src="assets/img/icons/paper-icon.png" />
            </div>
          </div>

          <div class="col-md-12" style="margin-top: 25px;">
            <div class="card card-profile">
              <div class="card-header card-header-primary">
                <h4 class="card-title">รายละเอียดงบประมาณที่ใช้</h4>
              </div>
              <table class="table table-striped" id="dataTable">
                <thead>
                  <th style="text-align:left;"><label>รายละเอียด</label></th>
                  <th style="text-align:center;"><label>งบประมาณ</label></th>
                </thead>
                <tbody>
                  <?php if(empty($allActivityCost)){ ?>
                  <?php }else{?>
                    <?php foreach($allActivityCost as $data){ ?>
                      <tr>
                        <td style="width:20%;text-align:left;">
                          <label><?php echo $data["budget_detail"];?></label>
                        </td>
                        <td style="width:50%;text-align:center;">
                          <label><?php echo number_format($data["budget_cost"]);?></label>
                        </td>
                        
                      <?php } ?>
                    <?php } ?>

                  </tbody>
                </table>

              </div>
            </div>

            <div class="col-md-12" style="margin-top: 25px;">
              <div class="card card-profile">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">ขั้นตอน</h4>
                </div>
                <table class="table table-striped" id="dataTable">
                  <thead>
                    <th style="text-align:left;"><label>รายละเอียด</label></th>
                    <th style="text-align:left;"><label>Link</label></th>
                    <th style="text-align:center;"><label>สถานะ</label></th>
                  </thead>
                  <tbody>
                    <?php if(empty($allActivityProcudure)){ ?>
                    <?php }else{?>
                      <?php foreach($allActivityProcudure as $data){ ?>
                        <tr>
                          <td style="width:20%;text-align:left;">
                            <label><?php echo $data["procedure_detail"];?></label>
                          </td>
                          <td style="width:60%;text-align:left;">
                            <label><a href="<?php echo $data["procedure_link"];?>" target="_blank">Link เอกสาร</a></label>
                          </td>
                          <td style="width:20%;text-align:center;">
                            <label><?php echo $status_map[$data["procedure_status"]];?></label>
                          </td>

                        <?php } ?>
                      <?php } ?>

                    </tbody>
                  </table>

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