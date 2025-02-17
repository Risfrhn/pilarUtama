@include('header')
@include('Component.alert')

<div class="container">
    <div class="row my-5 d-flex justify-content-center">
        <div class="col-12" style="max-width:400px">
            <h5 style="font-size:20px;color:#65031D;margin-left:-20px;" class="fw-semibold d-flex align-items-center"><img src="{{ asset('image/Logo.png') }}" alt="Logo" height="60px" class="d-inline-block align-text-top"> Pilar Utama</h5>
            <p style="font-size:20px;" class="fw-semibold">Forgot Password</p>
            <p style="font-size:12px;" class="fw-medium opacity-50">Silahkan masukkan email anda untuk mendapatkan verifikasi password </p>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="form-group mb-3">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control border-2 rounded-1 w-100 bg-transparent" style="border-color:#65031D;" placeholder="Masukkan email" required>
                </div>

                <div class="form-group mb-3">
                    <input type="password" name="password" class="form-control border-2 rounded-1 w-100 bg-transparent" style="border-color:#65031D;" placeholder="Masukkan Password Baru" required>
                </div>

                <div class="form-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control border-2 rounded-1 w-100 bg-transparent" style="border-color:#65031D;" placeholder="Masukkan Ulang Password Baru" required>
                </div>
                <button type="submit" class="btn" style="width:100%;background-color:#65031D;color:#EEEBE5">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Display Notifications -->



@if($errors->has('email'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showToast("{{ $errors->first('email') }}", "danger");
        });
    </script>
@endif

@if($errors->has('password'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showToast("{{ $errors->first('password') }}", "danger");
        });
    </script>
@endif
