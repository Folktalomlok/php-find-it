<?php
$listings = [
    [
        'item' => 'กระเป๋าสตางค์',
        'detail' => 'กระเป๋าสตางค์สีดำ · มีบัตรนักศึกษา',
        'location' => 'อาคารเรียนรวม',
        'time' => 'วันนี้ · 09:20 น.',
        'type' => 'พบของ',
        'icon' => '▰',
        'color' => 'mint',
        'initials' => 'KS',
        'name' => 'กิตติศักดิ์ ช.',
    ],
    [
        'item' => 'กุญแจรถ',
        'detail' => 'พวงกุญแจสีแดง · มีรีโมตรถ',
        'location' => 'ลานจอดรถ A',
        'time' => 'วันนี้ · 08:45 น.',
        'type' => 'ของหาย',
        'icon' => '⌘',
        'color' => 'peach',
        'initials' => 'TN',
        'name' => 'ธีรภัทร น.',
    ],
    [
        'item' => 'หูฟังไร้สาย',
        'detail' => 'หูฟังสีขาว · กล่องชาร์จสีขาว',
        'location' => 'ห้องสมุด ชั้น 2',
        'time' => 'เมื่อวาน · 16:10 น.',
        'type' => 'พบของ',
        'icon' => '◖',
        'color' => 'lavender',
        'initials' => 'PM',
        'name' => 'พิมพ์ชนก ม.',
    ],
    [
        'item' => 'บัตรนักศึกษา',
        'detail' => 'บัตรนักศึกษาสีฟ้า · คณะบริหารธุรกิจ',
        'location' => 'โรงอาหารกลาง',
        'time' => 'เมื่อวาน · 12:30 น.',
        'type' => 'ของหาย',
        'icon' => '▤',
        'color' => 'blue',
        'initials' => 'NP',
        'name' => 'ณัฐพล พ.',
    ],
];
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fffacd">
    <meta name="description" content="Find It แพลตฟอร์มแจ้งของหายและของที่พบสำหรับนักศึกษาและบุคลากร">
    <title>ภาพรวม | Find It</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        :root {
            color-scheme: light;
            --teal-950: #123b3a;
            --teal-800: #1c5d59;
            --teal-700: #28746e;
            --teal-100: #e2f2ef;
            --teal-50: #f1f8f6;
            --coral-600: #e87562;
            --coral-100: #fff0eb;
            --ink: #233b3a;
            --muted: #82918f;
            --line: #eee9d8;
            --surface: #fff;
            --canvas: #fffacd;
            --shadow: 0 10px 30px rgba(92, 77, 26, .07);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background:
                radial-gradient(ellipse at 92% 2%, rgba(232,117,98,.09), transparent 28rem),
                radial-gradient(ellipse at 12% 70%, rgba(40,116,110,.07), transparent 32rem),
                var(--canvas);
            background-attachment: fixed;
            color: var(--ink);
            font-family: "Leelawadee UI", "Noto Sans Thai", Tahoma, sans-serif;
            font-size: 14px;
            -webkit-font-smoothing: antialiased;
        }

        a { color: inherit; text-decoration: none; }
        button, input { font: inherit; }
        button { cursor: pointer; }

        .app-shell { min-height: 100vh; }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 5;
            display: flex;
            width: 246px;
            flex-direction: column;
            padding: 29px 18px 20px;
            background: var(--teal-950);
            color: #f5fbf9;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            margin: 0 8px 42px;
        }

        .brand-mark {
            display: grid;
            width: 38px;
            height: 38px;
            place-items: center;
            border-radius: 12px;
            background: var(--coral-600);
            color: white;
            font-size: 21px;
            font-weight: 800;
            transform: rotate(-5deg);
        }

        .brand-name { font-size: 19px; font-weight: 750; letter-spacing: -.5px; }
        .brand-caption { margin-top: 1px; color: #aac5c0; font-size: 11px; }
        .brand > span:last-child, .profile > span:last-child { display: grid; }
        .brand-name, .brand-caption, .profile-name, .profile-role, .item-name, .item-detail { display: block; }
        .nav-label { margin: 0 12px 10px; color: #89aaa4; font-size: 10px; font-weight: 700; letter-spacing: 1.15px; }

        .nav-list { display: grid; gap: 5px; margin-bottom: 30px; }

        .nav-link {
            display: flex;
            min-height: 43px;
            align-items: center;
            gap: 12px;
            padding: 0 12px;
            border-radius: 10px;
            color: #c3d8d4;
            font-size: 13px;
            transition: background .18s, color .18s;
        }

        .nav-link:hover, .nav-link.active { background: rgba(255,255,255,.11); color: white; }
        .nav-icon { display: grid; width: 20px; place-items: center; color: #a7c9c3; font-size: 17px; }
        .nav-link.active .nav-icon { color: #ff9b87; }
        .nav-count { margin-left: auto; color: #a9c2bd; font-size: 11px; }

        .sidebar-spacer { flex: 1; }

        .help-card {
            margin: 0 2px 20px;
            padding: 16px;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 13px;
            background: rgba(255,255,255,.055);
        }

        .help-card strong { display: block; margin-bottom: 5px; font-size: 12px; }
        .help-card p { margin: 0 0 12px; color: #b3ccc7; font-size: 11px; line-height: 1.65; }
        .help-card a { color: #ffab98; font-size: 11px; font-weight: 700; }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 7px 0;
            border-top: 1px solid rgba(255,255,255,.12);
        }

        .avatar {
            display: grid;
            width: 35px;
            height: 35px;
            flex: 0 0 auto;
            place-items: center;
            border-radius: 50%;
            background: #d9ebe6;
            color: var(--teal-800);
            font-size: 11px;
            font-weight: 800;
        }

        .profile-name { font-size: 12px; font-weight: 700; }
        .profile-role { margin-top: 3px; color: #a7c1bb; font-size: 10px; }

        .main-area { min-height: 100vh; margin-left: 246px; }

        .topbar {
            display: flex;
            height: 76px;
            align-items: center;
            justify-content: space-between;
            padding: 0 42px;
            border-bottom: 1px solid var(--line);
            background: rgba(255,255,255,.82);
        }

        .breadcrumb { color: var(--muted); font-size: 12px; }
        .breadcrumb span { margin: 0 8px; color: #bac5c3; }
        .breadcrumb strong { color: var(--ink); font-weight: 650; }
        .topbar-actions { display: flex; align-items: center; gap: 12px; }
        .date-label { color: var(--muted); font-size: 11px; }

        .icon-button {
            position: relative;
            display: grid;
            width: 37px;
            height: 37px;
            place-items: center;
            border: 1px solid var(--line);
            border-radius: 11px;
            background: white;
            color: #617673;
            font-size: 16px;
        }

        .notification-dot { position: absolute; top: 8px; right: 8px; width: 6px; height: 6px; border: 1px solid white; border-radius: 50%; background: var(--coral-600); }

        main { width: min(1320px, 100%); margin: 0 auto; padding: 32px 42px 48px; }

        .welcome-row { display: flex; align-items: flex-end; justify-content: space-between; gap: 18px; margin-bottom: 25px; }
        .eyebrow { margin: 0 0 7px; color: var(--teal-700); font-size: 11px; font-weight: 750; letter-spacing: .8px; text-transform: uppercase; }
        h1 { margin: 0; color: var(--teal-950); font-size: clamp(24px, 2.5vw, 30px); font-weight: 750; letter-spacing: -.8px; }
        .welcome-copy { margin: 7px 0 0; color: var(--muted); font-size: 12px; }

        .primary-button {
            display: inline-flex;
            min-height: 42px;
            flex: 0 0 auto;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0 16px;
            border: 0;
            border-radius: 10px;
            background: var(--teal-800);
            box-shadow: 0 5px 12px rgba(28,93,89,.15);
            color: white;
            font-size: 12px;
            font-weight: 700;
            transition: background .18s, transform .18s;
        }

        .primary-button:hover { background: var(--teal-950); transform: translateY(-1px); }
        .plus { font-size: 19px; font-weight: 400; line-height: 1; }

        .stats-grid { margin-bottom: 19px; }

        .stat-card {
            min-height: 128px;
            padding: 19px 19px 16px;
            border: 1px solid var(--line);
            border-radius: 13px;
            background: var(--surface);
            box-shadow: var(--shadow);
        }

        .stat-top { display: flex; align-items: center; justify-content: space-between; }
        .stat-label { color: #71827f; font-size: 11px; font-weight: 600; }
        .stat-icon { display: grid; width: 32px; height: 32px; place-items: center; border-radius: 10px; font-size: 16px; }
        .stat-icon.teal { background: var(--teal-100); color: var(--teal-700); }
        .stat-icon.coral { background: var(--coral-100); color: var(--coral-600); }
        .stat-icon.sand { background: #fbf4e5; color: #b98c36; }
        .stat-icon.blue { background: #eaf1fa; color: #6484b5; }
        .stat-value { margin-top: 12px; color: var(--teal-950); font-size: 27px; font-weight: 750; letter-spacing: -.5px; line-height: 1; }
        .stat-foot { display: flex; align-items: center; gap: 5px; margin-top: 9px; color: var(--muted); font-size: 10px; }
        .trend { color: var(--teal-700); font-weight: 750; }
        .trend.coral { color: var(--coral-600); }

        .content-grid { align-items: start; }
        .panel { overflow: hidden; border: 1px solid var(--line); border-radius: 14px; background: var(--surface); box-shadow: var(--shadow); }
        .panel-header { display: flex; align-items: center; justify-content: space-between; gap: 14px; padding: 19px 20px 15px; background: var(--surface); }
        .panel-title { margin: 0; color: var(--teal-950); font-size: 14px; font-weight: 750; }
        .panel-subtitle { margin: 5px 0 0; color: var(--muted); font-size: 10px; }
        .text-link { color: var(--teal-700); font-size: 11px; font-weight: 700; white-space: nowrap; }
        .text-link:hover { color: var(--coral-600); }

        .listing-tools { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 0 20px 14px; }
        .filters { display: flex; gap: 5px; }
        .filter-button { padding: 7px 11px; border: 0; border-radius: 8px; background: transparent; color: #788986; font-size: 10px; }
        .filter-button:hover, .filter-button.active { background: var(--teal-100); color: var(--teal-800); font-weight: 700; }

        .search-box { display: flex; width: min(210px, 44%); height: 33px; align-items: center; gap: 7px; padding: 0 10px; border: 1px solid var(--line); border-radius: 8px; color: #91a09d; }
        .search-box input { width: 100%; min-width: 0; border: 0; outline: 0; background: transparent; color: var(--ink); font-size: 10px; }
        .search-box input::placeholder { color: #a4b0ae; }

        .listing-list { border-top: 1px solid var(--line); }
        .listing-row { display: grid; grid-template-columns: minmax(155px, 1.25fr) minmax(105px, .9fr) minmax(95px, .75fr) auto; align-items: center; gap: 12px; min-height: 73px; padding: 11px 20px; border-bottom: 1px solid #eff3f2; }
        .listing-row:last-child { border-bottom: 0; }
        .listing-item { display: flex; min-width: 0; align-items: center; gap: 10px; }
        .item-art { display: grid; width: 38px; height: 38px; flex: 0 0 auto; place-items: center; border-radius: 11px; font-size: 19px; }
        .item-art.mint { background: #e5f3ee; color: #438477; }
        .item-art.peach { background: #fff0e9; color: #df866b; }
        .item-art.lavender { background: #f0edfa; color: #8172b2; }
        .item-art.blue { background: #eaf2fb; color: #6686b5; }
        .item-name { overflow: hidden; color: #2b403e; font-size: 11px; font-weight: 700; text-overflow: ellipsis; white-space: nowrap; }
        .item-detail { overflow: hidden; margin-top: 4px; color: #96a29f; font-size: 9px; text-overflow: ellipsis; white-space: nowrap; }
        .location-name { color: #526461; font-size: 10px; }
        .listing-time { margin-top: 4px; color: #9aa6a3; font-size: 9px; }
        .type-badge { display: inline-flex; align-items: center; justify-content: center; padding: 5px 8px; border-radius: 6px; background: var(--teal-100); color: var(--teal-700); font-size: 9px; font-weight: 700; white-space: nowrap; }
        .type-badge.lost { background: var(--coral-100); color: #d36b58; }
        .empty-state { display: none; padding: 25px 20px; color: var(--muted); font-size: 12px; text-align: center; }

        .side-stack { display: grid; gap: 18px; }
        .highlight-card { position: relative; overflow: hidden; min-height: 163px; padding: 19px; border: 0; background: var(--teal-800); color: white; }
        .highlight-card::after { position: absolute; right: -28px; bottom: -65px; width: 175px; height: 175px; border: 1px solid rgba(255,255,255,.13); border-radius: 50%; box-shadow: 0 0 0 22px rgba(255,255,255,.035), 0 0 0 45px rgba(255,255,255,.025); content: ""; }
        .highlight-label { color: #c6e1dc; font-size: 10px; }
        .highlight-number { position: relative; z-index: 1; margin-top: 8px; font-size: 30px; font-weight: 750; letter-spacing: -.7px; }
        .highlight-copy { position: relative; z-index: 1; max-width: 210px; margin: 5px 0 14px; color: #d7e9e5; font-size: 10px; line-height: 1.65; }
        .highlight-link { position: relative; z-index: 1; color: #ffb19f; font-size: 10px; font-weight: 750; }

        .activity-panel .panel-header { padding-bottom: 11px; }
        .activity-list { padding: 0 19px 7px; }
        .activity-entry { position: relative; display: grid; grid-template-columns: 28px 1fr; gap: 10px; padding-bottom: 17px; }
        .activity-entry:not(:last-child)::after { position: absolute; top: 27px; bottom: 0; left: 13px; width: 1px; background: #e8efed; content: ""; }
        .activity-mark { position: relative; z-index: 1; display: grid; width: 27px; height: 27px; place-items: center; border: 1px solid #e5eeeb; border-radius: 50%; background: white; color: var(--teal-700); font-size: 11px; }
        .activity-mark.coral { color: var(--coral-600); }
        .activity-copy { padding-top: 2px; color: #526461; font-size: 10px; line-height: 1.55; }
        .activity-copy strong { color: #304643; font-weight: 700; }
        .activity-when { margin-top: 4px; color: #9aa6a3; font-size: 9px; }

        .footer-note { margin-top: 18px; color: #a1aeab; font-size: 10px; text-align: right; }
        .mobile-brand, .mobile-menu { display: none; }

        @media (max-width: 1100px) {
            .topbar { padding-right: 28px; padding-left: 28px; }
            main { padding-right: 28px; padding-left: 28px; }
            .sidebar { width: 218px; }
            .main-area { margin-left: 218px; }
            .listing-row { grid-template-columns: minmax(140px, 1.2fr) minmax(90px, .8fr) auto; }
            .listing-status { display: none; }
        }

        @media (max-width: 760px) {
            .sidebar { display: none; }
            .main-area { margin-left: 0; }
            .topbar { height: 62px; padding: 0 19px; }
            .mobile-brand { display: flex; align-items: center; gap: 8px; color: var(--teal-950); font-size: 15px; font-weight: 750; }
            .mobile-brand .brand-mark { width: 30px; height: 30px; border-radius: 9px; font-size: 17px; }
            .mobile-menu { display: grid; }
            .breadcrumb { display: none; }
            .date-label { display: none; }
            main { padding: 25px 19px 35px; }
            .welcome-row { align-items: flex-start; }
            .welcome-row .primary-button { min-height: 38px; padding: 0 11px; font-size: 10px; }
            .welcome-copy { max-width: 340px; line-height: 1.6; }
            .content-grid { grid-template-columns: 1fr; }
            .side-stack { grid-template-columns: 1fr 1fr; align-items: stretch; }
            .highlight-card { min-height: auto; }
            .activity-list { padding-bottom: 0; }
            .footer-note { text-align: center; }
        }

        @media (max-width: 520px) {
            .stats-grid { gap: 10px; }
            .stat-card { min-height: 117px; padding: 14px; }
            .stat-value { font-size: 24px; }
            .stat-label { max-width: 95px; line-height: 1.4; }
            .stat-foot { font-size: 9px; }
            .side-stack { grid-template-columns: 1fr; }
            .listing-tools { align-items: flex-start; flex-direction: column; }
            .search-box { width: 100%; }
            .listing-row { grid-template-columns: minmax(130px, 1fr) auto; gap: 8px; padding: 11px 14px; }
            .listing-location { display: none; }
            .panel-header { padding-right: 14px; padding-left: 14px; }
            .filters { width: 100%; }
            .filter-button { flex: 1; }
            .welcome-row { gap: 8px; }
            .welcome-row .primary-button { gap: 5px; padding: 0 9px; }
            h1 { font-size: 23px; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; }
        }
    </style>
</head>
<body>
<div class="app-shell">
    <aside class="sidebar" aria-label="เมนูหลัก">
        <a class="brand" href="#overview" aria-label="Find It หน้าภาพรวม">
            <span class="brand-mark" aria-hidden="true">f</span>
            <span><span class="brand-name">find it</span><span class="brand-caption">Lost &amp; Found · Campus</span></span>
        </a>

        <p class="nav-label">เมนูหลัก</p>
        <nav class="nav-list">
            <a class="nav-link active" href="#overview" aria-current="page"><span class="nav-icon" aria-hidden="true">⌂</span>ภาพรวม</a>
            <a class="nav-link" href="#listings"><span class="nav-icon" aria-hidden="true">▤</span>รายการทั้งหมด<span class="nav-count">24</span></a>
            <a class="nav-link" href="#listings" data-nav-filter="ของหาย"><span class="nav-icon" aria-hidden="true">⌕</span>แจ้งของหาย<span class="nav-count">8</span></a>
            <a class="nav-link" href="#listings" data-nav-filter="พบของ"><span class="nav-icon" aria-hidden="true">✓</span>แจ้งพบของ<span class="nav-count">16</span></a>
        </nav>

        <p class="nav-label">บัญชีของฉัน</p>
        <nav class="nav-list">
            <a class="nav-link" href="#activity"><span class="nav-icon" aria-hidden="true">◷</span>กิจกรรมล่าสุด</a>
            <a class="nav-link" href="#help"><span class="nav-icon" aria-hidden="true">?</span>ช่วยเหลือ</a>
        </nav>

        <div class="sidebar-spacer"></div>
        <section class="help-card" id="help">
            <strong>เจอของที่หายแล้วหรือยัง?</strong>
            <p>ลองค้นหารายการล่าสุด หรือแจ้งข้อมูลเพื่อช่วยตามหาได้เลย</p>
            <a href="#listings">ค้นหารายการ <span aria-hidden="true">→</span></a>
        </section>
        <div class="profile">
            <span class="avatar" aria-hidden="true">IT</span>
            <span><span class="profile-name">ทีม IT Talomlok</span><span class="profile-role">ผู้ดูแลระบบ</span></span>
        </div>
    </aside>

    <div class="main-area">
        <header class="topbar">
            <a class="mobile-brand" href="#overview"><span class="brand-mark" aria-hidden="true">f</span>find it</a>
            <div class="breadcrumb">พื้นที่ทำงาน <span>/</span> <strong>ภาพรวม</strong></div>
            <div class="topbar-actions">
                <span class="date-label"><?= htmlspecialchars(date('j M Y'), ENT_QUOTES, 'UTF-8') ?></span>
                <button class="icon-button mobile-menu" type="button" aria-label="ไปยังรายการล่าสุด" onclick="document.getElementById('listings').scrollIntoView({ behavior: 'smooth' })">⌕</button>
                <button class="icon-button" type="button" aria-label="การแจ้งเตือน"><span aria-hidden="true">♧</span><span class="notification-dot" aria-hidden="true"></span></button>
            </div>
        </header>

        <main id="overview">
            <section class="welcome-row" aria-labelledby="page-title">
                <div>
                    <p class="eyebrow">พื้นที่ส่วนกลางสำหรับทุกคน</p>
                    <h1 id="page-title">ภาพรวม Find It</h1>
                    <p class="welcome-copy">ช่วยกันตามหาของสำคัญ และส่งคืนให้ถึงมือเจ้าของ</p>
                </div>
                <a class="primary-button btn btn-primary" href="#listings"><span class="plus" aria-hidden="true">+</span> แจ้งรายการใหม่</a>
            </section>

            <section class="stats-grid row g-3" aria-label="สถิติภาพรวม">
                <div class="col-6 col-xl-3"><article class="stat-card card h-100">
                    <div class="stat-top"><span class="stat-label">รายการทั้งหมด</span><span class="stat-icon teal" aria-hidden="true">▤</span></div>
                    <div class="stat-value">24</div>
                    <div class="stat-foot"><span class="trend">↗ 12%</span> <span>จากสัปดาห์ที่แล้ว</span></div>
                </article></div>
                <div class="col-6 col-xl-3"><article class="stat-card card h-100">
                    <div class="stat-top"><span class="stat-label">รอเจ้าของมารับ</span><span class="stat-icon coral" aria-hidden="true">⌕</span></div>
                    <div class="stat-value">08</div>
                    <div class="stat-foot"><span class="trend coral">4 รายการใหม่</span> <span>ในสัปดาห์นี้</span></div>
                </article></div>
                <div class="col-6 col-xl-3"><article class="stat-card card h-100">
                    <div class="stat-top"><span class="stat-label">พบของแล้ว</span><span class="stat-icon sand" aria-hidden="true">✓</span></div>
                    <div class="stat-value">16</div>
                    <div class="stat-foot"><span class="trend">↗ 8%</span> <span>จากสัปดาห์ที่แล้ว</span></div>
                </article></div>
                <div class="col-6 col-xl-3"><article class="stat-card card h-100">
                    <div class="stat-top"><span class="stat-label">ส่งคืนสำเร็จ</span><span class="stat-icon blue" aria-hidden="true">♡</span></div>
                    <div class="stat-value">12</div>
                    <div class="stat-foot"><span class="trend">ขอบคุณทุกคน</span> <span>ที่ช่วยเหลือกัน</span></div>
                </article></div>
            </section>

            <div class="content-grid row g-3">
                <section class="panel card col-12 col-lg-8" id="listings" aria-labelledby="listings-title">
                    <div class="panel-header card-header">
                        <div>
                            <h2 class="panel-title" id="listings-title">รายการล่าสุด</h2>
                            <p class="panel-subtitle">ติดตามของหายและของที่พบในพื้นที่</p>
                        </div>
                        <a class="text-link" href="#listings">ดูทั้งหมด <span aria-hidden="true">→</span></a>
                    </div>
                    <div class="listing-tools">
                        <div class="filters" role="group" aria-label="กรองรายการ">
                            <button class="filter-button btn btn-sm active" type="button" data-filter="ทั้งหมด" aria-pressed="true">ทั้งหมด</button>
                            <button class="filter-button btn btn-sm" type="button" data-filter="ของหาย" aria-pressed="false">ของหาย</button>
                            <button class="filter-button btn btn-sm" type="button" data-filter="พบของ" aria-pressed="false">พบของ</button>
                        </div>
                        <label class="search-box">
                            <span aria-hidden="true">⌕</span>
                            <input class="form-control form-control-sm" id="listing-search" type="search" placeholder="ค้นหาชื่อหรือสถานที่" aria-label="ค้นหารายการ">
                        </label>
                    </div>
                    <div class="listing-list" id="listing-list">
                        <?php foreach ($listings as $listing): ?>
                            <article class="listing-row" data-type="<?= htmlspecialchars($listing['type'], ENT_QUOTES, 'UTF-8') ?>">
                                <div class="listing-item">
                                    <span class="item-art <?= htmlspecialchars($listing['color'], ENT_QUOTES, 'UTF-8') ?>" aria-hidden="true"><?= htmlspecialchars($listing['icon'], ENT_QUOTES, 'UTF-8') ?></span>
                                    <span>
                                        <span class="item-name"><?= htmlspecialchars($listing['item'], ENT_QUOTES, 'UTF-8') ?></span>
                                        <span class="item-detail"><?= htmlspecialchars($listing['detail'], ENT_QUOTES, 'UTF-8') ?></span>
                                    </span>
                                </div>
                                <div class="listing-location">
                                    <div class="location-name"><?= htmlspecialchars($listing['location'], ENT_QUOTES, 'UTF-8') ?></div>
                                    <div class="listing-time"><?= htmlspecialchars($listing['time'], ENT_QUOTES, 'UTF-8') ?></div>
                                </div>
                                <div class="listing-status">
                                    <span class="type-badge badge <?= $listing['type'] === 'ของหาย' ? 'lost' : '' ?>"><?= htmlspecialchars($listing['type'], ENT_QUOTES, 'UTF-8') ?></span>
                                </div>
                                <div class="listing-status">
                                    <span class="avatar" title="<?= htmlspecialchars($listing['name'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($listing['initials'], ENT_QUOTES, 'UTF-8') ?></span>
                                </div>
                            </article>
                        <?php endforeach; ?>
                        <div class="empty-state" id="empty-state">ไม่พบรายการที่ตรงกับการค้นหา</div>
                    </div>
                </section>

                <aside class="side-stack col-12 col-lg-4">
                    <section class="panel highlight-card card" aria-labelledby="highlight-title">
                        <div class="highlight-label" id="highlight-title">พลังของชุมชน</div>
                        <div class="highlight-number">12 <span style="font-size:15px;font-weight:600">ชิ้น</span></div>
                        <p class="highlight-copy">สิ่งของที่ได้กลับคืนสู่เจ้าของ ด้วยความช่วยเหลือจากทุกคน</p>
                        <a class="highlight-link" href="#activity">ดูความเคลื่อนไหว <span aria-hidden="true">→</span></a>
                    </section>

                    <section class="panel activity-panel card" id="activity" aria-labelledby="activity-title">
                        <div class="panel-header card-header">
                            <div>
                                <h2 class="panel-title" id="activity-title">กิจกรรมล่าสุด</h2>
                                <p class="panel-subtitle">อัปเดตจากชุมชน</p>
                            </div>
                            <a class="text-link" href="#activity" aria-label="ดูกิจกรรมทั้งหมด">···</a>
                        </div>
                        <div class="activity-list">
                            <div class="activity-entry">
                                <span class="activity-mark" aria-hidden="true">✓</span>
                                <div class="activity-copy"><strong>กระเป๋าสตางค์</strong> ถูกแจ้งว่าพบแล้ว<div class="activity-when">วันนี้ · 09:20 น.</div></div>
                            </div>
                            <div class="activity-entry">
                                <span class="activity-mark coral" aria-hidden="true">+</span>
                                <div class="activity-copy"><strong>กุญแจรถ</strong> ถูกแจ้งว่าสูญหาย<div class="activity-when">วันนี้ · 08:45 น.</div></div>
                            </div>
                            <div class="activity-entry">
                                <span class="activity-mark" aria-hidden="true">♡</span>
                                <div class="activity-copy"><strong>หูฟังไร้สาย</strong> ส่งคืนเจ้าของแล้ว<div class="activity-when">เมื่อวาน · 16:10 น.</div></div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
            <p class="footer-note">ข้อมูลตัวอย่างสำหรับแสดงผล · Find It ช่วยกันหา ส่งคืนด้วยใจ</p>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script>
    (() => {
        const rows = Array.from(document.querySelectorAll('.listing-row'));
        const buttons = Array.from(document.querySelectorAll('.filter-button'));
        const search = document.getElementById('listing-search');
        const emptyState = document.getElementById('empty-state');
        let selectedType = 'ทั้งหมด';

        const updateListings = () => {
            const query = search.value.trim().toLocaleLowerCase();
            let visibleCount = 0;

            rows.forEach((row) => {
                const matchesType = selectedType === 'ทั้งหมด' || row.dataset.type === selectedType;
                const matchesQuery = row.textContent.toLocaleLowerCase().includes(query);
                row.hidden = !matchesType || !matchesQuery;
                if (!row.hidden) visibleCount += 1;
            });

            emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
        };

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                selectedType = button.dataset.filter;
                buttons.forEach((item) => {
                    const isActive = item === button;
                    item.classList.toggle('active', isActive);
                    item.setAttribute('aria-pressed', String(isActive));
                });
                updateListings();
            });
        });

        search.addEventListener('input', updateListings);

        document.querySelectorAll('[data-nav-filter]').forEach((link) => {
            link.addEventListener('click', () => {
                const target = buttons.find((button) => button.dataset.filter === link.dataset.navFilter);
                if (target) target.click();
            });
        });
    })();
</script>
</body>
</html>
