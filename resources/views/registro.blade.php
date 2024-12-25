<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registro') }}
        </h2>
    </x-slot>

    <div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="contenedor_registro">
                    <form method="POST" action="{{ route('emergencias.store') }}">
                        @csrf
                        <div class="detalle">
                            <span class=" put">
                                <label for="detalle" class="">Ingrese detalle de Emergencia:</label>
                                <input type="text" name="detalle" id="detalle" required class="put1">
                            </span>

                            <span class=" put">
                                <label for="cantidad_pacientes" class="">Ingrese Cantidad de Pacientes:</label>
                                <input type="number" name="cantidad_pacientes" id="cantidad_pacientes" required class="put2" min="1" oninput="generarFormularios()">
                            </span>
                        </div>
                        
                        <div class="formularios_pacientes  " id="formularios_pacientes" >
                        </div>

                        <button type="submit" class="mt-4 bg-blue-500 text-gray px-4 py-2 rounded">Registrar Emergencia</button>
                    </form>
                </div>
        
            </div>
        </div>
       
    </div>
    <footer class="text-center mt-10 p-4 text-gray-500">
        &copy; {{ date('Y') }} Hospital Melipilla
    </footer>

    <script>
        function generarFormularios() {
            const container = document.getElementById('formularios_pacientes');
            const cantidadPacientes = document.getElementById('cantidad_pacientes').value;

            container.innerHTML = '';

            for (let i = 0; i < cantidadPacientes; i++) {
                const pacienteGroup = document.createElement('div');
                pacienteGroup.classList.add('paciente-group');

                pacienteGroup.innerHTML = `
                <div class="paciente_card">
                    <h3>Datos del Paciente ${i + 1}</h3>
                    <div class="grid_item">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre[]" required>
                    </div>
                    
                    <div class="grid_item">
                        <label for="apellidop">Apellido Paterno:</label>
                        <input type="text" name="apellidop[]" required>
                    </div>
                    <div class="grid_item">
                        <label for="apellidom">Apellido Materno:</label>
                        <input type="text" name="apellidom[]" required>
                    </div>
                    <div class="grid_item">
                        <label for="edad">Edad:</label>
                        <input type="number" name="edad[]" min="0" required>
                    </div>

                    <label for="doctores">Doctor:</label>
                    <select name="doctores[]" required>
                        @foreach($doctores as $doctor)
                            <option value="{{ $doctor->id_doctor }}">{{ $doctor->nombre }} - {{ $doctor->especialidad }}</option>
                        @endforeach
                    </select>   
                    </div>
                `;

                container.appendChild(pacienteGroup);
            }
        }
    </script>
</x-app-layout>


