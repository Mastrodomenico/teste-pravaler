<div class="app-sidebar sidebar-shadow">
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ (request()->is('dashboard')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('institutions.index') }}" class="{{ (request()->is('institutions')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-culture"></i>
                        Instituição
                    </a>
                </li>
                <li>
                    <a href="{{ route('courses.index') }}" class="{{ (request()->is('courses')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-bookmarks"></i>
                        Cursos
                    </a>
                </li>
                <li>
                    <a href="{{ route('students.index') }}" class="{{ (request()->is('students')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Alunos
                    </a>
                </li>
                <li class="app-sidebar__heading">Configurações</li>
                <li>
                    <a href="{{ route('users.index') }}" class="{{ (request()->is('users')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-user"></i>
                        Usuários
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
