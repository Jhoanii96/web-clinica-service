<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo" style="background: url('<?= FOLDER_PATH ?>/src/assets/media/images/logo-inverse.png') no-repeat">
        <div class="logo-src" style="background: url('<?= FOLDER_PATH ?>/src/assets/media/images/logo.png') no-repeat"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Panel de administración</li>
                <li>
                    <!-- <a href="index.html" class="mm-active"> -->
                    <a href="<?= FOLDER_PATH ?>/my">
                        <i class="metismenu-icon pe-7s-home"></i>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="<?= FOLDER_PATH ?>/appointment">
                        <i class="metismenu-icon pe-7s-note"></i>
                        Citas
                    </a>
                </li>
                <li>
                    <a href="<?= FOLDER_PATH ?>/suggestions">
                        <i class="metismenu-icon pe-7s-comment"></i>
                        Sugerencias
                    </a>
                </li>
                <li>
                    <a href="<?= FOLDER_PATH ?>/Reports">
                        <i class="metismenu-icon pe-7s-display1"></i>
                        Reportes
                    </a>
                </li>
                <li>
                    <a href="<?= FOLDER_PATH ?>/Payments">
                        <i class="metismenu-icon pe-7s-cash"></i>
                        Pagos
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Cuestionario
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>

                    <ul>
                        <li>
                            <a href="<?= FOLDER_PATH ?>/questionnaire/manage">
                                Administrar
                            </a>
                        </li>
                        <li>
                            <a href="<?= FOLDER_PATH ?>/questionnaire/list">
                                Listado
                            </a>
                        </li>
                        <!-- <li>
                                        <a href="elements-utilities.html">
                                            <i class="metismenu-icon">
                                            </i>Utilities
                                        </a>
                                    </li> -->
                    </ul>
                </li>
                <li>
                    <a href="<?= FOLDER_PATH ?>/setting">
                        <i class="metismenu-icon pe-7s-config"></i>
                        Configuración
                    </a>
                </li>
                <li>
                    <a href="<?= FOLDER_PATH ?>/help">
                        <i class="metismenu-icon pe-7s-help1"></i>
                        Ayuda
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>