<?php
$team = 'IT Talomlok';
$topic = 'Find IT (แจ้งของหายในพื้นที่ขององค์กรนั้น)';
$problem = 'นักศึกษาและบุคลากรทำของหาย (กระเป๋า, บัตร, พวงกุญแจ, หูฟัง) แต่ไม่มีช่องทางกลางในการตามหา ส่วนผู้ที่เก็บของได้ไม่รู้จะนำไปคืนที่ไหน ทำให้อุปกรณ์และของมีค่าตกค้างหรือสูญหาย 
';
$members = ['นายกิตตศักดิ์ ชละเอม (Developer A)', 'นายธีรภัทร เนื่องจำนงค์ (Developer B)'];
?>
<!DOCTYPE html>
<html lang="th">
<head><meta charset="UTF-8"><title><?php echo $topic; ?></title></head>
<body>
  <h1><?php echo $topic; ?></h1>
  <p>ทีม: <?php echo $team; ?></p>
  <p>ปัญหาที่แก้: <?php echo $problem; ?></p>
  <h2>สมาชิก</h2>
  <ul>
    <?php foreach ($members as $m): ?>
      <li><?php echo $m; ?></li>
    <?php endforeach; ?>
  </ul>
  <p>อัปเดตล่าสุด: <?php echo date('d/m/Y H:i'); ?></p>
</body>
</html>
