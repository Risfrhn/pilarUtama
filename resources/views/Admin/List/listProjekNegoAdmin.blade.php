@include('header')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-8 col-12 text-center text-md-start">
            <h1 style="color:#65031D;">
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
            <div class="row g-1 mx-0 w-100 d-flex align-items-center"> 
                <div class="col-8 col-md-8 col-lg-8 "> 
                    <input class="form-control" type="text" placeholder="Search..." aria-label="default input example" style="background-color:#e0ddd7">
                </div>
                <div class="col-2 col-md-2 col-lg-2 "> 
                    <button type="button" class="btn w-100" style="background-color:#65031D; color:#EEEBE5"><i class="bi bi-search"></i></button>
                </div>
                <div class="col-2 col-md-2 col-lg-2">
                    <button type="button" class="btn w-100" style="background-color:#65031D; color:#EEEBE5"><i class="bi bi-filter"></i></button>
                </div>
            </div>
        </div>
        <ol class="breadcrumb ps-0 ps-md-3">
            <li class="breadcrumb-item" style="font-size:10px;"><a href="{{route('dashboardAdmin.view')}}">Home</a></li>
            <li class="breadcrumb-item active" style="font-size:10px;"aria-current="page">List Projek</li>
        </ol>
        @if ($projects->isNotEmpty() && $projects->where('status', $status)->isNotEmpty())
            <div class="row">
                @foreach ($projects->where('status', $status) as $project)
                    <div class="col-1 d-flex align-items-center justify-content-center">
                        <p style="font-size:20px;">[{{ $loop->iteration }}]</p>
                    </div>
                    <div class="col-11">
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
                                        <button class="btn btn-primary btn-edit"
                                            data-id="{{ $project->id }}"
                                            data-name="{{ $project->name }}"
                                            data-description1="{{ $project->description1 }}"
                                            data-jenis_projek="{{ $project->jenis_projek }}"
                                            data-status="{{ $project->status ?? 'N/A'}}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#updateProjekModal">
                                            Edit
                                        </button>
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

<!-- Tambah projek -->
<button type="button" class="btn btn-lg end-0 m-5" style="background-color:#65031D;color:#EEEBE5;position:fixed;bottom:0px" data-bs-toggle="modal" data-bs-target="#tambahModal">
    <i class="bi bi-building-fill-add"></i>
</button>
<!-- modal tambah projek -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Projek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Tab content -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="description1" class="form-label">Deskripsi 1</label>
                        <textarea class="form-control" id="description1" name="description1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_projek" class="form-label">Jenis Proyek</label>
                        <select class="form-select" id="jenis_projek" name="jenis_projek">
                            <option value="Architecture">Architecture</option>
                            <option value="Commercial_building">Commercial Building</option>
                            <option value="Interior">Interior</option>
                            <option value="Landscape">Landscape</option>
                            <option value="Renovation">Renovation</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="ongoing">On going</option>
                            <option value="beingDesign">Being Design</option>
                            <option value="finished">Finished</option>
                            <option value="negotiation">Negotiation</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="updateProjekModal" tabindex="-1" aria-labelledby="updateProjekLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProjekLabel">Edit Projek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="projekTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="informasi-tab" data-bs-toggle="tab" data-bs-target="#informasi" type="button" role="tab" aria-controls="informasi" aria-selected="true">Informasi</button>
                    </li>
                </ul>
                <form action="{{ route('projectNego.update', ['status' => request('status'), 'id' => '_placeholder_']) }}" method="POST" enctype="multipart/form-data" id="updateForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editProjekId" name="id">
                    <div class="tab-content mt-3" id="projekTabContent">
                        <!-- Tab Informasi -->
                        <div class="tab-pane fade show active" id="informasi" role="tabpanel" aria-labelledby="informasi-tab">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="description1" class="form-label">Deskripsi 1</label>
                                <textarea class="form-control" id="description1" name="description1"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_projek" class="form-label">Jenis Proyek</label>
                                <select class="form-select" id="jenis_projek" name="jenis_projek">
                                    <option value="Architecture">Architecture</option>
                                    <option value="Commercial_building">Commercial Building</option>
                                    <option value="Interior">Interior</option>
                                    <option value="Landscape">Landscape</option>
                                    <option value="Renovation">Renovation</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="ongoing">On going</option>
                                    <option value="beingDesign">Being Design</option>
                                    <option value="finished">Finished</option>
                                    <option value="negotiation">Negotiation</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on("click", ".btn-edit", function () {
        let id = $(this).data("id");
        let name = $(this).data("name");
        let description1 = $(this).data("description1");
        let jenis_projek = $(this).data("jenis_projek");
        let status = $(this).data("status");

        // Update form action URL by replacing the placeholder with actual ID
        let formAction = $("#updateForm").attr("action").replace('_placeholder_', id);
        $("#updateForm").attr("action", formAction);

        $("#updateProjekModal #editProjekId").val(id);
        $("#updateProjekModal #name").val(name);
        $("#updateProjekModal #description1").val(description1);
        $("#updateProjekModal #jenis_projek").val(jenis_projek);
        $("#updateProjekModal #status").val(status);
    });
</script>



@include('footer')