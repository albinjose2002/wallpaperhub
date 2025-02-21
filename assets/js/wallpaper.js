document.addEventListener("DOMContentLoaded", function () {
    // Upload Modal Functionality
    var uploadBtn = document.getElementById("uploadBtn");
    var uploadModal = document.getElementById("uploadModal");
    var closeBtn = document.querySelector(".close-btn");

    // Ensure the modal is hidden when the page loads
    uploadModal.style.display = "none";
    uploadModal.style.opacity = "0";

    // Open upload modal
    uploadBtn.addEventListener("click", function () {
        uploadModal.style.display = "flex";
        uploadModal.style.opacity = "1";
    });

    // Close upload modal
    closeBtn.addEventListener("click", function () {
        uploadModal.style.opacity = "0";
        setTimeout(() => uploadModal.style.display = "none", 300); // Hides the modal after the opacity transition
    });

    // Close upload modal if clicked outside
    window.addEventListener("click", function (e) {
        if (e.target === uploadModal) {
            uploadModal.style.opacity = "0";
            setTimeout(() => uploadModal.style.display = "none", 300); // Hides the modal after the opacity transition
        }
    });

    var lightbox = document.getElementById("lightbox");
    var lightboxImg = document.getElementById("lightbox-img");
    var closeLightboxBtn = document.querySelector(".close");

    // Function to open lightbox when image is clicked
    window.openLightbox = function (imageSrc) {
        // Show lightbox and set image source
        lightbox.style.display = "flex";   
        lightbox.style.opacity = "1";      // Fade-in effect
        lightboxImg.src = imageSrc;       // Set image to lightbox
    };

    // Function to close lightbox
    window.closeLightbox = function () {
        lightbox.style.opacity = "0";      // Fade-out effect
        setTimeout(() => lightbox.style.display = "none", 300);  // Hide lightbox after fade-out
    };

    // Close lightbox when clicking on the close button
    closeLightboxBtn.addEventListener("click", function () {
        closeLightbox();
    });

    // Close lightbox when clicking outside the image
    window.addEventListener("click", function (e) {
        if (e.target === lightbox) {  // Close if clicked outside of the image
            closeLightbox();
        }
    });

    // Function to delete image
    window.deleteImage = function (element) {
        // Remove the image element from the DOM
        var wallpaperDiv = element.closest('.wallpaper');
        if (wallpaperDiv) {
            wallpaperDiv.remove();
        }
    };

    // Function to download image
    window.downloadImage = function (imageSrc) {
        var link = document.createElement("a");
        link.href = imageSrc;
        link.download = imageSrc.substring(imageSrc.lastIndexOf('/') + 1); // Extract filename from URL
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    };
});
