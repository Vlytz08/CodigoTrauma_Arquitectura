<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <label for="estado">Filtrar por estado:</label>
                <select id="estado" onchange="filtrarDoctores()">
                    <option value="todos">Todos</option>
                    <option value="1">Disponibles</option>
                    <option value="0">No Disponibles</option>
                </select>

                <ul id="lista-doctores">
                    @foreach($doctores as $doctor)
                        <li data-estado="{{ $doctor->estado }}">
                            {{ $doctor->nombre }} - {{ $doctor->especialidad }} - 
                            {{ $doctor->estado ? 'Disponible' : 'No Disponible' }}
                        </li>
                    @endforeach
                </ul>



            </div>
        </div>
    </div>


    <script>
    function filtrarDoctores() {
        const estadoSeleccionado = document.getElementById('estado').value;
        const doctores = document.querySelectorAll('#lista-doctores li');

        doctores.forEach(doctor => {
            const estadoDoctor = doctor.getAttribute('data-estado');

            if (estadoSeleccionado === 'todos' || estadoDoctor === estadoSeleccionado) {
                doctor.style.display = '';
            } else {
                doctor.style.display = 'none';
            }
        });
    }
</script>
</x-app-layout>
