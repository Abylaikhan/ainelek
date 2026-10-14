<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link text-center">
        <span class="brand-text text-bold">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link {{ route('admin.index') == request()->url() ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Главная</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Блог</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.features.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Услуги</p>
                    </a>
                </li>
                <li class="nav-header">Доп. инфо</li>
                <li class="nav-item">
                    <a href="{{ route('admin.advantages.index') }}" class="nav-link {{ request()->routeIs('admin.advantages.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-rocket"></i>
                        <p>Преимущества</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Слайдер</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Страницы</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.staff.index') }}" class="nav-link {{ request()->routeIs('admin.staffAdmin.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Персонал</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.reviews.index') }}" class="nav-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>Отзывы</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question"></i>
                        <p>FAQ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.galleries.index') }}" class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Галерея</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-phone"></i>
                        <p>Контакты</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link" target="_blank">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Перейти на сайт</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
