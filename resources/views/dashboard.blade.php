<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Bienvenido " ) }} {{ __(Auth::user()->name )}}
        </h2>
    </x-slot>

  

    <!-- Footer -->
    <footer class="text-center mt-10 p-4 text-gray-500">
        &copy; {{ date('Y') }} Hospital Melipilla
    </footer>
</x-app-layout>
