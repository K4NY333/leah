document.addEventListener('DOMContentLoaded', function () {
    const images = document.querySelectorAll('.images img');
    const photoContainer = document.querySelector('.photocontainer');

    images.forEach(image => {
        image.addEventListener('click', function () {
            // Reset all images to original size
            images.forEach(img => img.classList.remove('clicked'));

            // Set the clicked image to a larger size
            this.classList.add('clicked');

            // Display the clicked image inside the photo container
            photoContainer.innerHTML = ''; // Clear previous content
            const clonedImage = this.cloneNode(true);
            photoContainer.appendChild(clonedImage);

            // Check if the clicked image is m11 or m12
            if (this.id === 'm11' || this.id === 'm12') {
                displayMessage();
            }
        });
    });
});