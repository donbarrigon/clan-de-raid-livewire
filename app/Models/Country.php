<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'iso3', 'iso2', 'numeric_code', 'phonecode',
        'capital', 'currency', 'currency_name', 'currency_symbol',
        'tld', 'native', 'region','subregion', 'nationality',
        'timezones', 'latitude', 'longitude', 'emoji', 'emojiU',
    ];

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

}
