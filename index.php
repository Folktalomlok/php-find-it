<?php
require_once 'config.php';[cite: 17]

// 1) ภาพรวมข้อมูลสิ่งของในระบบ Find IT
$labName = 'วิทยาลัยเทคนิคสัตหีบ (แผนกเทคโนโลยีสารสนเทศ)'; // string[cite: 18]
$totalItems = 40;     // จำนวนสิ่งของทั้งหมดที่รับแจ้ง (int)[cite: 16, 18]
$returnedItems = 25;  // จำนวนสิ่งของที่ส่งคืนเจ้าของแล้ว (int)[cite: 16]
$isOpen = true;       // สถานะเปิดให้บริการของศูนย์ (bool)[cite: 18]

// 2) คำนวณค่าภาพรวม (รองรับกรณีป้องกัน Division by Zero ตาม T4)
$pendingItems = $totalItems - $returnedItems; // สิ่งของที่ยังค้างรอรับคืน (int)[cite: 16]
$pendingPercent = $totalItems > 0 ? round(($pendingItems / $totalItems) * 100, 1) : 0; // float[cite: 16, 23]

// 3) ข้อมูลรายการแจ้งของหายล่าสุด 1 รายการ
$reporterName = 'สมชาย ใจดี';[cite: 19]
$itemName = 'กระเป๋าสตางค์หนังสีดำ';[cite: 19]
$qty = 1;[cite: 19]
$foundDate = '2026-10-10';[cite: 19]

// คำนวณวันครบกำหนดจัดเก็บ และจำนวนวันที่เกินกำหนด
$dueDate = date('Y-m-d', strtotime($foundDate . ' +' . MAX_HOLD_DAYS . ' days'));[cite: 19]
$today = date('Y-m-d');[cite: 19]
$daysLate = intdiv(strtotime($today) - strtotime($dueDate), 86400); // คำนวณจำนวนวันเกินกำหนด[cite: 19]

// 4) เงื่อนไขการตัดสินใจเตือนและคำนวณค่าบริการดูแล
$isLate = $daysLate > 0;[cite: 20]
$fine = $isLate ? $daysLate * SERVICE_FEE * $qty : 0; // คำนวณค่าธรรมเนียมค้างส่งคืน[cite: 20]
$needAlert = $pendingPercent >= ALERT_PERCENT || $isLate; // เงื่อนไขเตือนโดยใช้ ||[cite: 18, 20]
$statusText = $isLate ? "เกินกำหนด $daysLate วัน" : 'ยังไม่เกินกำหนดฝากส่งคืน';[cite: 20]
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">[cite: 22]
    <title><?php echo APP_NAME; ?></title>[cite: 21]
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 24px; background-color: #f8f9fa; }
        h1 { color: #0d6efd; }
        .card { display: inline-block; padding: 16px 24px; margin: 8px; border-radius: 10px; background: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); min-width: 140px; }[cite: 21]
        .warn { background: #fde2e1; border: 1px solid #f5c2c7; color: #842029; }[cite: 21]
        .badge-open { color: #198754; font-weight: bold; }
        .badge-closed { color: #dc3545; font-weight: bold; }
        .notice-box { padding: 12px; margin-top: 15px; border-radius: 6px; }
    </style>
</head>
<body>

    <h1><?php echo APP_NAME; ?></h1>[cite: 21]
    <p>
        <strong>หน่วยงาน:</strong> <?php echo $labName; ?> | [cite: 21]
        <strong>สถานะศูนย์:</strong> <span class="<?php echo $isOpen ? 'badge-open' : 'badge-closed'; ?>"><?php echo $isOpen ? 'เปิดทำการ' : 'ปิดทำการ'; ?></span> | [cite: 21]
        <strong>วันที่ปัจจุบัน:</strong> <?php echo date('d/m/Y'); ?>[cite: 21]
    </p>

    <hr>

    <!-- กล่องแสดงตัวเลขสรุป 4 กล่อง (ตามเกณฑ์ส่วน ก4) -->[cite: 16, 22]
    <div class="card">
        รายการรับแจ้งทั้งหมด<br>
        <b style="font-size: 24px;"><?php echo $totalItems; ?></b> ชิ้น[cite: 21]
    </div>

    <div class="card">
        ส่งคืนสำเร็จแล้ว<br>
        <b style="font-size: 24px; color: #198754;"><?php echo $returnedItems; ?></b> ชิ้น
    </div>

    <div class="card">
        ยังค้างรอรับคืน<br>
        <b style="font-size: 24px; color: #fd7e14;"><?php echo $pendingItems; ?></b> ชิ้น
    </div>

    <div class="card <?php echo $pendingPercent >= ALERT_PERCENT ? 'warn' : ''; ?>">[cite: 21]
        สัดส่วนของค้างรับ<br>
        <b style="font-size: 24px;"><?php echo $pendingPercent; ?>%</b>[cite: 21]
    </div>

    <hr>

    <!-- รายการแจ้งของหายล่าสุด 1 รายการ -->[cite: 16, 22]
    <h2>รายการรับแจ้งล่าสุด</h2>
    <div style="background: #ffffff; padding: 16px; border-radius: 8px; border-left: 5px solid #0d6efd;">
        <p><strong>ผู้แจ้งเรื่อง:</strong> <?php echo $reporterName; ?></p>
        <p><strong>สิ่งของ:</strong> <?php echo $itemName; ?> (จำนวน <?php echo $qty; ?> ชิ้น)</p>[cite: 21]
        <p><strong>วันที่รับแจ้ง:</strong> <?php echo $foundDate; ?> | <strong>กำหนดวันจัดเก็บสูงสุด:</strong> <?php echo $dueDate; ?></p>[cite: 21]
        <p><strong>สถานะการจัดเก็บ:</strong> <?php echo $statusText; ?></p>[cite: 21]
        <p><strong>ค่าธรรมเนียมดูแลรักษาสิ่งของ:</strong> <span style="color: #dc3545; font-weight: bold;"><?php echo number_format($fine, 2); ?></span> บาท</p>[cite: 21]
    </div>

    <!-- ข้อความเตือนเมื่อถึงเงื่อนไข -->[cite: 16, 22]
    <?php if ($needAlert): ?>
        <div class="notice-box warn">
            ⚠️ <strong>ข้อความแจ้งเตือนระบบ:</strong> มีรายการสิ่งของค้างส่งคืนเกินกำหนด หรือมีปริมาณสิ่งของค้างในระบบเกิน <?php echo ALERT_PERCENT; ?>% โปรดตรวจสอบและติดตามเจ้าของ![cite: 21]
        </div>
    <?php endif; ?>

    <br>
    <p><a href="about.php">📄 อ่านรายละเอียดโครงงาน (About)</a></p>[cite: 21]

</body>
</html>
