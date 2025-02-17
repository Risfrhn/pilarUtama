@include('header')
@include('Component.alert')

<div class="container">
    <div class="row my-5 d-flex justify-content-center">
        <div class="col-12" style="max-width:400px">
            <h5 style="font-size:20px;color:#65031D;margin-left:-20px;" class="fw-semibold d-flex align-items-center"><img src="{{ asset('image/Logo.png') }}" alt="Logo" height="60px" class="d-inline-block align-text-top"> Pilar Utama</h5>
            <p style="font-size:20px;" class="fw-semibold">Forgot Password</p>
            <p style="font-size:12px;" class="fw-medium opacity-50">Silahkan masukkan email anda untuk mendapatkan verifikasi password </p>

            <!-- Form Forgot Password -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group mb-3">
                    <input type="email" name="email" class="form-control border-2 rounded-1 w-100 bg-transparent" style="border-color:#65031D;" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn" style="width:100%;background-color:#65031D;color:#EEEBE5">Submit</button>
            </form>
            <button type="button" class="btn mt-2 border border-2 rounded-2 bg-transparent" onclick="window.location.href='{{ route('login') }}'" style="width:100%;color:#65031D;border-color:#65031D !important;">Kembali</button>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Display Notifications -->
@if(session('email_send'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showToast("{{ session('email_send') }}", "success");
        });
    </script>
@endif

@if($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showToast("{{ $errors->first() }}", "danger");
        });
    </script>
@endif
