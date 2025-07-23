{{-- scripts.blade.php --}}

{{-- ? cuando le das a un textare este deja el puntero donde diste clicl y me salta el ojo asi que este script lo deja en el espacio 0 😄 --}}

<script>
    window.addEventListener('DOMContentLoaded', function () {
        // Posicionar cursor al inicio de cualquier textarea con atributo data-cursor-start
        document.querySelectorAll('textarea[data-cursor-start]').forEach(textarea => {
            textarea.setSelectionRange(0, 0);
            textarea.scrollTop = 0;
        });
    });
</script>
