<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php
$allProject = getAllProject();
$currentActivity = getCurrentActivity($_GET["id"]);
$allActivityCost = getAllActivityCost($_GET["id"]);
$allActivityProcudure = getAllActivityProcudure($_GET["id"]);


if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    $budget_detail = $_POST["budget_detail"];
    $budget_cost = $_POST["budget_cost"];
    $procedure_detail = $_POST["procedure_detail"];
    $procedure_link = $_POST["procedure_link"];
    saveActivity($_POST["users_id"],$_POST["projects_id"],$_POST["activity_name"],$_POST["coordination_name"],$_POST["total_budget"],$budget_detail,$budget_cost,$procedure_detail,$procedure_link);
  }else{
    $budget_detail = $_POST["budget_detail"];
    $budget_cost = $_POST["budget_cost"];
    $procedure_detail = $_POST["procedure_detail"];
    $procedure_link = $_POST["procedure_link"];
    editActivity($_POST["id"],$_POST["users_id"],$_POST["projects_id"],$_POST["activity_name"],$_POST["coordination_name"],$_POST["total_budget"],$budget_detail,$budget_cost,$procedure_detail,$procedure_link);
  }
  

}
if($_GET["id"] == ""){
  $txtHead = "เพิ่ม กิจกรรม";
}else{
  $txtHead = "แก้ไข กิจกรรม";
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
        <input type="hidden" class="form-control" name="id" value="<?php echo $currentActivity["aid"];?>">
        <input type="hidden" class="form-control" name="users_id" value="<?php echo $_SESSION["id"];?>">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title"><?php echo $txtHead;?></h4>
              </div>

              <div class="card-body">
                <legend>ข้อมูลโครงการ</legend>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">โครงการ</label>
                      <select name="projects_id" class="form-control border-input" id="projects_id">
                        <option value="">-- โปรดเลือก --</option>
                        <?php foreach($allProject as $dataPro){ ?>
                          <?php $selected = "";
                          if($currentActivity['projects_id'] == $dataPro['id']){
                            $selected = " selected";

                          }
                          ?>
                          <option value="<?php echo $dataPro['id']?>" <?php echo $selected;?>><?php echo $dataPro['project_name']?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">ชื่อกิจกรรม</label>
                      <input type="text" class="form-control" name="activity_name" value="<?php echo $currentActivity["activity_name"];?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">เจ้าหน้าที่ประสานงาน</label>
                      <input type="text" class="form-control" name="coordination_name" value="<?php echo $currentActivity["coordination_name"];?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">งบประมาณทั้งหมดที่ใช้</label>
                      <input type="text" class="form-control" name="total_budget" value="<?php echo $currentActivity["total_budget"];?>">
                    </div>
                  </div>
                </div>
                <hr/>
                <legend>รายละเอียดงบประมาณ</legend>
                <div class="col-lg-12">
                  <fieldset>
                    <input type="button" style="float:right;margin-right:50px;" value="ลบ" class="btn btn-danger" onclick="deleteRow('dataTable')" />
                    <input type="button" style="float:right;margin-right:50px;" id="add_row" value="เพิ่ม" class="btn btn-primary" onclick="addRow('dataTable')" />
                    <table class="table table-striped" id="dataTable">
                      <thead>
                        <th></th>
                        <th style="text-align:left;"><label>รายละเอียด</label></th>
                        <th style="text-align:center;"><label>งบประมาณ</label></th>
                      </thead>
                      <tbody>
                        <?php if(empty($allActivityCost)){ ?>
                          <?php for($i=0;$i<5;$i++){ ?>
                            <tr>
                              <td style="width:5%;"><input type="checkbox" name="chk2"/></td>
                              <td style="width:65%;">
                                <input type="text" class="form-control border-input " name="budget_detail[]" id="budget_detail<?php echo $i;?>" >
                              </td>
                              <td style="width:30%;">
                                <input type="text" class="form-control border-input " name="budget_cost[]" id="budget_cost<?php echo $i;?>" >
                              </td>
                              
                            </tr>
                          <?php } ?>
                        <?php }else{?>
                          <?php foreach($allActivityCost as $dataCo){ ?>

                            <tr>
                              <td style="width:5%;"><input type="checkbox" name="chk2"/></td>
                              <td style="width:65%;">
                                <input type="text" class="form-control border-input " name="budget_detail[]" id="budget_detail<?php echo $i;?>" value="<?php echo $dataCo["budget_detail"];?>">
                              </td>
                              <td style="width:30%;">
                                <input type="text" class="form-control border-input " name="budget_cost[]" id="budget_cost<?php echo $i;?>" value="<?php echo $dataCo["budget_cost"];?>">
                              </td>

                            </tr>

                          <?php } ?>
                        <?php } ?>
                        
                      </tbody>
                    </table>
                  </fieldset>
                </div>
                <hr/>
                <legend>ขั้นตอน</legend>
                <div class="col-lg-12">
                  <fieldset>
                    <input type="button" style="float:right;margin-right:50px;" value="ลบ" class="btn btn-danger" onclick="deleteRow2('dataTable2')" />
                    <input type="button" style="float:right;margin-right:50px;" id="add_row" value="เพิ่ม" class="btn btn-primary" onclick="addRow2('dataTable2')" />
                    <table class="table table-striped" id="dataTable2">
                      <thead>
                        <th></th>
                        <th style="text-align:left;"><label>รายละเอียด</label></th>
                        <th style="text-align:left;"><label>Link</label></th>
                      </thead>
                      <tbody>
                        <?php if(empty($allActivityProcudure)){ ?>
                          <?php for($i=0;$i<5;$i++){ ?>
                            <tr>
                              <td style="width:5%;"><input type="checkbox" name="chk2"/></td>
                              <td style="width:35%;">
                                <!--<input type="text" class="form-control border-input " name="procedure_detail[]" id="procedure_detail<?php echo $i;?>" >-->
                                <select name="procedure_detail[]" class="form-control">
                                  <option value="">-- โปรดระบุ --</option>
                                  <option value="ขออนุมัติจัดโครงการ">ขออนุมัติจัดโครงการ</option>
                                  <option value="ขออนุมัติใช้งบประมาณ">ขออนุมัติใช้งบประมาณ</option>
                                  <option value="ขออนุมัติเบิกจ่าย">ขออนุมัติเบิกจ่าย</option>
                                  <option value="ขอส่งสรุปผลการดำเนินงาน">ขอส่งสรุปผลการดำเนินงาน</option>
                                </select>
                              </td>
                              <td style="width:60%;">
                                <input type="text" class="form-control border-input " name="procedure_link[]" id="procedure_link<?php echo $i;?>" >
                              </td>
                              
                            </tr>
                          <?php } ?>
                        <?php }else{?>
                          <?php foreach($allActivityProcudure as $dataProd){ ?>

                            <tr>
                              <td style="width:5%;"><input type="checkbox" name="chk2"/></td>
                              <td style="width:35%;">
                              <select name="procedure_detail[]" class="form-control">
                                  <option value="">-- โปรดระบุ --</option>
                                  <option value="ขออนุมัติจัดโครงการ">ขออนุมัติจัดโครงการ</option>
                                  <option value="ขออนุมัติใช้งบประมาณ">ขออนุมัติใช้งบประมาณ</option>
                                  <option value="ขออนุมัติเบิกจ่าย">ขออนุมัติเบิกจ่าย</option>
                                  <option value="ขอส่งสรุปผลการดำเนินงาน">ขอส่งสรุปผลการดำเนินงาน</option>
                                </select>
                              </td>
                              <td style="width:60%;">
                                <input type="text" class="form-control border-input " name="procedure_link[]" id="procedure_link<?php echo $i;?>" >
                              </td>

                            </tr>

                          <?php } ?>
                        <?php } ?>
                        
                      </tbody>
                    </table>
                  </fieldset>
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

      </div>
    </form>

    <script language="javascript">

      function addRow(tableID) {

        var table = document.getElementById(tableID);

        var rowCount = table.rows.length;

        var row = table.insertRow(rowCount);

        var cell0 = row.insertCell(0);
        var element0 = document.createElement("input");
        element0.type = "checkbox";
        element0.name="chkbox";
        cell0.appendChild(element0);

        var cell1 = row.insertCell(1);
        var element1 = document.createElement("input");
        element1.type = "text";
        element1.name = "budget_detail[]";
        element1.id = "budget_detail"+rowCount;
        element1.className = "form-control";
        cell1.appendChild(element1);
        

        var cell2 = row.insertCell(2);
        var element2 = document.createElement("input");
        element2.type = "text";
        element2.name = "budget_cost[]";
        element2.id = "budget_cost"+rowCount;
        element2.className = "form-control";
        cell2.appendChild(element2);

      }

      function deleteRow(tableID) {
        try {
          var table = document.getElementById(tableID);
          var rowCount = table.rows.length;
          for(var i=0; i<rowCount; i++) {
            var row = table.rows[i];
            var chkbox = row.cells[0].childNodes[0];
            if(null != chkbox && true == chkbox.checked) {
              table.deleteRow(i);
              rowCount--;
              i--;
            }


          }
        }catch(e) {
          alert(e);
        }
      }
    </script>

    <script language="javascript">

      function addRow2(tableID) {

        var table = document.getElementById(tableID);

        var rowCount = table.rows.length;

        var row = table.insertRow(rowCount);

        var cell0 = row.insertCell(0);
        var element0 = document.createElement("input");
        element0.type = "checkbox";
        element0.name="chkbox";
        cell0.appendChild(element0);

        var cell1 = row.insertCell(1);
        var element1 = document.createElement("select");
        element1.id = 'procedure_detail'+rowCount;
        element1.name = 'procedure_detail[]';
        element1.setAttribute('class', 'form-control');
        cell1.appendChild(element1);

        var option = document.createElement("option");
            option.value = 'ขออนุมัติจัดโครงการ';
            option.appendChild(document.createTextNode("ขออนุมัติจัดโครงการ"));
            element1.appendChild(option);
        var option = document.createElement("option");
            option.value = 'ขออนุมัติใช้งบประมาณ';
            option.appendChild(document.createTextNode("ขออนุมัติใช้งบประมาณ"));
            element1.appendChild(option);
        var option = document.createElement("option");
            option.value = 'ขออนุมัติเบิกจ่าย';
            option.appendChild(document.createTextNode("ขออนุมัติเบิกจ่าย"));
            element1.appendChild(option);
        var option = document.createElement("option");
            option.value = 'ขอส่งสรุปผลการดำเนินงาน';
            option.appendChild(document.createTextNode("ขอส่งสรุปผลการดำเนินงาน"));
            element1.appendChild(option);

        var cell2 = row.insertCell(2);
        var element2 = document.createElement("input");
        element2.type = "text";
        element2.name = "procedure_link[]";
        element2.id = "procedure_link"+rowCount;
        element2.className = "form-control";
        cell2.appendChild(element2);

      }

      function deleteRow2(tableID) {
        try {
          var table = document.getElementById(tableID);
          var rowCount = table.rows.length;
          for(var i=0; i<rowCount; i++) {
            var row = table.rows[i];
            var chkbox = row.cells[0].childNodes[0];
            if(null != chkbox && true == chkbox.checked) {
              table.deleteRow(i);
              rowCount--;
              i--;
            }


          }
        }catch(e) {
          alert(e);
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