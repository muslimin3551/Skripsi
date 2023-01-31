<?php
$uri = service('uri')->getSegments();
$uri1 = $uri[1] ?? 'index';
$uri2 = $uri[2] ?? '';
$uri3 = $uri[3] ?? '';
?>

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo text-center">
                    <a href="index.html"><img src="/img/logo.png" width="50px" height="100px" alt="Logo"></a>
                    <p style="font-size: 20px;">MI AL-MUBARAK</p>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">MENU UTAMA</li>

                <li class="sidebar-item <?= ($uri1 == 'index') ? 'active' : '' ?> ">
                    <a href="/mazer" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri2 == 'layout') ? 'active' : '' ?>">
                    <a href="/mazer/forms/layout" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Pembayaran</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri2 == 'layout') ? 'active' : '' ?>">
                    <a href="/mazer/forms/layout" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Tagihan</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'layouts') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'layouts') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == 'default') ? 'active' : '' ?>">
                            <a href="/mazer/layouts/default">Siswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == '1-column') ? 'active' : '' ?>">
                            <a href="/mazer/layouts/1-column">Kelas</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'vertical-navbar') ? 'active' : '' ?>">
                            <a href="/mazer/layouts/vertical-navbar">Jebis Siswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'horizontal') ? 'active' : '' ?>">
                            <a href="/mazer/layouts/horizontal">Item</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'layouts') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Rol & Akses</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'layouts') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == 'default') ? 'active' : '' ?>">
                            <a href="/mazer/layouts/default">Rol</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == '1-column') ? 'active' : '' ?>">
                            <a href="/mazer/layouts/1-column">Akses</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item <?= ($uri2 == 'layout') ? 'active' : '' ?>">
                    <a href="/mazer/forms/layout" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>User</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri2 == 'layout') ? 'active' : '' ?>">
                    <a href="/mazer/forms/layout" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Logout</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                        <i class="bi bi-cash"></i>
                        <span>Donate</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
