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
        <li>
            <a href="{{ route('pages.setting',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/setting') ? 'active':'' }}">
                <span class="nav-icon uil uil-chart"></span>
                <span class="menu-text">Consulter les notes</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pages.setting',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/setting') ? 'active':'' }}">
                <span class="nav-icon uil uil-calender"></span>
                <span class="menu-text">Emploi du temps</span>
            </a>
        </li>
        <li class="has-child {{ Request::is(app()->getLocale().'/applications/email/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/applications/email/*') ? 'active':'' }}">
                <span class="nav-icon las la-file"></span>
                <span class="menu-text">Documents</span>
                <span class="badge badge-success menuItem rounded-circle">1</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/email/inbox') ? 'active':'' }}" href="{{ route('table.data',app()->getLocale()) }}">Relevé des notes</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/applications/email/read') ? 'active':'' }}" href="{{ route('email.read',app()->getLocale()) }}">Certificat de scolarité</a></li>
            </ul>
        </li>
    </ul>
</div>
