<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WallpaperHub</title>
     
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.jpg'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/wallpaper.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <?php $this->load->view('header'); ?>

    <div class="search-upload-container">
        <input type="text" id="searchInput" placeholder="Search wallpapers...">
        <button class="btn" onclick="searchWallpapers()">Search</button>
        <button id="uploadBtn" class="btn">Upload Image</button>
    </div>

    <!-- Flash Messages -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <!-- Upload Modal -->
    <div id="uploadModal" class="upload-modal">
        <div class="upload-box">
            <span class="close-btn">&times;</span>
            <h3>Upload Wallpaper</h3>
            <?php echo form_open_multipart('wallpapers/upload_image'); ?>
                <input type="text" name="title" placeholder="Enter title" class="form-input">
                <select name="category" class="form-input">
                    <option value="wallpapers">Wallpapers</option>
                    <option value="abstract">Abstract</option>
                    <option value="technology">Technology</option>
                </select>
                <input type="file" name="image" accept="image/*" class="file-input">
                <button type="submit" class="upload-btn">Upload</button>
            </form>
        </div>
    </div>

  <!-- Latest Wallpapers Section -->
<div class="wallpaper-section">
    <h2>Latest Wallpapers</h2>
    <div class="wallpapers">
        <?php if (!empty($wallpapers)): ?>
            <?php foreach ($wallpapers as $wallpaper): ?>
                <div class="wallpaper <?= $wallpaper['category']; ?>">
                    <img src="<?= base_url('assets/uploads/' . $wallpaper['image']); ?>" 
                         alt="<?= $wallpaper['title']; ?>" 
                         class="thumbnail"
                         onclick="openLightbox('<?= base_url('assets/uploads/' . $wallpaper['image']); ?>')">
                    <h3><?= $wallpaper['title']; ?></h3>
                    <div class="icon-container">
                        <i class="fas fa-download download-icon" onclick="downloadImage('<?= base_url('assets/uploads/' . $wallpaper['image']); ?>')"></i>
                        <i class="fas fa-trash-alt delete-icon" onclick="deleteImage('<?= $wallpaper['id']; ?>')"></i>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No wallpapers found.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox">
    <span class="close" onclick="closeLightbox()">&times;</span>
    <img id="lightbox-img" class="lightbox-content">
</div>

    <script src="<?= base_url('assets/js/wallpaper.js'); ?>"></script>

</body>
<?php $this->load->view('footer'); ?>

</html>
