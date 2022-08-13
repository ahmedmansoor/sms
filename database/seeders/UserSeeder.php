<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        //1
        $user = User::create([
            'name' => 'Ahmed Mansoor',
            'section_id' => '1',
            'position' => 'Web Developer',
            'mobile' => '9134183',
            'email' => 'ahmed.mansoor@finance.gov.mv',
            'status' => '1',
            'password' => bcrypt('Minions321*')
        ]);
        $user->assignRole('super-admin');

        //2
        $user = User::create([
            'name' => 'Supervisor',
            'section_id' => '1',
            'position' => 'Supervisor',
            'mobile' => '8888777',
            'email' => 'supervisor@finance.gov.mv',
            'status' => '1',
            'password' => bcrypt('Admin321*')
        ]);
        $user->assignRole('admin');

        //3
        $user = User::create([
            'name' => 'Clerk',
            'section_id' => '1',
            'position' => 'Clerk',
            'mobile' => '9000775',
            'email' => 'clerk@finance.gov.mv',
            'status' => '1',
            'password' => bcrypt('Admin321*')
        ]);
        $user->assignRole('inventory-clerk');

        //2
        $user = User::create([
            'name' => 'User',
            'section_id' => '1',
            'position' => 'User',
            'mobile' => '3334568',
            'email' => 'user@finance.gov.mv',
            'status' => '1',
            'password' => bcrypt('Admin321*')
        ]);
        $user->assignRole('user');

        // $path = storage_path('seeders') . DIRECTORY_SEPARATOR . 'users.csv';
        // $csvFile = fopen($path, "r");

        // $firstline = true;
        // while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
        //     if (!$firstline) {
        //         $user = User::create([
        //             'name' => $data['0'],
        //             'section_id' => $data['1'],
        //             'position' => $data['2'],
        //             'mobile' => $data['3'],
        //             'status' => $data['4'],
        //             'email' => $data['5'],
        //             'password' => bcrypt($data['6']),
        //         ]);

        //         $user->assignRole('admin');
        //     }
        //     $firstline = false;
        // }
        // fclose($csvFile);
    }
}