<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;


class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = database_path('csv/data.csv');
        $csvData = file_get_contents($csvFile);
        $rows = array_map('str_getcsv', explode("\n", $csvData));

        foreach ($rows as $row) {
            Location::create([
                'name' => $row[0],
                'latitude' => $row[1],
                'longitude' => $row[2],
            ]);
        }
    }
}
