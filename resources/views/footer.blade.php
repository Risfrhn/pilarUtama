</main>

@if (!Request::is('Auth.login'))
<footer style="background-color:#65031D; color:#EEEBE5">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-4 col-6 text-lg-start text-center">
                <img src="{{ asset('image/logo2.png') }}" alt="Logo" class="img-fluid" style="max-width: 200px; height: auto;">
            </div>
            <div class="col-lg-4 col-6 mt-5 ">
                <p class="fw-semibold" style="line-height:0.1">Social Media Kami</p>
                <div class="row">
                    <div class="col-12">
                        <i class="bi bi-whatsapp"></i>
                        <a class="text-decoration-none" style="font-size:10px;color:#EEEBE5" href="https://wa.link/ep3vnp" target="_blank">Whatsapp</a>
                    </div>
                    <div class="col-12">
                        <i class="bi bi-instagram"></i>
                        <a href="https://www.instagram.com/pilarutamaa/" class="text-decoration-none" style="font-size:10px;color:#EEEBE5">Instagram</a>
                    </div>
                    <div class="col-12">
                        <i class="bi bi-envelope-at-fill"></i>
                        <a href="mailto:satupilarutama@gmail.com" class="text-decoration-none" style="font-size:10px;color:#EEEBE5">satupilarutama@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mt-0 mt-lg-5 text-lg-start text-center">
                <p class="fst-italic" style="font-size:12px;">" Bagi kami membangun adalah tentang mewujudkan impian anda.. Pilar utama akan memberikan yang terbaik seolah-olah itu adalah impian yang kami miliki."</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <i class="bi bi-c-circle ms-5"> Pilar utama</i>
            </div>
            <div class="col-6 text-end">
                <p class="fst-italic" style="font-size:10px">Layanan jasa konstruksi <br> satu pintu.</p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- animasi aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- js masonry -->
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
</footer>
@endif