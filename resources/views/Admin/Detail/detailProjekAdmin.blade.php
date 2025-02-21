@include('header')
@include('Component.alert')

<div class="container mb-5">
    <h1 style="color:#65031D;">{{ $detailProject->name }}</h1>
    <div class="w-100 border border-1 border-dark mb-3"></div>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" style="font-size:10px;"><a href="{{route('dashboardAdmin.view')}}">Home</a></li>
            <li class="breadcrumb-item" style="font-size:10px;"><a href="{{ route('projects.view', ['status' => $status]) }}">List Projek</a></li>
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
                                <form class="position-absolute top-0 start-0 p-2" action="{{ route('projects.deleteImage', ['project_id' => $detailProject->id, 'image_id' => $projectBefore->id, 'type' => 'before']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
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
                        
                        <!-- Tombol hapus -->
                        <form action="{{ route('projects.deleteVideo', ['project_id' => $detailProject->id, 'video_id' => $projectVideo->id]) }}" method="POST" class="position-absolute top-0 end-0 p-2" style="z-index: 1;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
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
                                <form class="position-absolute top-0 start-0 p-2" action="{{ route('projects.deleteImage', ['project_id' => $detailProject->id, 'image_id' => $projectBefore->id, 'type' => 'before']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
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

<!-- BUTTON MENGAMBANG -->
<button type="button" class="btn btn-lg end-0 m-5" style="background-color:#65031D;color:#EEEBE5;position:fixed;bottom:0px" data-bs-toggle="modal" data-bs-target="#updateProjekModal">
    <i class="bi bi-pencil"></i>
</button>
<form id="delete-form" action="{{ route('projects.delete', ['project_id' => $detailProject->id]) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-lg end-0 m-5" style="background-color:#65031D;color:#EEEBE5;position:fixed;bottom:50px" onclick="showDeleteConfirmation()">
        <i class="bi bi-trash-fill"></i>
    </button>
</form>


<!-- MODAL UPDATE -->
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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button" role="tab" aria-controls="media" aria-selected="false">Media</button>
                    </li>
                </ul>
                <form action="{{ route('projects.update', ['status' => $detailProject->status, 'id' => $detailProject->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="tab-content mt-3" id="projekTabContent">
                        <!-- Tab Informasi -->
                        <div class="tab-pane fade show active" id="informasi" role="tabpanel" aria-labelledby="informasi-tab">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $detailProject->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="description1" class="form-label">Deskripsi 1</label>
                                <textarea class="form-control" id="description1" name="description1">{{ $detailProject->description1 }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description2" class="form-label">Deskripsi 2</label>
                                <textarea class="form-control" id="description2" name="description2" >{{ $detailProject->description2 }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_projek" class="form-label">Jenis Proyek</label>
                                <select class="form-select" id="jenis_projek" name="jenis_projek" value="{{ $detailProject->jenis_projek }}">
                                    <option value="Architecture" {{ $detailProject->jenis_projek == 'Architecture' ? 'selected' : '' }}>Architecture</option>
                                    <option value="Commercial_building" {{ $detailProject->jenis_projek == 'Commercial_building' ? 'selected' : '' }}>Commercial Building</option>
                                    <option value="Interior" {{ $detailProject->jenis_projek == 'Interior' ? 'selected' : '' }}>Interior</option>
                                    <option value="Landscape" {{ $detailProject->jenis_projek == 'Landscape' ? 'selected' : '' }}>Landscape</option>
                                    <option value="Renovation" {{ $detailProject->jenis_projek == 'Renovation' ? 'selected' : '' }}>Renovation</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="target_pengerjaan_start" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="target_pengerjaan_start" name="target_pengerjaan_start" value="{{ $detailProject->target_pengerjaan_start }}">
                            </div>
                            <div class="mb-3">
                                <label for="target_pengerjaan_end" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="target_pengerjaan_end" name="target_pengerjaan_end"value="{{ $detailProject->target_pengerjaan_end }}">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" value="{{ $detailProject->status }}">
                                    <option value="ongoing" {{ $detailProject->status == 'ongoing' ? 'selected' : '' }}>On going</option>
                                    <option value="beingDesign" {{ $detailProject->status == 'beingDesign' ? 'selected' : '' }}>Being Design</option>
                                    <option value="finished" {{ $detailProject->status == 'finished' ? 'selected' : '' }}>Finished</option>
                                    <option value="negotiation" {{ $detailProject->status == 'negotiation' ? 'selected' : '' }}>Negotiation</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Tab Media -->
                        <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                            <div class="mb-3">
                                <label for="gambarflyer" class="form-label">Gambar Flyer</label>
                                <input type="file" class="form-control" id="gambarflyer" name="gambarflyer">
                            </div>
                            <div class="mb-3">
                                <img id="gambarflyer" src="{{ asset($detailProject->gambarflyer)}}" alt="Image Preview" class="img-fluid">
                            </div>
                            <div class="mb-3">
                                <label for="foto_before" class="form-label">Foto Before</label>
                                <input type="file" class="form-control" id="foto_before" name="foto_before[]" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="foto_after" class="form-label">Foto After</label>
                                <input type="file" class="form-control" id="foto_after" name="foto_after[]" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="video" class="form-label">Upload Video</label>
                                <input type="file" class="form-control" id="video" name="video[]">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btnClose" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btnSubmit" onclick="showEditDetailConfirmation()">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- MODAL NOTIF -->
<!-- Modal Konfirmasi Edit Detail -->
<div class="modal fade" id="confirmEditDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content" style="background-color: #EEEBE5;">
            <div class="modal-body text-center py-4">
                <h5 class="mb-3">Konfirmasi Edit</h5>
                <p>Apakah anda yakin ingin mengedit data ini?</p>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn" style="background-color: #65031D; color: #EEEBE5;" onclick="submitForm()">Ya, Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Delete -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content" style="background-color: #EEEBE5;">
            <div class="modal-body text-center py-4">
                <h5 class="mb-3">Konfirmasi Hapus</h5>
                <p>Apakah anda yakin ingin menghapus data ini?</p>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn" style="background-color: #65031D; color: #EEEBE5;" onclick="proceedToDelete()">Ya, Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL NOTIF -->
<script>

    function showDeleteConfirmation() {
        const modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        modal.show();
    }
    function proceedToDelete() {
        document.getElementById('delete-form').submit();
    }
</script>


<script>
    function showEditDetailConfirmation() {
        // Tutup modal edit terlebih dahulu
        const editModal = bootstrap.Modal.getInstance(document.getElementById('updateProjekModal'));
        editModal.hide();
        
        // Tampilkan modal konfirmasi
        const confirmModal = new bootstrap.Modal(document.getElementById('confirmEditDetailModal'));
        confirmModal.show();
    }

    function submitForm() {
        // Tutup modal konfirmasi
        const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmEditDetailModal'));
        confirmModal.hide();
        
        // Ambil form dan submit
        const form = document.querySelector('#updateProjekModal form');
        form.submit();
    }    
</script>




<!-- ALERT -->
@if(session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showToast("{{ session('error') }}", "danger");
        });
    </script>
@endif

@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showToast("{{ session('success') }}", "success");
        });
    </script>
@endif

@if(session('info'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showToast("{{ session('info') }}", "info");
        });
    </script>
@endif



@include('footer')