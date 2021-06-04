    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php $i = $this->uri->segment(2) ?>
                    <li class="<?php if ($i == 'dashboard') { echo "active";} ?>">
                        <a href="<?php echo site_url('admin/dashboard/read'); ?>"><i class="menu-icon ti-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Web management</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown <?php if ($i == 'category') { echo "active";} ?> <?= $level == 'author' ? 'd-none' : '' ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-view-grid"></i>Kategori</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-control-record"></i><a href="<?php echo site_url('admin/category/read'); ?>">Lihat Kategori</a></li>
                            <li><i class="menu-icon ti-plus"></i><a href="<?php echo site_url('admin/category/insert'); ?>">Tambah Kategori</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown <?php if ($i == 'article') { echo "active";} ?> <?= $level == 'author' ? 'd-none' : '' ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-write"></i>Artikel</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-control-record"></i><a href="<?php echo site_url('admin/article/read'); ?>">Lihat Artikel</a></li>
                            <li><i class="menu-icon ti-plus"></i><a href="<?php echo site_url('admin/article/insert'); ?>">Tambah Artikel</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown <?php if ($i == 'article') { echo "active";} ?> <?= $level == 'author' ? '' : 'd-none' ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-write"></i>Artikel</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-control-record"></i><a href="<?php echo site_url('admin/article/author'); ?>">Lihat Artikel</a></li>
                            <li><i class="menu-icon ti-plus"></i><a href="<?php echo site_url('admin/article/insert'); ?>">Tambah Artikel</a></li>
                        </ul>
                    </li>
                    <li class="<?php if ($i == 'guestbook') { echo "active";} ?> <?= $level == 'author' ? 'd-none' : '' ?>">
                        <a href="<?php echo site_url('admin/guestbook/read'); ?>"> <i class="menu-icon ti-book"></i>Buku tamu</a>
                    </li>
                    <li class="<?php if ($i == 'forum') { echo "active";} ?> <?= $level == 'author' ? 'd-none' : '' ?>">
                        <a href="<?php echo site_url('admin/forum/read'); ?>"> <i class="menu-icon ti-help-alt"></i>Forum</a>
                    </li>
                    <li class="menu-title <?= $level == 'author' ? 'd-none' : '' ?>">User management</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown <?php if ($i == 'user') { echo "active";} ?> <?= $level == 'author' ? 'd-none' : '' ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-user"></i>User</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-control-record"></i><a href="<?php echo site_url('admin/user/read'); ?>">Lihat User</a></li>
                            <li><i class="menu-icon ti-plus"></i><a href="<?php echo site_url('admin/user/insert'); ?>">Tambah User</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->