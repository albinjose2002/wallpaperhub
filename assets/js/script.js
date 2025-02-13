let currentIndex = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const totalSlides = slides.length;

function moveSlide(step) {
    currentIndex += step;
    if (currentIndex >= totalSlides) {
        currentIndex = 0;
    } else if (currentIndex < 0) {
        currentIndex = totalSlides - 1;
    }
    updateSlider();
}

function currentSlide(index) {
    currentIndex = index;
    updateSlider();
}

function updateSlider() {
    const slider = document.querySelector('.slider');
    slider.style.transform = `translateX(${-currentIndex * 100}%)`;
    
    dots.forEach(dot => dot.classList.remove('active'));
    dots[currentIndex].classList.add('active');
}

// Auto-slide every 4 seconds
setInterval(() => moveSlide(1), 4000);

// Sorting functionality
document.getElementById("category").addEventListener("change", function() {
    let category = this.value;
    document.querySelectorAll(".wallpaper").forEach(item => {
        if (category === "all" || item.classList.contains(category)) {
            item.style.display = "inline-block";
        } else {
            item.style.display = "none";
        }
    });
//searchbar
    function searchWallpapers() {
        let input = document.getElementById('searchInput').value.toLowerCase();
        let wallpapers = document.querySelectorAll('.wallpaper');
    
        wallpapers.forEach(wallpaper => {
            let title = wallpaper.querySelector('h3').textContent.toLowerCase();
            if (title.includes(input) || input === "") {
                wallpaper.style.display = "block";
            } else {
                wallpaper.style.display = "none";
            }
        });
    }
    
});
