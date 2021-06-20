let htmlCarousel = `
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://asset.telunjuk.co.id/public/2543x565%20%281%29-a7c3393a-b5ff-4afe-b327-7c97733e47e9.jpg?w=1500" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://asset.telunjuk.co.id/public/header-desktop-9284a7a0-a4ce-48a3-aec0-e05ac4bd9a40.jpg?w=1500" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://asset.telunjuk.co.id/public/2543x565%20%281%29-a7c3393a-b5ff-4afe-b327-7c97733e47e9.jpg?w=1500" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
`;

const myCarousel = document.getElementById('carousel');
myCarousel.innerHTML = htmlCarousel; 

export default myCarousel;