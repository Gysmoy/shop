<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.php">Mozo en línea</a>
    <a class="sidebar-brand brand-logo-mini" href="index.php">M</a>
</div>
<ul class="nav">
<li class="nav-item profile">
    <div class="profile-desc">
    <div class="profile-pic">
        <div class="count-indicator">
        <img class="img-xs rounded-circle " src="assets/php/image.php?id=
        <?php echo $_SESSION['user' ]['id']; ?>" alt="profile">
        <span class="count bg-success"></span>
        </div>
        <div class="profile-name">
        <h5 class="mb-0 font-weight-normal"><?php echo ( $_SESSION['user']['names']); ?></h5>
        <span title="<?php echo $_SESSION['rol']['description']; ?>"><?php echo $_SESSION['rol']['name']; ?></span>
        </div>
    </div>
    <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
        <a href="#" class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
            <i class="mdi mdi-settings text-primary"></i>
            </div>
        </div>
        <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">Configuración de cuenta</p>
        </div>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
            <i class="mdi mdi-onepassword  text-info"></i>
            </div>
        </div>
        <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">Cambiar contraseña</p>
        </div>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
            <i class="mdi mdi-calendar-today text-success"></i>
            </div>
        </div>
        <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
        </div>
        </a>
    </div>
    </div>
</li>
<li class="nav-item nav-category">
    <span class="nav-link">Panel de navegación</span>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="index.php">
    <span class="menu-icon">
        <i class="mdi mdi-home"></i>
    </span>
    <span class="menu-title">Inicio</span>
    </a>
</li>

<li class="nav-item menu-items">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
    <span class="menu-icon">
        <i class="mdi mdi-account-multiple"></i>
    </span>
    <span class="menu-title">Usuarios</span>
    <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
    <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="business.php">Empresas</a></li>
        <li class="nav-item"> <a class="nav-link" href="clients.php">Clientes</a></li>
        <li class="nav-item"> <a class="nav-link" href="marketers.php">Marketeros</a></li>
    </ul>
    </div>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="pages/forms/basic_elements.html">
    <span class="menu-icon">
        <i class="mdi mdi-playlist-play"></i>
    </span>
    <span class="menu-title">Form Elements</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="pages/tables/basic-table.html">
    <span class="menu-icon">
        <i class="mdi mdi-table-large"></i>
    </span>
    <span class="menu-title">Tables</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="pages/charts/chartjs.html">
    <span class="menu-icon">
        <i class="mdi mdi-chart-bar"></i>
    </span>
    <span class="menu-title">Charts</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="pages/icons/mdi.html">
    <span class="menu-icon">
        <i class="mdi mdi-contacts"></i>
    </span>
    <span class="menu-title">Icons</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
    <span class="menu-icon">
        <i class="mdi mdi-security"></i>
    </span>
    <span class="menu-title">Administradores</span>
    <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="auth">
    <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="users.php">Usuarios</a></li>
        <li class="nav-item"> <a class="nav-link" href="roles.php">Roles</a></li>
    </ul>
    </div>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
    <span class="menu-icon">
        <i class="mdi mdi-file-document-box"></i>
    </span>
    <span class="menu-title">Documentation</span>
    </a>
</li>
</ul>