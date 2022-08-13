<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::truncate();

        $path = storage_path('seeders') . DIRECTORY_SEPARATOR . 'sections.csv';
        $csvFile = fopen($path, "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if (!$firstline) {
                Section::create([
                    'name' => $data['0'],
                    'department_id' => $data['1'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
