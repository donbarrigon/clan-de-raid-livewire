<form action="{{ $route }}" method="POST">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <div class="card-header">
        {{ $title }}
    </div>

    <div class="card-body grid grid-cols-1 md:grid-cols-2 gap-6">
        <flux:input
            label="{{ __('Name') }}"
            name="name"
            placeholder="Nombre del país"
            value="{{ old('name', $country->name ?? '') }}"
            class="col-span-1 md:col-span-2"
        />
        <br>
        <flux:input
            label="ISO3"
            name="iso3"
            placeholder="Código ISO de tres letras"
            value="{{ old('iso3', $country->iso3 ?? '') }}"
        />
        <flux:input
            label="ISO2"
            name="iso2"
            placeholder="Código ISO de dos letras"
            value="{{ old('iso2', $country->iso2 ?? '') }}"
        />
        <flux:input
            label="{{ __('Phone code') }}"
            name="phonecode"
            placeholder="Código de teléfono"
            value="{{ old('phonecode', $country->phonecode ?? '') }}"
        />
        <flux:input
            label="{{ __('Numeric code') }}"
            name="numeric_code"
            placeholder="Código numérico"
            value="{{ old('numeric_code', $country->numeric_code ?? '') }}"
        />
        <flux:input
            label="{{ __('Capital') }}"
            name="capital"
            placeholder="Ciudad capital"
            value="{{ old('capital', $country->capital ?? '') }}"
        />
        <flux:input
            label="{{ __('Currency') }}"
            name="currency"
            placeholder="Moneda"
            value="{{ old('currency', $country->currency ?? '') }}"
        />
        <flux:input
            label="{{ __('Currency name') }}"
            name="currency_name"
            placeholder="Nombre de la moneda"
            value="{{ old('currency_name', $country->currency_name ?? '') }}"
        />
        <flux:input
            label="{{ __('Currency symbol') }}"
            name="currency_symbol"
            placeholder="Símbolo de la moneda"
            value="{{ old('currency_symbol', $country->currency_symbol ?? '') }}"
        />
        <flux:input
            label="TLD"
            name="tld"
            placeholder="TLD"
            value="{{ old('tld', $country->tld ?? '') }}"
        />
        <flux:input
            label="{{ __('Native') }}"
            name="native"
            placeholder="Lengua nativa"
            value="{{ old('native', $country->native ?? '') }}"
        />
        <flux:input
            label="{{ __('Region') }}"
            name="region"
            placeholder="Región"
            value="{{ old('region', $country->region ?? '') }}"
        />
        <flux:input
            label="{{ __('Subregion') }}"
            name="subregion"
            placeholder="Subregión"
            value="{{ old('subregion', $country->subregion ?? '') }}"
        />
        <flux:input
            label="{{ __('Nationality') }}"
            name="nationality"
            placeholder="Nacionalidad"
            value="{{ old('nationality', $country->nationality ?? '') }}"
        />
        <flux:input
            label="{{ __('Timezones') }}"
            name="timezones"
            placeholder="Zonas horarias"
            value="{{ old('timezones', json_encode($country->timezones ?? '')) }}"
        />
        <flux:input
            label="{{ __('Latitude') }}"
            name="latitude"
            placeholder="Latitud"
            value="{{ old('latitude', $country->latitude ?? '') }}"
        />
        <flux:input
            label="{{ __('Longitude') }}"
            name="longitude"
            placeholder="Longitud"
            value="{{ old('longitude', $country->longitude ?? '') }}"
        />
        <flux:input
            label="Emoji"
            name="emoji"
            placeholder="Emoji"
            value="{{ old('emoji', $country->emoji ?? '') }}"
        />
        <flux:input
            label="Emoji U"
            name="emojiU"
            placeholder="Emoji U"
            value="{{ old('emojiU', $country->emojiU ?? '') }}"
        />
    </div>

    <div class="card-footer">
        <flux:button :href="route('dashboard.countries.index')" class="btn btn-warning">
            {{ __('Cancel') }}
        </flux:button>
        <flux:button type="submit" class="btn btn-success ml-6">
            {{ __('Save') }}
        </flux:button>
    </div>
</form>
