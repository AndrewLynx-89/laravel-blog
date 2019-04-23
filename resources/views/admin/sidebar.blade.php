<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="/"><i class="fa fa-code"></i><span>Сайт</span></a></li>
            <li><a href="/admin"><i class="fa fa-dashboard"></i> <span>Админ-панель</span></a></li>
            <li><a href="/admin/articles"><i class="fa fa-sticky-note-o"></i> <span>Посты</span></a></li>
            <li><a href="/admin/categories"><i class="fa fa-list-ul"></i> <span>Категории</span></a></li>
            <li><a href="/admin/tags"><i class="fa fa-tags"></i> <span>Теги</span></a></li>
            <li>
                <a href="/admin/comments">
                    <i class="fa fa-commenting"></i> <span>Комментарии</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green">{{$newCommentsCount}}</small>
            </span>
                </a>
            </li>
            <li><a href="/admin/users"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
            <li><a href="/admin/uploads"><i class="fa fa-users"></i> <span>Загрузки</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>