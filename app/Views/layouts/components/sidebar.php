<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        
    </div>
    <div class="sidebar-brand-text mx-3">Pengaduan Masyarakat <sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<?php
if(session('level')=='admin'){
  ?>
<li class="nav-item">
    <a class="nav-link" href="/petugas"> 
        <i class="fas fa-fw fa-user"></i>
        <span>Petugas</span>
    </a>
</li>
<?php
}
?>
<?php
if(session('level')!="masyarakat"){
?>
<li class="nav-item">
    <a class="nav-link" href="/masyarakat"> 
        <i class="fas fa-fw fa-users"></i>
        <span>Masyarakat</span>
    </a>
</li>
<!-- Nav Item - Utilities Collapse Menu -->

<li class="nav-item">
    <a class="nav-link" href="charts.html"> 
        <i class="fas fa-fw fa-file"></i>
        <span>Tanggapan</span>
    </a>
</li>
<?php
}
?>
<?php
//if(session('nik')!=null){
  ?>
<li class="nav-item">
    <a class="nav-link" href="/pengaduan"> 
        <i class="fas fa-fw fa-comment"></i>
        <span>Pengaduan</span>
    </a>
</li>
<?php
//}
?>
<?php if(!empty(session()->get('loged_in'))) : ?>
    <li class="nav-item">
        <a href="/logout" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span>
        </a>
    </li>
<?php endif ?>
<!-- Divider -->

<!-- Nav Item - Pages Collapse Menu -->

<!-- Nav Item - Charts -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->


</ul>
<!-- End of Sidebar -->