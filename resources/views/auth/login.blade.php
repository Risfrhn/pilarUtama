@include('header')
@include('Component.alert')


<div class="container">
    <div class="row my-5 d-flex justify-content-center">
        <div class="col-12" style="max-width:400px">
            <h5 style="font-size:20px;color:#65031D;margin-left:-20px;" class="fw-semibold d-flex align-items-center"><img src="{{ asset('image/Logo.png') }}" alt="Logo" height="60px" class="d-inline-block align-text-top"> Pilar Utama</h5>
            <p style="font-size:20px;" class="fw-semibold">Login to your admin account</p>
            <p style="font-size:12px;" class="fw-medium opacity-50">Selamat datang, silahkan masukkan password dan email untuk mengakses halaman admin</p>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control border-2 rounded-1 w-100 bg-transparent" style="border-color:#65031D;" id="exampleInputEmail1" aria-describedby="emailHelp" style="font-size:10px;" placeholder="Masukkan email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control border-2 rounded-1 w-100 bg-transparent" style="border-color:#65031D;" id="exampleInputPassword1" style="font-size:10px;" placeholder="Masukkan Password" required>
                </div>
                <a href="{{route('password.request')}}">
                    <p style="font-size:12px;color:#65031D;" class="fw-semibold mt-2 text-end">Forgot Password</p>
                </a>
                <button type="submit" class="btn" style="width:100%;background-color:#65031D;color:#EEEBE5">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


@if(session('logout_success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showToast("{{ session('logout_success') }}", "success");
        });
    </script>
@endif

@if(session('status'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showToast("{{ session('status') }}", "success");
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