<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Countries
        $countries = Country::pluck('id', 'name')->toArray();

        // Open CSV file
        $file = fopen(storage_path('csv/worldcities.csv'), 'r');

        // Skip first line
        fgetcsv($file);

        $countriesList = [];

        // Read data from CSV file
        while (($data = fgetcsv($file)) !== false) {
            $name = $data[1];
            $country_name = $data[4];

            if ( ! array_key_exists( $country_name, $countriesList ) ) {
                $country = Country::where('name', $country_name)->first();
                $countriesList[$country_name] = [
                    'id' => $country->id,
                    'counter' => 1,
                ];
            } else {
                $countriesList[$country_name]['counter']++;
            }

            // This is to avoid inserting more than 3 cities per country, for testing purposes
            if ( $countriesList[$country_name]['counter'] < 3 ) {
                $city = City::where('name', $name)->where('country_id', $countriesList[$country_name]['id'])->first();

                // Insert data into cities table
                if ( ! $city) {
                    $city = City::create([
                        'country_id' => $countries[$data[4]], // $country->id,
                        'name' => $name,
                        'lat' => $data[2],
                        'lng' => $data[3],
                        'population' => empty( $data[9] ) ? null : $data[9],
                    ]);
                }
            }
        }

        // Close CSV file
        fclose($file);
    }
}
