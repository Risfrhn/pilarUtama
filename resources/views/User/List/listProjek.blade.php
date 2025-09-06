@include('header')

<div class="container mt-1">
    <div class="row">
        <div class="col-md-6 col-lg-8 text-center text-md-start">
            <h1 style="color:#65031D;" data-aos="fade-right" data-aos-duration="800" data-aos-easing="ease-in-sine">
                @php
                    $statusNames = [
                        'finished' => 'Finished Projects',
                        'ongoing' => 'Ongoing Projects',
                        'being_design' => 'Projects Being Designed',
                        'negotiation' => 'Negotiation Stages'
                    ];
                @endphp

                {{ $statusNames[$status] ?? 'Unknown Status' }}
            </h1>
        </div>
        <div class="col-12 col-md-6 col-lg-4 px-0">
            <div class="row g-1 mx-0 w-100 d-flex align-items-center" data-aos="fade-in" data-aos-duration="800" data-aos-easing="ease-in-sine"> 
                <form action="{{ route('projectsUser.view', ['status' => $status]) }}" method="GET" class="row g-1 mx-0 w-100">
                    <div class="col-8 col-md-8 col-lg-8"> 
                        <input class="form-control" type="text" name="search" placeholder="Search project name..." 
                            value="{{ request('search') }}" style="background-color:#e0ddd7">
                    </div>
                    <div class="col-2 col-md-2 col-lg-2"> 
                        <button type="submit" class="btn w-100" style="background-color:#65031D; color:#EEEBE5">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <div class="col-2 col-md-2 col-lg-2">
                        <button type="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#filterModal" 
                            style="background-color:#65031D; color:#EEEBE5">
                            <i class="bi bi-funnel"></i> <!-- Ikon Filter -->
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <ol class="breadcrumb" data-aos="fade-in" data-aos-duration="800" data-aos-easing="ease-in-sine">
        <li class="breadcrumb-item" style="font-size:10px;"><a href="{{route('dashboardUser.view')}}">Home</a></li>
        <li class="breadcrumb-item active" style="font-size:10px;"aria-current="page">List Projek</li>
    </ol>
    <div class="row mt-3" >
    @if ($projects->isNotEmpty() && $projects->where('status', $status)->isNotEmpty())
        @foreach($projects as $project)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 g-2 d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-sine">
                <!-- Membungkus card dengan tag <a> untuk menjadikannya link -->
                <a href="{{ route('projectsDetailUser.view', ['status' => $project->status, 'id' => $project->id]) }}" class="card-link" style="text-decoration: none;">
                    <div class="card overflow-hidden rounded-4 my-1" style="cursor: pointer;">
                        <!-- Gambar Full dengan Sudut Rounded -->
                        <img src="{{ asset($project->gambarflyer ?: 'images/no-image.jpg') }}" class="card-img-top" alt="Card Image" style="height: 500px; object-fit: cover; aspect-ratio: 2 / 3; ">

                        <!-- Pojok Kiri Atas (Angka) -->
                        <div class="position-absolute top-0 start-0 text-dark px-3 py-2 rounded-bottom">
                            {{ $loop->iteration }} <!-- Menampilkan nomor urut data -->
                        </div>

                        <!-- Pojok Kanan Atas (Kotak Rounded dengan Teks) -->
                        <div class="position-absolute top-0 end-0 text-dark border border-1 border-dark px-3 py-1 mx-3 my-2 rounded-5" 
                            style="background-color:#EEEBE5;font-size:10px">
                            {{ $project->name }} <!-- Nama proyek -->
                        </div>

                        <!-- Pojok Kanan Bawah (Lingkaran) -->
                        <div class="position-absolute bottom-0 end-0 mx-3 my-2 text-dark border border-1 border-dark rounded-circle d-flex align-items-center justify-content-center" 
                            style="background-color:#EEEBE5;width: 40px; height: 40px;">
                            <i class="bi bi-arrow-right" style="color:#65031D;"></i>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <div class="col-12 text-center">
            <p class="text-muted">No projects found with {{ $statusNames[$status] ?? 'Unknown Status' }}</p>
        </div>
    @endif
    </div>
    <div class="row mt-4 mb-0">
        <div class="col-12 d-flex justify-content-center">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{-- Tombol Previous --}}
                    <li class="page-item {{ $projects->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link bg-transparent border-0" href="{{ $projects->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true" style="font-size:20px;color:#65031D;">&laquo;</span>
                        </a>
                    </li>

                    {{-- Menampilkan nomor halaman --}}
                    @for ($i = 1; $i <= $projects->lastPage(); $i++)
                        <li class="page-item {{ $projects->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link bg-transparent border-0" href="{{ $projects->url($i) }}" style="font-size:20px;color:#65031D;">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Tombol Next --}}
                    <li class="page-item {{ $projects->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link bg-transparent border-0" href="{{ $projects->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true" style="font-size:20px;color:#65031D;">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Modal filter -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter Jenis Proyek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('projectsUser.view', ['status' => $status]) }}">
                    <div class="mb-3">
                        <label class="form-label">Pilih Jenis Proyek:</label>
                        <select class="form-select" name="jenis_projek" onchange="this.form.submit()" style="background-color:#e0ddd7">
                            <option value="">All Types</option>
                            <option value="Architecture" {{ request('jenis_projek') == 'Architecture' ? 'selected' : '' }}>Architecture</option>
                            <option value="Commercial_building" {{ request('jenis_projek') == 'Commercial_building' ? 'selected' : '' }}>Commercial Building</option>
                            <option value="Interior" {{ request('jenis_projek') == 'Interior' ? 'selected' : '' }}>Interior</option>
                            <option value="Landscape" {{ request('jenis_projek') == 'Landscape' ? 'selected' : '' }}>Landscape</option>
                            <option value="Renovation" {{ request('jenis_projek') == 'Renovation' ? 'selected' : '' }}>Renovation</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('footer')