    <script>
        $('#tablas').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No existe registros",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No registros disponibles",
                "infoFiltered": "(Mostrando de _MAX_ registros totales)",
                "search": "Buscar",
                "paginate": {
                    'next': "Siguiente",
                    'previous' : "Anterior"
                }
            }
        });
    </script>

    <script>
        @if (session()->has('success'))
        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                icon: 'success',
                title: ' {{ session()->get('success') }}'
            })
        });
    </script>
    @endif
