@include('header')

<div class="container">
    <div class="row my-5 d-flex justify-content-center">
        <div class="col-12" style="max-width:400px">
            <h5 style="font-size:20px;color:#65031D;margin-left:-20px;" class="fw-semibold d-flex align-items-center"><img src="{{ asset('image/Logo.png') }}" alt="Logo" height="60px" class="d-inline-block align-text-top"> Pilar Utama</h5>
            <p style="font-size:20px;" class="fw-semibold">Register admin account</p>
            <p style="font-size:12px;" class="fw-medium opacity-50">Selamat datang, silahkan masukkan password dan email untuk mendaftarkan akun admin</p>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control border-2 rounded-1 w-100 bg-transparent" style="border-color:#65031D;" id="exampleInputEmail1" aria-describedby="emailHelp" style="font-size:10px;" placeholder="Masukkan email">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control border-2 rounded-1 w-100 bg-transparent" style="border-color:#65031D;" id="exampleInputPassword1" style="font-size:10px;" placeholder="Masukkan Password">
                </div>
                <p style="font-size:12px;color:#65031D;" class="fw-semibold mt-2 text-end">Forgot Password</p>
                <button type="submit" class="btn" style="width:100%;background-color:#65031D;color:#EEEBE5">Submit</button>
            </form>
        </div>
    </div>
</div>