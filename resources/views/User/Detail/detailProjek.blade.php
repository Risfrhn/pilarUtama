@include('header')

<div style="position: relative; display: inline-block; width: 100%;">
    <img src="{{ asset($detailProject->gambarHero) }}" class="img-fluid mb-5" alt="Deskripsi Gambar" data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-out" style="filter: brightness(50%); width: 100%; display: block;">
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center" data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-out">
        <h1 style="">{{ $detailProject->name }}</h1>
        <p class="detailProjekHeader fw-light">Kami adalah solusi terbaik untuk menciptakan segala keinginan & kebutuhan konstruksi anda.</p>
        <button type="button" class="btn detailProjekHeader btn-outline border-2 rounded-5" style="color:#EEEBE5;border-color:#EEEBE5">Lihat Projek</button>
    </div>
</div>
<div class="container mb-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" style="font-size:10px;"><a href="{{route('dashboardAdmin.view')}}">Home</a></li>
            <li class="breadcrumb-item" style="font-size:10px;"><a href="{{ route('projects.view', ['status' => $status]) }}">List Projek</a></li>
            <li class="breadcrumb-item active" style="font-size:10px;"aria-current="page">Detail project</li>
        </ol>
    </nav>

    <div class="row mt-3">
        <div class="col-12">
            <h1 style="color:#65031D;">Dokumentasi selama <br> projek berjalan</h1>
            <div class="w-100 border border-1 border-dark mb-3"></div>
        </div>
        <!-- Swiper Container -->
        <div class="swiper mySwiper px-3">
            <div class="swiper-wrapper">
            @foreach ($projectBefores as $index => $projectBefore)
                <div class="swiper-slide">
                    <div class="position-relative">
                        <img src="{{ asset($projectBefore->image ?: 'images/no-image.jpg') }}" 
                            class="d-block w-100" 
                            style="min-height: 400px; height: 100%; object-fit: cover;" 
                            alt="Before Image">
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        <div class="row mt-5" >
            <div class="col-6 d-flex justify-content-start align-items-end">
                <h1 class="detailProjectTarget" style="color:#65031D;">[ Target Pengerjaan ] {{ $detailProject->target_pengerjaan_start }} - {{ $detailProject->target_pengerjaan_end }}</h1>
            </div> 
            <div class="col-6 text-end">
                <h1 class="detailProjectAbout" style="color:#65031D;">About Projek</h1>
            </div> 
            <div class="w-100 border border-1 border-dark mb-3"></div>
        </div>
        <div class="row mt-3 mb-5">
            <div class="col-12">
                <div class="accordion mb-4" id="accordionExample">
                    <div class="accordion-item bg-transparent rounded-0" style="color:#65031D; border-bottom: 2px solid #65031D;">
                        <h2 class="accordion-header d-flex justify-content-between align-items-center">
                            <button class="accordion-button bg-transparent text-dark collapsed" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse1"
                                aria-expanded="false"
                                aria-controls="collapse1">
                                <p style="font-size:20px;margin-bottom:-10px;">Client Problem</p>
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-dark">
                                <p>{{ $detailProject->description1 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion mb-4" id="accordionExample">
                    <div class="accordion-item bg-transparent rounded-0" style="color:#65031D; border-bottom: 2px solid #65031D;">
                        <h2 class="accordion-header d-flex justify-content-between align-items-center">
                            <button class="accordion-button bg-transparent text-dark collapsed" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse2"
                                aria-expanded="false"
                                aria-controls="collapse2">
                                <p style="font-size:20px;margin-bottom:-10px;">Problem Client</p>
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-dark">
                                <p>{{ $detailProject->description1 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @foreach ($projectVideo as $index => $projectVideo)
                    <div class="position-relative">
                        <video autoplay loop muted playsinline class="video-fluid rounded-2" style="width: 100%; color:#65031D; border: 2px solid #65031D;" alt="Empty video">
                            <source src="{{ asset($projectVideo->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endforeach
            </div>
        </div>


        @if($detailProject->status === 'finished')
            <div class="row mt-3 text-end" >
                <div class="col-12">
                    <h1 style="color:#65031D;">Dokumentasi <br> hasil pengerjaan</h1>
                    <div class="w-100 border border-1 border-dark mb-3"></div>
                </div>  
            </div>
            <!-- Swiper Container -->
            <div class="swiper mySwiper px-3">
                <div class="swiper-wrapper">
                @foreach ($projectAfters as $index => $projectAfter)
                    <div class="swiper-slide">
                        <div class="position-relative">
                            <img src="{{ asset($projectAfter->image ?: 'images/no-image.jpg') }}" class="d-block w-100 h-100" style="min-height: 500px; height: 100%; object-fit: cover;" alt="Before Image">
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

@include('footer')