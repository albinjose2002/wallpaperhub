<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WallpaperHub</title>
     
     <!-- Favicon -->
     <link rel="icon" type="image/png" href="<?= base_url('assets/mages/favicon.jpg'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
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

<style>

.container {
    width: 90%;
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
    padding: 20px;
}

.contact-form {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input, 
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.submit-btn {
    background: #333;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.submit-btn:hover {
    background: #555;
}

</style>
