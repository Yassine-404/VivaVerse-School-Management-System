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
            <a href="{{ route('notes.notesForm',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/notes') ? 'active':'' }}">
                <span class="nav-icon las la-pen-alt"></span>
                <span class="menu-text">Renseigner les notes</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pages.setting',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/calendar') ? 'active':'' }}">
                <span class="nav-icon uil uil-calender"></span>
                <span class="menu-text">Emploi du temps</span>
            </a>
        </li>
    </ul>
</div>
