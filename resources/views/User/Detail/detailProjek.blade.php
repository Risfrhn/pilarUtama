@include('header')

<div class="container mb-5">
    <h1 style="color:#65031D;">Pesona bali</h1>
    <div class="w-100 border border-1 border-dark mb-3"></div>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" style="font-size:10px;"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" style="font-size:10px;"aria-current="page">Detail project</li>
        </ol>
    </nav>
    <div class="row mt-3 align-items-stretch">
        <!-- Carousel Kiri -->
        <div class="col-12 col-md-4 d-flex flex-column">
            <p style="font-size:15px; margin-bottom:2px">During the project</p>
            <div class="flex-grow-1 d-flex align-items-stretch">
                <div id="carouselExample1" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100 rounded-2" style="color:#65031D; border: 2px solid #65031D;">
                        <div class="carousel-item active h-100">
                            <img src="{{ asset('image/layanan.jpg') }}" class="d-block w-100 h-100" style="min-height: 500px; height: 100%; object-fit: cover;" alt="Slide 1">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="{{ asset('image/layanan.jpg') }}" class="d-block w-100 h-100" style="min-height: 500px; height: 100%; object-fit: cover;" alt="Slide 2">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="{{ asset('image/layanan.jpg') }}" class="d-block w-100 h-100" style="min-height: 500px; height: 100%; object-fit: cover;" alt="Slide 1">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Tengah (Teks) -->
        <div class="col-12 col-md-4 ">
            <div class="mt-4">
                <h1 style="font-size:20px;color:#65031D;">Client Problem</h1>
                <p style="font-size:10px;text-align:justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam consequatur velit odit fugiat? Quis, dolore beatae! Rerum iste repellendus amet.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus aspernatur qui culpa. Necessitatibus atque impedit quasi ratione adipisci. Temporibus, quaerat!
                </p>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <video autoplay loop muted playsinline class="video-fluid rounded-2" style="width: 100%; max-width: 400px; height: auto; color:#65031D; border: 2px solid #65031D;">
                    <source src="{{ asset('video/PilarUtama.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div>
                <h1 style="font-size:20px;color:#65031D;">Problem Client</h1>
                <p style="font-size:10px;text-align:justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias natus dolore recusandae doloribus? Ea consequatur itaque dolorem voluptatum modi ut qui dolor aliquid eligendi, culpa repellendus veritatis, dolore iste porro unde laudantium. Harum dolorem officia, labore provident voluptatibus sed quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet incidunt asperiores est recusandae odit placeat, quas quibusdam dolor facilis accusantium.
                </p>
            </div>
            <div>
                <h1 style="font-size:15px;color:#65031D;">[ Target Pengerjaan ] Jan - Feb 2025</h1>
            </div>
        </div>

        <!-- Carousel Kanan -->
        <div class="col-12 col-md-4 d-flex flex-column">
            <p style="font-size:15px; margin-bottom:2px">Result</p>
            <div class="flex-grow-1 d-flex align-items-stretch">
                <div id="carouselExample2" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100 rounded-2" style="color:#65031D; border: 2px solid #65031D;">
                        <div class="carousel-item active h-100">
                            <img src="{{ asset('image/layanan.jpg') }}" class="d-block w-100 h-100" style="min-height: 500px; height: 100%; object-fit: cover;" alt="Slide 1">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="{{ asset('image/layanan.jpg') }}" class="d-block w-100 h-100" style="min-height: 500px; height: 100%; object-fit: cover;" alt="Slide 2">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="{{ asset('image/layanan.jpg') }}" class="d-block w-100 h-100" style="min-height: 500px; height: 100%; object-fit: cover;" alt="Slide 1">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')