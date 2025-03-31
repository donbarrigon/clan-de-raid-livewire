<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fo_countries = fopen(__DIR__ . '/zzz_countries.csv', 'r');
        $titles = fgetcsv($fo_countries);
        $countries = array();
        $fillable = array_flip((new Country)->getFillable());
        while (($row = fgetcsv($fo_countries))!== false)
        {
            $country = array_intersect_key(array_combine($titles, $row), $fillable);
            $country = array_map(fn ($v) => empty($v) ? null : $v, $country);
            $country['timezones'] = json_decode($country['timezones'], true);
            $countries[$row[0]] = Country::create($country);
            echo "Country <". $countries[$row[0]]->id . "> ". $countries[$row[0]]->name . " created\n";
        }
        fclose($fo_countries);

        $fo_states = fopen(__DIR__ . '/zzz_states.csv', 'r');
        $titles = fgetcsv($fo_states);
        $states = array();
        $fillable = array_flip((new State)->getFillable());
        $i = 0;
        $now = now();
        echo "Creating states";
        while (($row = fgetcsv($fo_states))!== false)
        {
            $state = array_intersect_key(array_combine($titles, $row), $fillable);
            $state = array_map(fn ($v) => empty($v) ? null : $v, $state);
            $state['country_id'] = $countries[$state['country_id']]->id;
            $states[$row[0]] = State::create($state);
            echo "State <". $states[$row[0]]->id . "> ". $states[$row[0]]->name . " created\n";
        }
        fclose($fo_states);

        unset($countries);
        $fo_cities = fopen(__DIR__ . '/zzz_cities.csv', 'r');
        $titles = fgetcsv($fo_cities);
        $cities = array();
        $city = array();
        $fillable = array_flip((new City)->getFillable());
        echo "Creating cities";
        while (($row = fgetcsv($fo_cities))!== false)
        {
            $city = array_intersect_key(array_combine($titles, $row), $fillable);
            $city = array_map(fn ($v) => empty($v) ? null : $v, $city);
            $city['state_id'] = $states[$city['state_id']]->id;
            $city['created_at'] = $city['updated_at'] = $now;
            $cities[] = $city;
            if ($i % 2000 === 0) 
            {
                City::insert($cities);
                echo "Cities created [$i]\n";
                $cities = [];
            }
            $i ++;
        }

        if (!empty($cities)) {
            City::insert($cities);
            echo "Cities created [$i]\n";
        }
        fclose($fo_cities);
        echo "si ves esto es por que ya termino.\n";
    }
}
