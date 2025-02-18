<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css'); ?>">
</head>
<body>

    <?php $this->load->view('header'); ?>

    <div class="dashboard-container">
        <h2>Welcome, <?= $this->session->userdata('full_name'); ?>!</h2>
        <p>Email: <?= $this->session->userdata('email'); ?></p>

        <a href="<?= base_url('home'); ?>" class="btn btn-danger">Go to Home</a>
    </div>
<br><br><br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br>
<br>
<br>

    <?php $this->load->view('footer'); ?>

</body>
</html>
