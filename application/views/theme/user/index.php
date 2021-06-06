<!DOCTYPE html>
<html lang="en">

    <!-- load head -->
    <?php $this->load->view('theme/user/head'); ?>

    <header>
        <!-- Load navbar -->
        <?php $this->load->view('theme/user/navbar'); ?>
    </header>

    <main>
        <!-- alert -->
        <?php $this->load->view('theme/admin/alert');; ?>

        <!-- Load content -->
        <?php $this->load->view($theme_page); ?>
    </main>

    <!-- load footer -->
    <?php $this->load->view('theme/user/footer'); ?>

    <script src="<?= base_url('assets/frontend/vendor/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/frontend/vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/frontend/js/index.js'); ?>"></script>

</html>