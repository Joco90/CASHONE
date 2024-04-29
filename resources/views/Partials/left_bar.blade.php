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
                                <i class="metismenu-icon"></i>
                               Profiles et droits
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('profile')}}">
                                        <i class="pe-7s-plus"></i>
                                      Profiles
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="pe-7s-plus"></i>
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
                                Gestion des utilisateurs
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('users.liste')}}">
                                        <i class="pe-7s-plus"></i>
                                        Standard
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="pe-7s-plus"></i>
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
                                    <a href="">
                                        <i class="pe-7s-plus"></i>
                                      Enregistrement
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-standard.html">
                                        <i class="pe-7s-plus"></i>
                                      Paramétrage
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('reprise.cashonev4')}}">
                                        <i class="pe-7s-plus"></i>
                                      Chaine de reprise
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
                                        <i class="pe-7s-plus"></i>
                                        Enregistrement
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-buttons-standard.html">
                                        <i class="pe-7s-plus"></i>
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
                        <i class="metismenu-icon pe-7s-notebook"></i>
                        Codes analytiques
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="">
                                <i class="pe-7s-global"></i>
                                Société
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-culture"></i>
                               Banques
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Comptes bancaires
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Gestionnaires
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Catégories tiers
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Tiers
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Tiers - Interlocuteurs
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Pôles
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Directions
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Sous - Directions
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Centres imputation
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Devises
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Caisses
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Services
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Tâches
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-notebook"></i>
                        Codes opérations
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('/code-operation/nature-comptable') }}">
                                <i class="pe-7s-plus"></i>
                                Natures comptables
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/code-operation/liste-correspondance') }}">
                                <i class="pe-7s-plus"></i>
                               Correspondance CN - Comptabilité
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Codes interbancaires
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Correspondance CIB - Relevés Bancaires
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Motifs règlements
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Modes paiements
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Motifs de rejets
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Motifs blocages
                            </a>
                        </li>
                        <li>
                            <a href="{{route('typeContrat.liste')}}">
                                <i class="pe-7s-plus"></i>
                                Types de contrat
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Types de dossiers
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Calendrier
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-notebook"></i>
                        Personnel
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('personel.liste')}}">
                                <i class="pe-7s-plus"></i>
                                Ajouter
                            </a>
                        </li>
                        <li>
                            <a href="{{route('importation.personel')}}">
                                <i class="pe-7s-download"></i>
                                Importer
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-search"></i>
                                Recherche
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="app-sidebar__heading">Gestion des cartes</li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-notebook"></i>
                        Saisie des cartes
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Ajout de cartes bancaires
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-download"></i>
                                Importation des cartes
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-search"></i>
                                Recherche de cartes
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-notebook"></i>
                        Demandes de cartes
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Saisie d'une demande
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Transmission de damandde
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Validation de damande
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Edition et traitement de cartes
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Réception de cartes
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Sécurisation de cartes
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                                Alertes
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="pe-7s-plus"></i>
                               Remise de cartes
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-notebook"></i>
                        Rechargement des cartes
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li class="">
                            <a href="#">
                                <i class="pe-7s-folder"></i>
                                Bordereaux de paiement
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul class="mm-show">
                                <li>
                                    <a href="">
                                        <i class="pe-7s-plus"></i>
                                        Importation bon LOGEB
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="pe-7s-plus"></i>
                                        Réception des borderaux
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="pe-7s-plus"></i>
                                        Transmission pour contrôle
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="pe-7s-plus"></i>
                                        Réception contrôle
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="pe-7s-plus"></i>
                                        Contrôle
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="pe-7s-plus"></i>
                                        Constitution borderaux
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="pe-7s-plus"></i>
                                        Génération de remises
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="pe-7s-plus"></i>
                                        Clôture de remises
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
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
