<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WallpaperHub</title>
     
     <!-- Favicon -->
     <link rel="icon" type="image/png" href="<?= base_url('assets/mages/favicon.jpg'); ?>">
     <link rel="stylesheet" href="<?= base_url('assets/css/about.css'); ?>">
     <link rel="stylesheet" href="<?= base_url('assets/css/style.css');?>">

</head>
<body>

    <?php $this->load->view('header'); ?>

    <div class="about-container">
        <h1 class="page-title">About Us</h1>
        <p class="about-description">
            Welcome to <strong>WallpaperHub</strong>, your ultimate destination for high-quality wallpapers. 
            We are dedicated to bringing you a vast collection of stunning wallpapers across various categories 
            such as nature, abstract, technology, and more. Whether you're looking to personalize your desktop, 
            mobile, or tablet, we have something for everyone.
        </p>

        <h2>Our Mission</h2>
        <p>
            Our mission is to provide users with an extensive and free collection of wallpapers, ensuring 
            easy access to beautiful and high-resolution images. We strive to deliver an exceptional browsing 
            experience with simple navigation and quick downloads.
        </p>

        <h2>Why Choose Us?</h2>
        <ul>
            <li>✔️ A wide range of high-quality wallpapers</li>
            <li>✔️ Free downloads with no hidden charges</li>
            <li>✔️ Regular updates with fresh content</li>
            <li>✔️ User-friendly interface</li>
        </ul>
    </div>
<br><br>
    <?php $this->load->view('footer'); ?>

    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>
</html>

