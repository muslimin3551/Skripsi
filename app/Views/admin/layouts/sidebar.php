<?php
$uri = service('uri')->getSegments();
$uri1 = $uri[1] ?? 'index';
$uri2 = $uri[1] ?? '';
$uri3 = $uri[3] ?? '';
?>

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo text-center">
                    <a href="index.html"><img src="/img/logo.png" alt="Logo"></a>
                    <p style="font-size: 14px;">MI AL-MUBARAK ADMIN PANEL</p>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">MENU UTAMA</li>

                <li class="sidebar-item <?= ($uri1 == 'dashboard') ? 'active' : '' ?> ">
                    <a href="/admin/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri2 == 'payment') ? 'active' : '' ?>">
                    <a href="/admin/payment" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Pembayaran</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri2 == 'invoice') ? 'active' : '' ?>">
                    <a href="/admin/invoice" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Tagihan</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'student' || $uri1 == 'class' || $uri1 == 'student_type' || $uri1 == 'item') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'student' || $uri1 == 'class' || $uri1 == 'student_type' || $uri1 == 'item') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == 'student') ? 'active' : '' ?>">
                            <a href="/admin/student">Siswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'class') ? 'active' : '' ?>">
                            <a href="/admin/class">Kelas</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'student_type') ? 'active' : '' ?>">
                            <a href="/admin/student_type">Jebis Siswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'item') ? 'active' : '' ?>">
                            <a href="/admin/item">Item</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'role' || $uri == 'role_access') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Rol & Akses</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'role' || $uri == 'role_access') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == 'role') ? 'active' : '' ?>">
                            <a href="/admin/role">Rol</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'role_access') ? 'active' : '' ?>">
                            <a href="/admin/role_access">Akses</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item <?= ($uri2 == 'user') ? 'active' : '' ?>">
                    <a href="/admin/user" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>User</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri2 == 'layout') ? 'active' : '' ?>">
                    <a href="<?= base_url('/admin/logout') ?>" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
