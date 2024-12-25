<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container_doctores">

                    <div class="filtro_estado">
                        <label for="estado" class="block text-sm font-medium text-gray-700">Filtrar por Estado</label>
                        <select id="estado" onchange="filtrarDoctores()" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="todos">Todos</option>
                            <option value="1">Disponible</option>
                            <option value="2">Ocupado</option>
                        </select>
                    </div>

                    <table class="tbl_doctores">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Especialidad</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor)
                                <tr data-estado="{{ $doctor->estado }}">
                                    <td>{{ $doctor->nombre }}</td>
                                    <td>{{ $doctor->edad }}</td>
                                    <td>{{ $doctor->especialidad }}</td>
                                    <td>{{ $doctor->correo }}</td>
                                    <td>{{ $doctor->celular }}</td>
                                    <td>{{ $doctor->estado == 1 ? 'Disponible' : 'Ocupado' }}</td>
                                    <td>
                                        @if ($doctor->estado == 2) <!-- Solo mostrar si el estado es 'ocupado' -->
                                            <form action="{{ route('doctors.update', $doctor->id_doctor) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="bg-green-500 hover:bg-green-700  font-bold py-2 px-4 rounded">
                                                    Liberar
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="text-center mt-10 p-4 text-gray-500">
                    &copy; {{ date('Y') }} Hospital Melipilla
                </footer>
            </div>
        </div>
    </div>

    <script>
        function filtrarDoctores() {
            const estadoSeleccionado = document.getElementById('estado').value;
            const doctores = document.querySelectorAll('tbody tr');

            doctores.forEach(doctor => {
                const estadoDoctor = doctor.getAttribute('data-estado');

                if (estadoSeleccionado === 'todos' || estadoDoctor === estadoSeleccionado) {
                    doctor.style.display = '';
                } else {
                    doctor.style.display = 'none';
                }
            });
        }


        function cambiarEstado(id) {
        fetch(`/doctores/${id}/cambiar-estado`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Asegúrate de incluir el token CSRF
            },
            body: JSON.stringify({
                estado: 1 // Cambiar a disponible
            })
        })
        .then(response => {
            if (response.ok) {
                // Actualizar la interfaz después de la respuesta exitosa
                alert('El estado del doctor ha sido actualizado a disponible.');
                location.reload(); // Recargar la página para reflejar los cambios
            } else {
                alert('Error al actualizar el estado.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    </script>
</x-app-layout>
