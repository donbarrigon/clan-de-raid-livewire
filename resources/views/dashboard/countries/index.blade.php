<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <flux:breadcrumbs >
            <flux:breadcrumbs.item :href="route('dashboard')">{{ __('Dashboard') }}</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>{{ __('Countries') }}</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        
        <flux:link :href="route('dashboard.countries.create')" class="btn btn-primary">
            {{ __('New') }}
        </flux:link>
    </div>
    
    <div class="data-table">
        <table>
            <thead>
                <tr>
                    <th> {{ __('name') }} </th>
                    <th> {{ __('iso3') }} </th>
                    <th> {{ __('iso2') }} </th>
                    <th> {{ __('numeric_code') }} </th>
                    <th> {{ __('phonecode') }} </th>
                    <th> {{ __('capital') }} </th>
                    <th> {{ __('currency') }} </th>
                    <th> {{ __('currency_name') }} </th>
                    <th> {{ __('currency_symbol') }} </th>
                    <th> {{ __('tld') }} </th>
                    <th> {{ __('native') }} </th>
                    <th> {{ __('region') }} </th>
                    <th> {{ __('subregion') }} </th>
                    <th> {{ __('nationality') }} </th>
                    <th> {{ __('timezones') }} </th>
                    <th> {{ __('latitude') }} </th>
                    <th> {{ __('longitude') }} </th>
                    <th> {{ __('emoji') }} </th>
                    <th> {{ __('emojiU') }} </th>
                    <th class="data-table-actions-header">  </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                    <tr>
                        <td> {{ $country->name }}</td>
                        <td> {{ $country->iso3 }}</td>
                        <td> {{ $country->iso2 }}</td>
                        <td> {{ $country->numeric_code }}</td>
                        <td> {{ $country->phonecode }}</td>
                        <td> {{ $country->capital }}</td>
                        <td> {{ $country->currency }}</td>
                        <td> {{ $country->currency_name }}</td>
                        <td> {{ $country->currency_symbol }}</td>
                        <td> {{ $country->tld }}</td>
                        <td> {{ $country->native }}</td>
                        <td> {{ $country->region }}</td>
                        <td> {{ $country->subregion }}</td>
                        <td> {{ $country->nationality }}</td>
                        <td> {{ implode(', ', $country->timezones ?? []) }}</td>
                        <td> {{ $country->latitude }}</td>
                        <td> {{ $country->longitude }}</td>
                        <td> {{ $country->emoji }}</td>
                        <td> {{ $country->emojiU }}</td>
                        <td class="data-table-actions-column flex">
                            <flux:button :href="route('dashboard.countries.edit', $country)" class="btn btn-info">
                                {{ __('Edit') }}
                            </flux:button>
                            <form class="delete-form" action="{{ route('dashboard.countries.destroy', $country) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <flux:button type="submit" class="btn btn-danger ml-2">
                                    {{ __('Delete') }}
                                </flux:button>
                            </form>
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    @push('js')
    <script>
        // Delete form submission
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', (event) => {
                event.preventDefault();
                const confirmDelete = confirm('{{ __('Are you sure you want to delete this record?') }}');
                if (confirmDelete) {
                    form.submit();
                }
            });
        });
    </script>
    @endpush
</div>

</x-layouts.app>