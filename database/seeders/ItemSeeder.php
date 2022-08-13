<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::truncate();

        $path = storage_path('seeders') . DIRECTORY_SEPARATOR . 'items.csv';
        $csvFile = fopen($path, "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if (!$firstline) {
                Item::create([
                    'name' => $data['0'],
                    'item_category_id' => $data['1'],
                    'received_by' => $data['2'],
                    'remarks' => $data['3'],
                    'status' => $data['4'],
                    'qty' => $data['5'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}