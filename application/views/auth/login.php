<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WallpaperHub</title>
    
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>">
</head>
<body>

    <?php $this->load->view('header'); ?>

    <div class="container">
        <h2 class="text-center">Login to Your Account</h2>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form action="<?= base_url('auth/login_user'); ?>" method="POST" class="form-container">
            <label>Email Address:</label>
            <input type="email" name="email" class="form-control" required>

            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <p class="text-center">Don't have an account? <a href="<?= base_url('auth/register'); ?>">Register here</a></p>
    </div>
<br><br><br><br>
<br><br><br><br>

    <?php $this->load->view('footer'); ?>
</body>
</html>
