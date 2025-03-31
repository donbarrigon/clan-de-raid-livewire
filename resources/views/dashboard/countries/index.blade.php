<x-layouts.app>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item :href="route('dashboard')">{{ __('Dashboard') }}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{ __('Countries') }}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
</x-layouts.app>