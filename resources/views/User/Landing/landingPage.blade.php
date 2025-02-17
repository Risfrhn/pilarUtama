@include('header')
@include('Component.alert')

@foreach($modalData as $item)
<!-- halaman utama -->
<div class="container" id="halaman-utama">
    <div class="row g-0 fw-semibold">
        <div class="col-6 mt-4">
            <p class="custom-font-h1">LAYANAN JASA<br> <span style="font-size: 120%;">KONSTRUKSI</span></p>
        </div>
        <div class="col-6" style="">
            <p class="custom-font-h2">Pilar <br> Utama</p>
        </div>
    </div>
    <div class="row g-0 fw-semibold mb-3 mb-xl-5">
        <div class="col-8 text-end">
            <p class="custom-font-h4 fst-italic" >SATU PINTU</p>
        </div>
        <div class="col-4 text-end">
            <p class="custom-font-h3 d-none d-sm-block">Kami adalah solusi terbaik untuk menciptakan <br> segala keinginan & kebutuhan konstruksi anda.</p>
        </div>
    </div>
    
</div>
<img src="{{ $item->flyer_image }}" class="img-fluid mb-5" alt="Deskripsi Gambar">

<!-- tentang kami -->
<div class="container mt-5 mb-5" id="tentang-kami">
    <h1 style="color:#65031D;">PILAR UTAMA</h1>
    <div class="w-100 border border-1 border-dark"></div>
    <div class="row mt-5 d-flex justify-content-center align-items-center" style="line-height:1.2">
        <div class="col-auto fw-medium" style="font-size:12px; text-align:justify">
            <p class="mb-0 fst-italic">information</p>
            <p class="aboutUs" style="font-size:50px">About Us</p>
            <p style="max-width: 400px;">{{ $item->about_us_desk1 }}</p>
            <img src="{{ $item->about_us_image }}" class="img-fluid mb-4" width="400px" alt="Deskripsi Gambar">
            <p class="fw-light" style="font-size:12px;max-width: 400px; text-align:left; line-height:1.3">{{ $item->about_us_desk2 }}</p>
        </div>
    </div>
</div>

<!-- layanan -->
<div class="container mt-5 mb-5" id="layanan">
    <h1 style="color:#65031D;">Why Us?</h1>
    <div class="w-100 border border-1 border-dark"></div>
    <div class="row mt-5" style="line-height:1.2">
        <h1 class="mb-0 fst-italic">Our</h1>
        <p class="aboutUs" style="font-size:50px">Services</p>
        <div class="col-12 col-lg-3">
            <img id="layananImage" src="{{ $item->architectur_image }}" class="img-fluid mb-5" alt="Service Image">
        </div>
        <div class="col-lg-3 mb-lg-0 mb-5">
            <ul class="nav flex-column" id="serviceTabs">
                <li class="nav-item">
                    <a class="nav-link layanan text-dark fw-medium active" href="#" data-image="{{ $item->architectur_image }}" data-target="desc-architectur">Architecture</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link layanan text-dark fw-medium" href="#" data-image="{{ $item->interior_image }}" data-target="desc-interior">Interior</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link layanan text-dark fw-medium" href="#" data-image="{{ $item->landscape_image }}" data-target="desc-landscape">Landscape</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link layanan text-dark fw-medium" href="#" data-image="{{ $item->renovation_image }}" data-target="desc-renovation">Renovation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link layanan text-dark fw-medium" href="#" data-image="{{ $item->comercial_build_image }}" data-target="desc-comercialBuild">Commercial Build</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-12 text-lg-start text-center">
            <div class="tab-content w-100" id="contentContainer">
                <div id="desc-architectur" class="tab-pane fade show active">
                    <p class="fw-semibold" style="color:#65031D;">Architecture</p>
                    <p class="desc-text" style="font-size:12px;">{{ $item->architectur_desk }}</p>
                </div>
                <div id="desc-interior" class="tab-pane fade">
                    <p class="fw-semibold">Interior</p>
                    <p class="desc-text" style="font-size:12px;">{{ $item->interior_desk }}</p>
                </div>
                <div id="desc-landscape" class="tab-pane fade">
                    <p class="fw-semibold">Landscape</p>
                    <p class="desc-text" style="font-size:12px;">{{ $item->landscape_desk }}</p>
                </div>
                <div id="desc-renovation" class="tab-pane fade">
                    <p class="fw-semibold">Renovation</p>
                    <p class="desc-text" style="font-size:12px;">{{ $item->renovation_desk }}</p>
                </div>
                <div id="desc-comercialBuild" class="tab-pane fade">
                    <p class="fw-semibold">Commercial build</p>
                    <p class="desc-text" style="font-size:12px;">{{ $item->comercial_build_desk }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- projek -->
<div class="container mt-5 mb-5" id="projek">
    <h1 style="color:#65031D;">Our Project</h1>
    <div class="w-100 border border-1 border-dark"></div>

    <div class="container mt-5">
        <div class="row text-center ">
            <div class="col-6 col-lg-3 g-2">
                <div class="kotak border border-1 border-dark d-flex flex-column justify-content-center align-items-center rounded-4" style="height: 100px;">
                    <h3 class="mt-3" style="color:#65031D;">20+</h3>
                    <p>Finished Projects</p>
                </div>
            </div>
            <div class="col-6 col-lg-3 g-2">
                <div class="kotak border border-1 border-dark d-flex flex-column justify-content-center align-items-center rounded-4" style="height: 100px;">
                    <h3 class="mt-3" style="color:#65031D;">20+</h3>
                    <p>On Going Projects</p>
                </div>
            </div>
            <div class="col-6 col-lg-3 g-2">
                <div class="kotak border border-1 border-dark d-flex flex-column justify-content-center align-items-center rounded-4" style="height: 100px;">
                    <h3 class="mt-3" style="color:#65031D;">20+</h3>
                    <p>Projects Being Design</p>
                </div>
            </div>
            <div class="col-6 col-lg-3 g-2">
                <div class="kotak border border-1 border-dark d-flex flex-column justify-content-center align-items-center rounded-4" style="height: 100px;">
                    <h3 class="mt-3" style="color:#65031D;">20+</h3>
                    <p>Negotiation Stages</p>
                </div>
            </div>
        </div>    
    </div>
</div>


<!-- kontak -->
<div class="container mt-5 mb-5" id="kontak">
    <h1 style="color:#65031D;">Our Locations</h1>
    <div class="w-100 border border-1 border-dark mb-3"></div>
    <h1>Samarinda, Kalimantan Timur</h1>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13839.160904503724!2d117.14421849231672!3d-0.4973464538133317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1739099634344!5m2!1sid!2sid" class="w-100 border border-3 rounded rounded-3" height="450" style="border-color: #65031D !important;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <h3 style="color:#65031D; border-bottom: 2px solid #65031D; display: inline-block;" class="mt-3">
        CONTACT US
    </h3>
    <h1 class="noHp">0851-8333-4971</h1>
</div>
@endforeach

@include('footer')





