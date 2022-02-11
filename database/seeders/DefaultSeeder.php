<?php

namespace Database\Seeders;

use App\Http\Controllers\RestController;
use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $controller = new RestController();

        $controller->insertDefaultData();
    }
}
