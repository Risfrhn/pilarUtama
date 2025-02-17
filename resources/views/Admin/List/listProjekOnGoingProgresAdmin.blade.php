@include('header')

<div class="container mt-1">
    <div class="row">
        <div class="col-md-6 col-lg-8 d-none d-md-block">
            <h1 style="color:#65031D;">Project on going</h1>
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
    </div>
    <div class="row mt-3">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 g-2 d-flex justify-content-center">
            <div class="card overflow-hidden rounded-4 my-1">
                <!-- Gambar Full dengan Sudut Rounded -->
                <img src="{{ asset('image/aboutUs.jpg') }}" class="card-img-top" alt="Card Image" style="width: 100%; height: auto; object-fit: cover; aspect-ratio: 2 / 3; ">

                <!-- Pojok Kiri Atas (Angka) -->
                <div class="position-absolute top-0 start-0 text-dark px-3 py-2 rounded-bottom">
                    99
                </div>

                <!-- Pojok Kanan Atas (Kotak Rounded dengan Teks) -->
                <div class="position-absolute top-0 end-0 text-dark border border-1 border-dark px-3 py-1 mx-3 my-2 rounded-5" 
                    style="background-color:#EEEBE5;font-size:10px">
                    Pilar Utama Utama
                </div>

                <!-- Pojok Kanan Bawah (Lingkaran) -->
                <div class="position-absolute bottom-0 end-0 mx-3 my-2 text-dark border border-1 border-dark rounded-circle d-flex align-items-center justify-content-center" 
                    style="background-color:#EEEBE5;width: 40px; height: 40px;">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 g-2 d-flex justify-content-center">
            <div class="card overflow-hidden rounded-4 my-1">
                <!-- Gambar Full dengan Sudut Rounded -->
                <img src="{{ asset('image/gambar3.jpg') }}" class="card-img-top" alt="Card Image"
                    style="width: 100%; height: auto; object-fit: cover; aspect-ratio: 2 / 3; ">

                <!-- Pojok Kiri Atas (Angka) -->
                <div class="position-absolute top-0 start-0 text-dark px-3 py-2 rounded-bottom">
                    99
                </div>

                <!-- Pojok Kanan Atas (Kotak Rounded dengan Teks) -->
                <div class="position-absolute top-0 end-0 text-dark border border-1 border-dark px-3 py-1 mx-3 my-2 rounded-5" 
                    style="background-color:#EEEBE5;font-size:10px">
                    Label
                </div>

                <!-- Pojok Kanan Bawah (Lingkaran) -->
                <div class="position-absolute bottom-0 end-0 mx-3 my-2 text-dark border border-1 border-dark rounded-circle d-flex align-items-center justify-content-center" 
                    style="background-color:#EEEBE5;width: 40px; height: 40px;">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 g-2 d-flex justify-content-center">
            <div class="card overflow-hidden rounded-4 my-1">
                <!-- Gambar Full dengan Sudut Rounded -->
                <img src="{{ asset('image/gambar1.jpg') }}" class="card-img-top" alt="Card Image" style="width: 100%; height: auto; object-fit: cover; aspect-ratio: 2 / 3; ">

                <!-- Pojok Kiri Atas (Angka) -->
                <div class="position-absolute top-0 start-0 text-dark px-3 py-2 rounded-bottom">
                    99
                </div>

                <!-- Pojok Kanan Atas (Kotak Rounded dengan Teks) -->
                <div class="position-absolute top-0 end-0 text-dark border border-1 border-dark px-3 py-1 mx-3 my-2 rounded-5" 
                    style="background-color:#EEEBE5;font-size:10px">
                    Label
                </div>

                <!-- Pojok Kanan Bawah (Lingkaran) -->
                <div class="position-absolute bottom-0 end-0 mx-3 my-2 text-dark border border-1 border-dark rounded-circle d-flex align-items-center justify-content-center" 
                    style="background-color:#EEEBE5;width: 40px; height: 40px;">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 g-2 d-flex justify-content-center">
            <div class="card overflow-hidden rounded-4 my-1">
                <!-- Gambar Full dengan Sudut Rounded -->
                <img src="{{ asset('image/gambar2.jpg') }}" class="card-img-top" alt="Card Image" style="width: 100%; height: auto; object-fit: cover; aspect-ratio: 2 / 3; ">

                <!-- Pojok Kiri Atas (Angka) -->
                <div class="position-absolute top-0 start-0 text-dark px-3 py-2 rounded-bottom">
                    99
                </div>

                <!-- Pojok Kanan Atas (Kotak Rounded dengan Teks) -->
                <div class="position-absolute top-0 end-0 text-dark border border-1 border-dark px-3 py-1 mx-3 my-2 rounded-5" 
                    style="background-color:#EEEBE5;font-size:10px">
                    Label
                </div>

                <!-- Pojok Kanan Bawah (Lingkaran) -->
                <div class="position-absolute bottom-0 end-0 mx-3 my-2 text-dark border border-1 border-dark rounded-circle d-flex align-items-center justify-content-center" 
                    style="background-color:#EEEBE5;width: 40px; height: 40px;">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 g-2 d-flex justify-content-center">
            <div class="card overflow-hidden rounded-4 my-1">
                <!-- Gambar Full dengan Sudut Rounded -->
                <img src="{{ asset('image/gambar5.jpg') }}" class="card-img-top" alt="Card Image"style="width: 100%; height: auto; object-fit: cover; aspect-ratio: 2 / 3; ">

                <!-- Pojok Kiri Atas (Angka) -->
                <div class="position-absolute top-0 start-0 text-dark px-3 py-2 rounded-bottom">
                    99
                </div>

                <!-- Pojok Kanan Atas (Kotak Rounded dengan Teks) -->
                <div class="position-absolute top-0 end-0 text-dark border border-1 border-dark px-3 py-1 mx-3 my-2 rounded-5" 
                    style="background-color:#EEEBE5;font-size:10px">
                    Label
                </div>

                <!-- Pojok Kanan Bawah (Lingkaran) -->
                <div class="position-absolute bottom-0 end-0 mx-3 my-2 text-dark border border-1 border-dark rounded-circle d-flex align-items-center justify-content-center" 
                    style="background-color:#EEEBE5;width: 40px; height: 40px;">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 g-2 d-flex justify-content-center">
            <div class="card overflow-hidden rounded-4 my-1">
                <!-- Gambar Full dengan Sudut Rounded -->
                <img src="{{ asset('image/gambar4.jpg') }}" class="card-img-top" alt="Card Image" style="width: 100%; height: auto; object-fit: cover; aspect-ratio: 2 / 3; ">

                <!-- Pojok Kiri Atas (Angka) -->
                <div class="position-absolute top-0 start-0 text-dark px-3 py-2 rounded-bottom">
                    99
                </div>

                <!-- Pojok Kanan Atas (Kotak Rounded dengan Teks) -->
                <div class="position-absolute top-0 end-0 text-dark border border-1 border-dark px-3 py-1 mx-3 my-2 rounded-5" 
                    style="background-color:#EEEBE5;font-size:10px">
                    Label
                </div>

                <!-- Pojok Kanan Bawah (Lingkaran) -->
                <div class="position-absolute bottom-0 end-0 mx-3 my-2 text-dark border border-1 border-dark rounded-circle d-flex align-items-center justify-content-center" 
                    style="background-color:#EEEBE5;width: 40px; height: 40px;">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 g-2 d-flex justify-content-center">
            <div class="card overflow-hidden rounded-4 my-1">
                <!-- Gambar Full dengan Sudut Rounded -->
                <img src="{{ asset('image/houses.jpg') }}" class="card-img-top" alt="Card Image"style="width: 100%; height: auto; object-fit: cover; aspect-ratio: 2 / 3; ">

                <!-- Pojok Kiri Atas (Angka) -->
                <div class="position-absolute top-0 start-0 text-dark px-3 py-2 rounded-bottom">
                    99
                </div>

                <!-- Pojok Kanan Atas (Kotak Rounded dengan Teks) -->
                <div class="position-absolute top-0 end-0 text-dark border border-1 border-dark px-3 py-1 mx-3 my-2 rounded-5" 
                    style="background-color:#EEEBE5;font-size:10px">
                    Label
                </div>

                <!-- Pojok Kanan Bawah (Lingkaran) -->
                <div class="position-absolute bottom-0 end-0 mx-3 my-2 text-dark border border-1 border-dark rounded-circle d-flex align-items-center justify-content-center" 
                    style="background-color:#EEEBE5;width: 40px; height: 40px;">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-0">
        <div class="col-12 d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination" >
                    <li class="page-item ">
                    <a class="page-link bg-transparent border-0" href="#" aria-label="Previous">
                        <span aria-hidden="true" style="font-size:20px;color:#65031D;">&laquo;</span>
                    </a>
                    </li>
                    <li class="page-item"><a class="page-link bg-transparent border-0" href="#" style="font-size:20px;color:#65031D;">1</a></li>
                    <li class="page-item"><a class="page-link bg-transparent border-0" href="#" style="font-size:20px;color:#65031D;">2</a></li>
                    <li class="page-item"><a class="page-link bg-transparent border-0" href="#" style="font-size:20px;color:#65031D;">3</a></li>
                    <li class="page-item">
                    <a class="page-link bg-transparent border-0" href="#" aria-label="Next">
                        <span aria-hidden="true" style="font-size:20px;color:#65031D;">&raquo;</span>
                    </a>
                    </li>
                </ul>
                </nav>
        </div>
    </div>
</div>

@include('footer')