<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        {{ $slot }}
    </flux:main>

    <!-- insercion de js -->
    @stack('js')
    {{-- mensajes flash --}}
    <x-sesson-flash />

</x-layouts.app.sidebar>
