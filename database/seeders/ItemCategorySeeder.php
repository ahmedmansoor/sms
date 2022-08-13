<?php

namespace Database\Seeders;

use App\Models\ItemCategory;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemCategory::truncate();

        $path = storage_path('seeders') . DIRECTORY_SEPARATOR . 'item_categories.csv';
        $csvFile = fopen($path, "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if (!$firstline) {
                ItemCategory::create([
                    'name' => $data['0'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}