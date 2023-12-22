console.log("Linked js file.");

function updateImageSource() {
    const dynamicImage = document.getElementById('dynamicImage');
    
    if (window.matchMedia('(max-width: 768px)').matches) {
        dynamicImage.src = "assets/banner-portrait.png";
        console.log('Changing to portrait image');
    } else {
        dynamicImage.src = "assets/banner-landscape.png";
        console.log('Changing to landscape image');
    }
}

updateImageSource();
window.addEventListener('resize', updateImageSource);



