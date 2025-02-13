<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WallpaperHub</title>
     
     <!-- Favicon -->
     <link rel="icon" type="image/png" href="<?= base_url('assets/mages/favicon.jpg'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/contact.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css');?>">

</head>
<body>

    <?php $this->load->view('header'); ?>

    <div class="container">
        <h1 class="page-title">Contact Us</h1>
        
        <form action="<?= base_url('contact/submit'); ?>" method="post" class="contact-form">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="5" placeholder="Type your message here" required></textarea>
            </div>

            <button type="submit" class="submit-btn">Send Message</button>
        </form>
    </div>
<br><br>
<br>
<br>
<br>
<br>


    <?php $this->load->view('footer'); ?>

    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>
</html>


