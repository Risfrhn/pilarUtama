@include('header')

@foreach($modalData as $item)
<!-- halaman utama -->
<div class="container" id="halaman-utama" data-aos="fade-right" data-aos-duration="500" data-aos-easing="ease-in-out">
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
<img src="{{ $item->flyer_image }}" class="img-fluid mb-5" alt="Deskripsi Gambar" data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-out">

<!-- tentang kami -->
<div class="container mt-5 mb-5" id="tentang-kami">
    <h1 style="color:#65031D;" data-aos="fade-right"data-aos-duration="800"data-aos-easing="ease-in-sine">PILAR UTAMA</h1>
    <div class="w-100 border border-1 border-dark"></div>
    <div class="row mt-5 d-flex justify-content-center align-items-center" style="line-height:1.2" data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out">
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
<div class="container mt-5 mb-5" id="layanan" >
    <h1 style="color:#65031D;" data-aos="fade-right" data-aos-duration="800" data-aos-easing="ease-in-sine">Why Us?</h1>
    <div class="w-100 border border-1 border-dark"></div>
    <div class="row mt-5" style="line-height:1.2" data-aos="fade-right" data-aos-duration="800" data-aos-easing="ease-in-sine">
        <h1 class="mb-0 fst-italic" >Our</h1>
        <p class="aboutUs" style="font-size:50px" >Services</p>
        <div class="col-12 col-lg-3 d-flex justify-content-center" >
            <img id="layananImage" src="{{ $item->architectur_image }}" class="img-fluid mb-5" alt="Service Image">
        </div>
        <div class="col-lg-2 mb-lg-0 mb-2">
            <ul class="nav flex-lg-column flex-row justify-content-center" id="serviceTabs">
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
        <div class="col-lg-7 col-12 text-lg-start text-center">
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
    <h1 style="color:#65031D;" data-aos="fade-right" data-aos-duration="800" data-aos-easing="ease-in-sine">Our Project</h1>
    <div class="w-100 border border-1 border-dark"></div>

    <div class="container mt-5">
        <div class="row text-center ">
            <!-- Finished Projects -->
            <div class="col-6 col-lg-3 g-2" data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-sine">
                <a href="{{ route('projectsUser.view', ['status' => 'finished']) }}" style="text-decoration:none;color:black;">
                    <div class="kotak border border-1 border-dark d-flex flex-column justify-content-center align-items-center rounded-4" style="height: 100px;">
                        <h3 class="mt-3" style="color:#65031D;">{{ $finishedProjects }}+</h3>
                        <p>Finished Projects</p>
                    </div>
                </a>
            </div>

            <!-- Ongoing Projects -->
            <div class="col-6 col-lg-3 g-2" data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-sine">
                <a href="{{ route('projectsUser.view', ['status' => 'ongoing']) }}" style="text-decoration:none;color:black;">
                    <div class="kotak border border-1 border-dark d-flex flex-column justify-content-center align-items-center rounded-4" style="height: 100px;">
                        <h3 class="mt-3" style="color:#65031D;">{{ $ongoingProjects }}+</h3>
                        <p>On Going Projects</p>
                    </div>
                </a>
            </div>

            <!-- Projects Being Designed -->
            <div class="col-6 col-lg-3 g-2" data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-sine">
                <a href="{{ route('projectsUser.view', ['status' => 'beingDesign']) }}" style="text-decoration:none;color:black;">
                    <div class="kotak border border-1 border-dark d-flex flex-column justify-content-center align-items-center rounded-4" style="height: 100px;">
                        <h3 class="mt-3" style="color:#65031D;">{{ $designProjects }}+</h3>
                        <p>Projects Being Designed</p>
                    </div>
                </a>
            </div>

            <!-- Negotiation Projects -->
            <div class="col-6 col-lg-3 g-2" data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-sine">
                <a href="{{ route('projectsNegoUser.view', ['status' => 'negotiation']) }}"  
                style="text-decoration:none;color:black;">
                    <div class="kotak border border-1 border-dark d-flex flex-column justify-content-center align-items-center rounded-4" style="height: 100px;">
                        <h3 class="mt-3" style="color:#65031D;">{{ $negotiationProjects }}+</h3>
                        <p>Negotiation Stages</p>
                    </div>
                </a>
            </div>
        </div>    
    </div>
</div>


<!-- kontak -->
<div class="container mt-5 mb-5" id="kontak">
    <h1 style="color:#65031D;" data-aos="fade-right" data-aos-duration="800" data-aos-easing="ease-in-sine">Our Locations</h1>
    <div class="w-100 border border-1 border-dark mb-3"></div>
    <h1 data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-sine">Samarinda, Kalimantan Timur</h1>
    <iframe data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-sine" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13839.160904503724!2d117.14421849231672!3d-0.4973464538133317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1739099634344!5m2!1sid!2sid" class="w-100 border border-3 rounded rounded-3" height="450" style="border-color: #65031D !important;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <h3 data-aos="fade-right" data-aos-duration="800" data-aos-easing="ease-in-sine" style="color:#65031D; border-bottom: 2px solid #65031D; display: inline-block;" class="mt-3">
        CONTACT US
    </h3>
    <h1 class="noHp" data-aos="fade-right" data-aos-duration="800" data-aos-easing="ease-in-sine">0851-8333-4971</h1>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        let activeTab = "desc-architectur";
        document.querySelectorAll(".layanan").forEach(tab => {
            tab.addEventListener("click", function (e) {
                e.preventDefault();
                const targetId = this.getAttribute("data-target");
                const targetContent = document.getElementById(targetId);
                const imageSrc = this.getAttribute("data-image");
                
                if (activeTab === targetId) return;
                
                document.querySelectorAll(".tab-pane").forEach(content => {
                    content.classList.remove("show", "active");
                });
                document.querySelectorAll(".layanan").forEach(link => {
                    link.classList.remove("active");
                });
                
                targetContent.classList.add("show", "active");
                this.classList.add("active");
                document.getElementById("layananImage").src = imageSrc;
                activeTab = targetId;
            });
        });
    });
</script>

@include('footer')
@endforeach