<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::truncate();

        $path = storage_path('seeders') . DIRECTORY_SEPARATOR . 'departments.csv';
        $csvFile = fopen($path, "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if (!$firstline) {
                Department::create([
                    'name' => $data['0'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}