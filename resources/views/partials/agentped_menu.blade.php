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

        <li class="has-child {{ Request::is(app()->getLocale().'/evaluation/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/evaluation/*') ? 'active':'' }}">
                <span class="nav-icon las la-pen-alt"></span>
                <span class="menu-text">Evaluations</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/evaluation') ? 'active':'' }}" href="{{ route('evaluation.list',app()->getLocale()) }}">Liste des évaluations</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/evaluation/create') ? 'active':'' }}" href="{{ route('evaluation.create',app()->getLocale()) }}">Ajouter une évaluation</a></li>
            </ul>
        </li>

        <li class="has-child {{ Request::is(app()->getLocale().'/evaluation/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/evaluation/*') ? 'active':'' }}">
                <span class="nav-icon las la-book"></span>
                <span class="menu-text">UE</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/evaluation') ? 'active':'' }}" href="{{ route('evaluation.list',app()->getLocale()) }}">Liste des UE</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/evaluation/create') ? 'active':'' }}" href="{{ route('evaluation.create',app()->getLocale()) }}">Ajouter une UE</a></li>
            </ul>
        </li>

        <li class="has-child {{ Request::is(app()->getLocale().'/evaluation/*') ? 'open':'' }}">
            <a href="#" class="{{ Request::is(app()->getLocale().'/evaluation/*') ? 'active':'' }}">
                <span class="nav-icon las la-clipboard"></span>
                <span class="menu-text">Cours</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="{{ Request::is(app()->getLocale().'/evaluation') ? 'active':'' }}" href="{{ route('evaluation.list',app()->getLocale()) }}">Liste des UE</a></li>
                <li><a class="{{ Request::is(app()->getLocale().'/evaluation/create') ? 'active':'' }}" href="{{ route('evaluation.create',app()->getLocale()) }}">Ajouter une UE</a></li>
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
