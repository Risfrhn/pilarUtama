<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="customToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <span id="toastMessage">Pesan berhasil!</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    function showToast(message, type = 'success') {
        var toastEl = document.getElementById('customToast');
        var toastBody = document.getElementById('toastMessage');

        // Set warna sesuai tipe (success, danger, warning, info)
        toastEl.classList.remove('bg-success', 'bg-danger', 'bg-warning', 'bg-info');
        toastEl.classList.add('bg-' + type);

        // Ubah teks toast
        toastBody.innerText = message;

        // Tampilkan toast
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    }
</script>
