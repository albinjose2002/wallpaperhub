<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - WallpaperHub</title>
    
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/register.css'); ?>">
</head>
<body>

    <?php $this->load->view('header'); ?>

    <div class="container">
        <h2 class="text-center">Create an Account</h2>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <form action="<?= base_url('auth/register_user'); ?>" method="POST" class="form-container">
            <label>Full Name:</label>
            <input type="text" name="full_name" class="form-control" required>

            <label>Email Address:</label>
            <input type="email" name="email" class="form-control" required>

            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>

            <label>Confirm Password:</label>
            <input type="password" name="confirm_password" class="form-control" required>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <p class="text-center">Already have an account? <a href="<?= base_url('auth/login'); ?>">Login here</a></p>
    </div>

    <?php $this->load->view('footer'); ?>
</body>
</html>
