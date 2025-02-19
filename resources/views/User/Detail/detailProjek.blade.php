@include('header')

<div class="container mb-5">
    <h1 style="color:#65031D;">{{ $detailProject->name }}</h1>
    <div class="w-100 border border-1 border-dark mb-3"></div>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" style="font-size:10px;"><a href="{{route('dashboardUser.view')}}">Home</a></li>
            <li class="breadcrumb-item" style="font-size:10px;"><a href="{{ route('projectsUser.view', ['status' => $status]) }}">List Projek</a></li>
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
                        @foreach ($projectBefores as $index => $projectBefore)
                            <div class="carousel-item active h-100 {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset($projectBefore->image ?: 'images/no-image.jpg') }}" class="d-block w-100 h-100" style="min-height: 500px; height: 100%; object-fit: cover;" alt="Before Image">
                            </div>
                        @endforeach
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
                {{ $detailProject->description1 }}
                </p>
            </div>
            <div class="d-flex justify-content-center mb-2 position-relative">
                @foreach ($projectVideo as $index => $projectVideo)
                    <div class="position-relative">
                        <video autoplay loop muted playsinline class="video-fluid rounded-2" style="width: 100%; max-width: 400px; height: auto; color:#65031D; border: 2px solid #65031D;" alt="Empty video">
                            <source src="{{ asset($projectVideo->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endforeach
            </div>
            <div>
                <h1 style="font-size:20px;color:#65031D;">Problem Client</h1>
                <p style="font-size:10px;text-align:justify">
                {{ $detailProject->description2 }}
                </p>
            </div>
            <div>
                <h1 style="font-size:14px;color:#65031D;">[ Target Pengerjaan ] {{ $detailProject->target_pengerjaan_start }} - {{ $detailProject->target_pengerjaan_end }}</h1>
            </div>
        </div>

        <!-- Carousel Kanan -->
        @if($detailProject->status === 'finished')
        <div class="col-12 col-md-4 d-flex flex-column">
            <p style="font-size:15px; margin-bottom:2px">Result</p>
            <div class="flex-grow-1 d-flex align-items-stretch">
                <div id="carouselExample2" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100 rounded-2" style="color:#65031D; border: 2px solid #65031D;">
                        @foreach ($projectAfters as $index => $projectAfters)
                            <div class="carousel-item active h-100 {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset($projectAfters->image ?: 'images/no-image.jpg') }}" class="d-block w-100 h-100" style="min-height: 500px; height: 100%; object-fit: cover;" alt="Before Image">
                            </div>
                        @endforeach
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
        @endif
    </div>
</div>

@include('footer')