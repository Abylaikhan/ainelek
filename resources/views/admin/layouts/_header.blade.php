<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('administrator.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i> Выйти
                </a>
                <form id="logout-form" action="{{ route('administrator.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
<section class="padding-y-100 bg-cover bg-center jarallax" data-dark-overlay="7"
         style="background: url(/img/1920/550.jpg) no-repeat">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto text-center text-white">

                <h5 class="font-size-md-40 mb-4">
                    <?= Yii::t('main', 'School-Lyceum “SilkWay” accepts students in grades 1-11 for the new school year 2020-2021'); ?>

                </h5>
                <a href="/<?= $lang; ?>/site/request"
                   class="btn btn-primary"><?= Yii::t('main', 'Registration for the reception'); ?></a>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
