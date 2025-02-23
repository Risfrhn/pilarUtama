@include('header')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-8 col-12 text-center text-md-start">
            <h1 style="color:#65031D;" data-aos="fade-right" data-aos-duration="800" data-aos-easing="ease-in-sine">
                @php
                    $statusNames = [
                        'finished' => 'Finished Projects',
                        'ongoing' => 'Ongoing Projects',
                        'beingDesign' => 'Projects Being Designed',
                        'negotiation' => 'Negotiation Stages'
                    ];
                @endphp

                {{ $statusNames[$status] ?? 'Unknown Status' }}
            </h1>
        </div>
        <div class="col-12 col-md-6 col-lg-4 px-0">
            <div class="row g-1 mx-0 w-100 d-flex align-items-center" data-aos="fade-in" data-aos-duration="800" data-aos-easing="ease-in-sine"> 
                <form action="{{ route('projectsNegoUser.view', ['status' => $status]) }}" method="GET" class="row g-1 mx-0 w-100">
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
        <ol class="breadcrumb ps-0 ps-md-3" data-aos="fade-in" data-aos-duration="800" data-aos-easing="ease-in-sine">
            <li class="breadcrumb-item" style="font-size:10px;"><a href="{{route('dashboardUser.view')}}">Home</a></li>
            <li class="breadcrumb-item active" style="font-size:10px;"aria-current="page">List Projek</li>
        </ol>
        @if ($projects->isNotEmpty() && $projects->where('status', $status)->isNotEmpty())
            <div class="row">
                @foreach ($projects->where('status', $status) as $project)
                    <div class="col-1 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-sine">
                        <p style="font-size:20px;">[{{ $loop->iteration }}]</p>
                    </div>
                    <div class="col-11" data-aos="fade-in" data-aos-duration="800" data-aos-easing="ease-in-sine">
                        <div class="accordion mb-4" id="accordionExample">
                            <div class="accordion-item bg-transparent rounded-0" style="color:#65031D; border-bottom: 2px solid #65031D;">
                                <h2 class="accordion-header d-flex justify-content-between align-items-center">
                                    <button class="accordion-button bg-transparent text-dark collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $project->id }}"
                                        aria-expanded="false"
                                        aria-controls="collapse{{ $project->id }}">
                                        <p style="font-size:20px;margin-bottom:-10px;">{{ $project->name }}</p>
                                    </button>
                                </h2>
                                <div id="collapse{{ $project->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-dark">
                                        <p>{{ $project->description1 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="col-12 text-center">
                <p class="text-muted">No projects found with {{ $statusNames[$status] ?? 'Unknown Status' }}</p>
            </div>
        @endif
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
                <form method="GET" action="{{ route('projectsNegoUser.view', ['status' => $status]) }}">
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