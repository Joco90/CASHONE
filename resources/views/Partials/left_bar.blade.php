<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ms-auto">
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
                <li class="app-sidebar__heading">Administration</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-id"></i>
                        Utilisateurs et profiles
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-config"></i>
                               Profiles et droits
                                <i class="metismenu-state-icon caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('profile')}}">
                                        <i class="metismenu-icon"></i>
                                      Profiles
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon"></i>
                                      Droits
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon"></i>
                                Utilisateurs et mot de passe
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('users.liste')}}">
                                        <i class="metismenu-icon"></i>
                                        Standard
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-standard.html">
                                        <i class="metismenu-icon"></i>
                                        Système
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-server"></i>
                        Sources de données
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon"></i>
                               Sources internes
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="elements-buttons-standard.html">
                                        <i class="metismenu-icon"></i>
                                      Enregistrement
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-standard.html">
                                        <i class="metismenu-icon"></i>
                                      Paramétrage
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon"></i>
                                Sources Externes
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="elements-buttons-standard.html">
                                        <i class="metismenu-icon"></i>
                                        Enregistrement
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-standard.html">
                                        <i class="metismenu-icon"></i>
                                        Paramétrage
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>


                <li class="app-sidebar__heading">Paramétrages générales</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Elements
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon"></i>
                                Buttons
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="elements-buttons-standard.html">
                                        <i class="metismenu-icon"></i>
                                        Standard
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-pills.html">
                                        <i class="metismenu-icon"></i>
                                        Pills
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-square.html">
                                        <i class="metismenu-icon"></i>
                                        Square
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-shadow.html">
                                        <i class="metismenu-icon"></i>
                                        Shadow
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-icons.html">
                                        <i class="metismenu-icon"></i>
                                        With Icons
                                    </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </li>

                <li class="app-sidebar__heading">Gestion des cartes</li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Elements
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon"></i>
                                Buttons
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="elements-buttons-standard.html">
                                        <i class="metismenu-icon"></i>
                                        Standard
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-pills.html">
                                        <i class="metismenu-icon"></i>
                                        Pills
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-square.html">
                                        <i class="metismenu-icon"></i>
                                        Square
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-shadow.html">
                                        <i class="metismenu-icon"></i>
                                        Shadow
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-icons.html">
                                        <i class="metismenu-icon"></i>
                                        With Icons
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="widgets-profile-boxes.html">
                        <i class="metismenu-icon pe-7s-id"></i>
                        Profile Boxes
                    </a>
                </li>
                <li class="app-sidebar__heading">Règlements</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-light"></i>
                        Elements
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="forms-controls.html">
                                <i class="metismenu-icon"></i>
                                Controls
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-joy"></i>
                        Widgets
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>

                        <li>
                            <a href="forms-range-slider.html">
                                <i class="metismenu-icon"></i>
                                Range Slider
                            </a>
                        </li>
                        <li>
                            <a href="forms-input-selects.html">
                                <i class="metismenu-icon"></i>
                                Input Selects
                            </a>
                        </li>

                        <li>
                            <a href="forms-textarea-autosize.html">
                                <i class="metismenu-icon"></i>
                                Textarea Autosize
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Controle caisses</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-light"></i>
                        Elements
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="forms-controls.html">
                                <i class="metismenu-icon"></i>
                                Controls
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-joy"></i>
                        Widgets
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>

                        <li>
                            <a href="forms-range-slider.html">
                                <i class="metismenu-icon"></i>
                                Range Slider
                            </a>
                        </li>
                        <li>
                            <a href="forms-input-selects.html">
                                <i class="metismenu-icon"></i>
                                Input Selects
                            </a>
                        </li>

                        <li>
                            <a href="forms-textarea-autosize.html">
                                <i class="metismenu-icon"></i>
                                Textarea Autosize
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">Factures fournisseurs</li>
                <li>
                    <a href="charts-chartjs.html">
                        <i class="metismenu-icon pe-7s-graph2"></i>
                        ChartJS
                    </a>
                </li>
                <li class="app-sidebar__heading">Reportings</li>
                <li>
                    <a href="charts-chartjs.html">
                        <i class="metismenu-icon pe-7s-graph2"></i>
                        ChartJS
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
