<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial de Emergencias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container_historial">
                    @foreach($emergencias as $emergencia)
                        <div class="emergencia-contenedor mb-4 p-4 border rounded">
                            
                            <div class="detalle">
                                <h3>Emergencia N°{{ $emergencia->id_emergencia }}</h3>
                                <p><strong>Detalle:</strong> {{ $emergencia->detalle }}</p>
                                <p>{{ $emergencia->fecha }} {{ $emergencia->hora}}</p>
                            </div>
                            <div class="involucrados">
                                <h4>Pacientes y Doctores</h4>
                                <table class="table mt-2">
                                    <thead>
                                        <tr>
                                            <th>Paciente</th>
                                            <th>Edad</th>
                                            <th>Doctor</th>
                                            <th>Especialidad </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($emergencia->pacientes as $paciente)
                                            <tr>
                                                <td>{{ $paciente->nombre }} {{ $paciente->apellidop }} {{ $paciente->apellidom }}</td>
                                                <td>{{ $paciente->edad }}</td>
                                                <td>{{ $paciente->doctor->nombre }}</td>
                                                <td>{{ $paciente->doctor->especialidad }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
    <footer class="text-center mt-10 p-4 text-gray-500">
                    &copy; {{ date('Y') }} Hospital Melipilla
                </footer>
</x-app-layout>