@if (session('success'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 4000)" 
        class="fixed top-4 right-4 z-50 bg-green-500 text-white shadow-lg px-6 py-3 rounded-lg border border-green-600 flex items-center gap-3 transition-transform transform ease-in-out duration-300"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-y-[-20px] opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 translate-y-[-20px]"
    >
        <!-- Ícono de Check (Heroicons o Lucide) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-3-3a1 1 0 111.414-1.414L9 11.586l6.293-6.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
        </svg>

        <span class="font-medium">{{ __(session('success')) }}</span>
    </div>
@endif
