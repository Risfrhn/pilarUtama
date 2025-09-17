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
    <img src="{{ $item->flyer_image }}" class="img-fluid mb-5" style="width:100%" alt="Deskripsi Gambar">

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
            <div class="col-12 col-lg-3 d-flex justify-content-center">
                <img id="layananImage" src="{{ $item->architectur_image }}" class="img-fluid mb-5" style="height: 200px; width:100%" alt="Service Image">
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
        <h1 style="color:#65031D;">Our Project</h1>
        <div class="w-100 border border-1 border-dark"></div>

        <div class="container mt-5">
            <div class="row text-center ">
                <!-- Finished Projects -->
                <div class="col-6 col-lg-3 g-2">
                    <a href="{{ route('projects.view', ['status' => 'finished']) }}" style="text-decoration:none;color:black;">
                        <div class="kotak border border-1 border-dark d-flex flex-column justify-content-center align-items-center rounded-4" style="height: 100px;">
                            <h3 class="mt-3" style="color:#65031D;">{{ $finishedProjects }}+</h3>
                            <p>Finished Projects</p>
                        </div>
                    </a>
                </div>

                <!-- Ongoing Projects -->
                <div class="col-6 col-lg-3 g-2">
                    <a href="{{ route('projects.view', ['status' => 'ongoing']) }}" style="text-decoration:none;color:black;">
                        <div class="kotak border border-1 border-dark d-flex flex-column justify-content-center align-items-center rounded-4" style="height: 100px;">
                            <h3 class="mt-3" style="color:#65031D;">{{ $ongoingProjects }}+</h3>
                            <p>On Going Projects</p>
                        </div>
                    </a>
                </div>

                <!-- Projects Being Designed -->
                <div class="col-6 col-lg-3 g-2">
                    <a href="{{ route('projects.view', ['status' => 'being_design']) }}" style="text-decoration:none;color:black;">
                        <div class="kotak border border-1 border-dark d-flex flex-column justify-content-center align-items-center rounded-4" style="height: 100px;">
                            <h3 class="mt-3" style="color:#65031D;">{{ $designProjects }}+</h3>
                            <p>Projects Being Designed</p>
                        </div>
                    </a>
                </div>

                <!-- Negotiation Projects -->
                <div class="col-6 col-lg-3 g-2">
                    <a href="{{ route('projectsNego.view', ['status' => 'negotiation']) }}"  
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

<button type="button" class="btn btn-lg end-0 m-5" style="background-color:#65031D;color:#EEEBE5;position:fixed;bottom:50px" data-bs-toggle="modal" data-bs-target="#editModal">
    <i class="bi bi-pencil"></i>
</button>
<button type="button" class="btn btn-lg end-0 m-5" style="background-color:#65031D;color:#EEEBE5;position:fixed;bottom:100px" data-bs-toggle="modal" data-bs-target="#tambahModal">
    <i class="bi bi-building-fill-add"></i>
</button>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
    @csrf
    <button type="button" class="btn btn-lg position-fixed bottom-0  end-0 m-5" style="background-color:#65031D;color:#EEEBE5" onclick="showLogoutConfirmation()"s>
        <i class="bi bi-door-open-fill"></i>
    </button>
</form>
<button type="button" class="btn btn-lg end-0 m-5"
    style="background-color:#65031D;color:#EEEBE5;position:fixed;bottom:150px;"
    data-bs-toggle="modal" data-bs-target="#confirmBackupModal">
    <i class="bi bi-cloud-arrow-down-fill"></i> 
</button>
{{--<a href="{{ route('backup.database') }}" class="btn btn-primary">Backup Database</a>
<a href="{{ route('backup.public') }}" class="btn btn-secondary">Backup Public Files</a>--}}





<!-- MODAL -->
<!-- modal edit landing -->
@foreach($modalData as $item)
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Nav pills -->
                    <ul class="nav nav-tabs" id="modalTabs" role="tablist">
                        <li class="nav-item " role="presentation">
                            <a class="nav-link active"  id="tab1-tab" data-bs-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Flyer</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab2-tab" data-bs-toggle="pill" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">About Us</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab3-tab" data-bs-toggle="pill" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Layanan</a>
                        </li>
                    </ul>

                    <!-- Tab content -->
                    <div class="tab-content mt-3" id="modalTabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                            <div class="mb-3">
                                <label for="imageInput" class="form-label">Masukkan gambar flyer</label>
                                <input type="file" class="form-control" id="imageInput" name="imageflyer" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <img id="previewImage" src="{{ asset($item->flyer_image) }}" alt="Image Preview" class="img-fluid">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                            <!-- Input untuk Desk 1 -->
                            <div class="mb-3">
                                <label for="desk1" class="form-label">Desk 1</label>
                                <textarea id="desk1" name="desk1" class="form-control" rows="3">{{ $item->about_us_desk1 }}</textarea>
                            </div>

                            <!-- Input untuk Gambar About Us -->
                            <div class="mb-3">
                                <label for="gambarAboutUs" class="form-label">Upload Gambar About Us</label>
                                <input type="file" id="gambarAboutUs" name="gambarAboutUs" class="form-control" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <img id="previewImage" src="{{ asset($item->about_us_image) }}" alt="Image Preview" class="img-fluid">
                            </div>

                            <!-- Input untuk Desk 2 -->
                            <div class="mb-3">
                                <label for="desk2" class="form-label">Desk 2</label>
                                <textarea id="desk2" name="desk2" class="form-control" rows="3">{{ $item->about_us_desk2}}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                            <!-- Arsitektur -->
                            <div class="mb-4">
                                <h5>Arsitektur</h5>
                                <div class="mb-3">
                                    <label for="architecturDesk" class="form-label">Deskripsi Arsitektur</label>
                                    <textarea id="architecturDesk" name="architectur_desk" class="form-control" rows="3">{{ $item->architectur_desk}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="architecturImage" class="form-label">Upload Gambar Arsitektur</label>
                                    <input type="file" id="architecturImage" name="architecturImage" class="form-control" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <img id="architecturPreviewImage" src="{{ asset($item->architectur_image)}}" alt="Image Preview" class="img-fluid">
                                </div>
                            </div>

                            <!-- Interior -->
                            <div class="mb-4">
                                <h5>Interior</h5>
                                <div class="mb-3">
                                    <label for="interiorDesk" class="form-label">Deskripsi Interior</label>
                                    <textarea id="interiorDesk" name="interior_desk" class="form-control" rows="3">{{ $item->interior_desk}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="interiorImage" class="form-label">Upload Gambar Interior</label>
                                    <input type="file" id="interiorImage" name="interiorImage" class="form-control" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <img id="interiorPreviewImage" src="{{ asset($item->interior_image) }}" alt="Image Preview" class="img-fluid">
                                </div>
                            </div>

                            <!-- Landscape -->
                            <div class="mb-4">
                                <h5>Landscape</h5>
                                <div class="mb-3">
                                    <label for="landscapeDesk" class="form-label">Deskripsi Landscape</label>
                                    <textarea id="landscapeDesk" name="landscape_desk" class="form-control bg-transparent border-2" rows="3">{{ $item->landscape_desk}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="landscapeImage" class="form-label">Upload Gambar Landscape</label>
                                    <input type="file" id="landscapeImage" name="landscapeImage" class="form-control bg-transparent border-2" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <img id="landscapePreviewImage" src="{{ asset($item->landscape_image) }}" alt="Image Preview" class="img-fluid">
                                </div>
                            </div>

                            <!-- Renovasi -->
                            <div class="mb-4">
                                <h5>Renovasi</h5>
                                <div class="mb-3">
                                    <label for="renovationDesk" class="form-label">Deskripsi Renovasi</label>
                                    <textarea id="renovationDesk" name="renovation_desk" class="form-control bg-transparent border-2" rows="3">{{ $item->renovation_desk}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="renovationImage" class="form-label">Upload Gambar Renovasi</label>
                                    <input type="file" id="renovationImage" name="renovationImage" class="form-control bg-transparent border-2" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <img id="renovationPreviewImage" src="{{ asset($item->renovation_image) }}" alt="Image Preview" class="img-fluid">
                                </div>
                            </div>

                            <!-- Commercial Build -->
                            <div class="mb-4">
                                <h5>Commercial Build</h5>
                                <div class="mb-3">
                                    <label for="comercialBuildDesk" class="form-label">Deskripsi Commercial Build</label>
                                    <textarea id="comercialBuildDesk" name="comercial_build_desk" class="form-control bg-transparent border-2" rows="3">{{ $item->comercial_build_desk}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="comercialBuildImage" class="form-label">Upload Gambar Commercial Build</label>
                                    <input type="file" id="comercialBuildImage" name="comercialBuildImage" class="form-control bg-transparent border-2" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <img id="comercialBuildPreviewImage" src="{{ asset($item->comercial_build_image) }}" alt="Image Preview" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btnClose" style="border-color: #65031D; color:#65031D" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btnSubmit" onclick="showEditDetailConfirmation()" style="background-color: #65031D">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
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
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name"  name="name">
                    </div>
                    <div class="mb-3">
                        <label for="description1" class="form-label">Deskripsi 1</label>
                        <textarea class="form-control" id="description1"  name="description1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description2" class="form-label">Deskripsi 2</label>
                        <textarea class="form-control" id="description2"  name="description2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_projek" class="form-label">Jenis Proyek</label>
                        <select class="form-select" id="jenis_projek"  name="jenis_projek">
                            <option value="Architecture">Architecture</option>
                            <option value="Commercial_building">Commercial Building</option>
                            <option value="Interior">Interior</option>
                            <option value="Landscape">Landscape</option>
                            <option value="Renovation">Renovation</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="target_pengerjaan_start" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="target_pengerjaan_start"  name="target_pengerjaan_start">
                    </div>
                    <div class="mb-3">
                        <label for="target_pengerjaan_end" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="target_pengerjaan_end"  name="target_pengerjaan_end">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status"  name="status">
                            <option value="ongoing">On going</option>
                            <option value="being_design">Being Design</option>
                            <option value="finished">Finished</option>
                            <option value="negotiation">Negotiation</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gambarflyer" class="form-label">Gambar Flyer</label>
                        <input type="file" class="form-control" id="gambarflyer"  name="gambarflyer">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btnClose" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btnSubmit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- NOTIF -->
<!-- Modal Konfirmasi Logout -->
<div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content" style="background-color: #EEEBE5;">
            <div class="modal-body text-center py-4">
                <h5 class="mb-3">Konfirmasi Logout</h5>
                <p>Apakah anda yakin ingin keluar?</p>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn" style="background-color: #65031D; color: #EEEBE5;" onclick="proceedToLogout()">Ya, Keluar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Save Changes -->
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

<!-- Modal Konfirmasi backup -->
<div class="modal fade" id="confirmBackupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content" style="background-color: #EEEBE5;">
            <div class="modal-body text-center py-4">
                <h5 class="mb-3">Konfirmasi backup data</h5>
                <p>Apakah anda yakin ingin membackup data?</p>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn" style="background-color: #65031D; color: #EEEBE5;" onclick="proceedToBackup()">Ya, backup</button>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- LAYANAN GANTI GAMBAR -->
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

<!-- LOGIC UNTUK MENGHILANGKAN INPUTAN UNTUK NEGOTIATION -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const statusSelect = document.getElementById("status");
        const description2 = document.getElementById("description2").closest(".mb-3");
        const targetStart = document.getElementById("target_pengerjaan_start").closest(".mb-3");
        const targetEnd = document.getElementById("target_pengerjaan_end").closest(".mb-3");
        const gambarflyer = document.getElementById("gambarflyer").closest(".mb-3");

        function toggleFields() {
            if (statusSelect.value === "negotiation") {
                description2.style.display = "none";
                targetStart.style.display = "none";
                targetEnd.style.display = "none";
                gambarflyer.style.display = "none";
            } else {
                description2.style.display = "block";
                targetStart.style.display = "block";
                targetEnd.style.display = "block";
                gambarflyer.style.display = "block";
            }
        }

        statusSelect.addEventListener("change", toggleFields);
        toggleFields(); // Panggil saat halaman dimuat untuk memastikan inputan disembunyikan jika perlu
    });
</script>

<!-- NOTIF -->
<script>

    function showLogoutConfirmation() {
        const modal = new bootstrap.Modal(document.getElementById('confirmLogoutModal'));
        modal.show();
    }

    function proceedToLogout() {
        document.getElementById('logout-form').submit();
    }
</script>
<script>

    function showBackupConfirmation() {
        const modal = new bootstrap.Modal(document.getElementById('confirmBackupModal'));
        modal.show();
    }

    function proceedToBackup() {
        window.location.href = "{{ route('admin.backup.all') }}";
    }
</script>
<script>
    function showEditDetailConfirmation() {
        // Tutup modal edit terlebih dahulu
        const editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
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
        const form = document.querySelector('#editModal form');
        form.submit();
    }    
</script>


@if(session('login_success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showToast("{{ session('login_success') }}", "success");
        });
    </script>
@endif

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





