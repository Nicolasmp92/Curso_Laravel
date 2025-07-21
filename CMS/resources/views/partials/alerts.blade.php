{{-- ===================== ℹ️ TOASTR ===================== --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof toastr !== 'undefined') {
            @if (session('toast_success'))
                toastr.success(`{{ session('toast_success') }}`);
            @endif

            @if (session('toast_error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "timeOut": "4000"
                };
                toastr.error(`{{ session('toast_error') }}`);
            @endif

            @if (session('toast_warning'))
                toastr.warning(`{{ session('toast_warning') }}`);
            @endif

            @if (session('toast_info'))
                toastr.info(`{{ session('toast_info') }}`);
            @endif
        } else {
            console.warn("⚠️ toastr no está definido al momento de ejecutar los toasts.");
        }
    });
</script>

{{-- ===================== 🚨 SWEETALERT2 ===================== --}}
{{-- Si usas sweetalert de realrashid/sweet-alert --}}
{{-- Este renderiza alert()->success(), alert()->error(), etc. --}}
@include('sweetalert::alert')



{{-- ===================== ❗ SWEETALERT2 Confirmación Eliminación ===================== --}}
<script>
    function confirmarEliminacion(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esto eliminará el usuario permanentemente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar el formulario con el ID correspondiente
                document.getElementById('form-eliminar-' + id).submit();
            }
        });
    }
</script>
