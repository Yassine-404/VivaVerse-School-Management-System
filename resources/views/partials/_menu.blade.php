<div class="sidebar__menu-group">
    <ul class="sidebar_nav">
        <li>
            <a href="{{ route('dashboard.agentscolarite',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/dashboards/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-dashboard"></span>
                <span class="menu-text">Tableau de bord</span>
            </a>
        </li>
        
        <li class="menu-title mt-30">
            <span>Modules</span>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/applications/email/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/email/*') ? 'active':'' }}">
                <span class="nav-icon las la-users"></span>
                <span class="menu-text">Etudiants</span>
                <span class="badge badge-success menuItem rounded-circle">3</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/etudiant/list') ? 'active':'' }}" href="{{ route('etudiant.list',app()->getLocale()) }}">Liste des étudiants</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/etudiant/create') ? 'active':'' }}" href="{{ route('etudiant.create',app()->getLocale()) }}">Ajouter un étudiant</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('pages.setting',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/setting') ? 'active':'' }}">
                <span class="nav-icon uil uil-setting"></span>
                <span class="menu-text">Parametres</span>
            </a>
        </li>
    </ul>
</div>
