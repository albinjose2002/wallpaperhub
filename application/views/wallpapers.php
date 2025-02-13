<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WallpaperHub</title>
     
     <!-- Favicon -->
     <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.jpg'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>

    <?php $this->load->view('header'); ?>

    <div class="search-container">
    <input type="text" id="searchInput" placeholder="Search wallpapers...">
    <button onclick="searchWallpapers()">Search</button>
</div>


    <!-- Sorting Section -->
    <div class="sort-section">
        <label for="category">Sort by Category:</label>
        <select id="category">
            <option value="all">All</option>
            <option value="wallpapers">Wallpapers</option>
            <option value="abstract">Abstract</option>
            <option value="technology">Technology</option>
        </select>
    </div>

   

    <!-- Latest Wallpapers Section -->
    <div class="wallpaper-section">
        <h2>Latest Wallpapers</h2>
        <div class="wallpapers">
            <div class="wallpaper nature">
                <img src="<?= base_url('assets/images/abstract1.jpg'); ?>" alt="Nature Wallpaper">
                <h3>Beautiful Nature</h3>
                <p>A breathtaking view of nature's beauty.</p>
            </div>
            <div class="wallpaper nature">
                <img src="<?= base_url('assets/images/nature2.jpg'); ?>" alt="Nature Wallpaper">
                <h3>Peaceful Scenery</h3>
                <p>Enjoy the calmness of this peaceful landscape.</p>
            </div>
            <div class="wallpaper abstract">
                <img src="<?= base_url('assets/images/nature1.jpg'); ?>" alt="Abstract Wallpaper">
                <h3>Abstract Colors</h3>
                <p>Vibrant colors blended in a mesmerizing pattern.</p>
            </div>
            <div class="wallpaper abstract">
                <img src="<?= base_url('assets/images/abstract2.jpg'); ?>" alt="Abstract Wallpaper">
                <h3>Modern Abstract</h3>
                <p>A contemporary take on abstract art.</p>
            </div>
            <div class="wallpaper technology">
                <img src="<?= base_url('assets/images/tech1.jpg'); ?>" alt="Tech Wallpaper">
                <h3>Futuristic Technology</h3>
                <p>The world of technology and innovation.</p>
            </div>
            <div class="wallpaper technology">
                <img src="<?= base_url('assets/images/tech2.jpg'); ?>" alt="Tech Wallpaper">
                <h3>Digital Evolution</h3>
                <p>A glimpse into the future of digital transformations.</p>
            </div>
        </div>
    </div>

    <?php $this->load->view('footer'); ?>

    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>
</html>
