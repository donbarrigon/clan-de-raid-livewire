<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <flux:breadcrumbs >
            <flux:breadcrumbs.item :href="route('dashboard')">{{ __('Dashboard') }}</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('dashboard.countries.index')">{{ __('Countries') }}</flux:breadcrumbs.item>
            <flux:breadcrumbs.item >{{ __('Edit') }}</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        
    </div>
    <div class="card">
        @include('dashboard.countries.form', [
            'route' => route('dashboard.countries.update', $country),
            'title' => __('Edit country'),
            'isEdit' => true,
            'country' => $country
        ])
    </div>
    
</x-layouts.app>