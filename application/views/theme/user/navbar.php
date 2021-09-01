<div class="logo__container">
    <h1><a href="http://localhost/ngobatin/admin/user" target="_blank"><img class="logo" src="<?= base_url('./images/logo.png'); ?>" alt="logo"> Ngobatin<span>.</span></a></h1>
</div>
<nav class="navbar">
    <ul class="nav__links my-auto">
        <?php $i = $this->uri->segment(1) ?>
        <li><a href="<?= base_url('home/read'); ?>" class="<?php if ($i == 'home') { echo "active";} ?>">Beranda</a></li>
        <li><a href="<?= base_url('about/read'); ?>" class="<?php if ($i == 'about') { echo "active";} ?>">Tentang</a></li>
        <li><a href="<?= base_url('article/read'); ?>" class="<?php if ($i == 'article') { echo "active";} ?>" >Artikel</a></li>
        <li><a href="<?= base_url('forum/read'); ?>" class="<?php if ($i == 'forum') { echo "active";} ?>">Forum</a></li>
        <!-- <li><a class="button button__primary" href="detail.html"><i class="fas fa-hand-holding-usd"></i></a></li> -->
    </ul>
    <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
</nav>