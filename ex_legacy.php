<?php

header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="แผนปฏิรูปงบประมาณประจำปี.xls"');
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize("แผนปฏิรูปงบประมาณประจำปี.xls"));   

require("function/function.php");
$strat_year = $_POST["strat_year"];
$allStrategicYear = getAllStrategicYear($strat_year);
$csv_status_map = array( 1=>'ยังไม่ได้ดำเนินการ',2=>'ดำเนินการแล้วเสร็จ');
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <table border="1">
    <tr>
      <td>ยุทธศาสตร์</td>
      <td>กลยุทธ์</td>
      <td>รหัสโครงการ</td>
      <td>โครงการ/กิจกรรม</td>
      <td>ผู้รับผิดชอบ</td>
      <td>เจ้าหน้าที่ประสานงาน</td>
      <td>งบประมาณ</td>
      <td>งบประมาณที่ใช้จริง</td>
      <td>จำนวน</td>
      <td>ขั้นตอน</td>
      <td>สถานะ</td>
      <td>แนบลิ้งก์เอกสารเบิกจ่าย</td>
      <td>แนบลิ้งก์สรุปผลการดำเนินงาน</td>
      
    </tr>
    <?php if(empty($allStrategicYear)){ ?>
    <?php }else{?>
      <?php foreach($allStrategicYear as $dataStrategic){ ?>
        <?php $getAllStrategyInStrategicsId = getAllStrategyInStrategicsId($dataStrategic["id"]); ?>
        <tr>
          <td colspan="12"><?php echo $dataStrategic["strat_name"];?></td>
        </tr>
        
        <tr>
          <?php if(empty($getAllStrategyInStrategicsId)){ ?>
          <?php }else{?>
            <?php foreach($getAllStrategyInStrategicsId as $dataStrategy){ ?>
              <?php $allProjectInStrategiesId = getAllProjectInStrategiesId($dataStrategy["id"]); ?>
              <td></td>
              <td colspan="11"><?php echo $dataStrategy["strategy_name"];?></td>
            <?php } ?>
          <?php } ?>
        </tr>
        <tr>
          <?php if(empty($allProjectInStrategiesId)){ ?>
          <?php }else{?>
            <?php foreach($allProjectInStrategiesId as $dataPro){ ?>
              <?php $allActivityInProject = getAllActivityInProject($dataPro["id"]); ?>
              <td></td>
              <td></td>
              <td ><?php echo $dataPro["project_id"];?></td>
              <td ><?php echo $dataPro["project_name"];?></td>
              <td ><?php echo $dataPro["responsible"];?></td>
              <td ><?php echo $dataPro["coordination"];?></td>
              <td ><?php echo number_format($dataPro["budget"]);?></td>
            <?php } ?>
          <?php } ?>
        </tr>
        <tr>
          <?php if(empty($allActivityInProject)){ ?>
          <?php }else{?>
            <?php foreach($allActivityInProject as $dataAct){ ?>
              <?php $allActivityCost = getAllActivityCost($dataAct["id"]); ?>
              <?php $allActivityProcudure = getAllActivityProcudure($dataAct["id"]); ?>
              <td></td>
              <td></td>
              <td></td>
              <td ><?php echo $dataAct["activity_name"];?></td>
              <td ></td>
              <td ><?php echo $dataAct["coordination_name"];?></td>
              <td ><?php echo number_format($dataAct["total_budget"]);?></td>
              <td >
                <?php if(empty($allActivityCost)){ ?>
                <?php }else{?>
                  <?php foreach($allActivityCost as $dataCo){ ?>
                    <?php echo $dataCo["budget_detail"];?><br/>
                  <?php } ?>
                <?php } ?>
              </td>
              <td >
                <?php if(empty($allActivityCost)){ ?>
                <?php }else{?>
                  <?php foreach($allActivityCost as $dataCo){ ?>
                    <?php echo $dataCo["budget_cost"];?><br/>
                  <?php } ?>
                <?php } ?>
              </td>
              <td >
                <?php if(empty($allActivityProcudure)){ ?>
                <?php }else{?>
                  <?php foreach($allActivityProcudure as $dataProd){ ?>
                    <?php echo $dataProd["procedure_detail"];?><br/>
                  <?php } ?>
                <?php } ?>
              </td>
              <td >
                <?php if(empty($allActivityProcudure)){ ?>
                <?php }else{?>
                  <?php foreach($allActivityProcudure as $dataProd){ ?>
                    <?php echo $csv_status_map[$dataProd["procedure_status"]];?><br/>
                  <?php } ?>
                <?php } ?>
              </td>
              <td ><?php echo $dataAct["link_budget"];?></td>
              <td ><?php echo $dataAct["link_summary"];?></td>
            <?php } ?>
          <?php } ?>
        </tr>
      <?php } ?>
    <?php } ?>
  </table>
</body>
</html>
