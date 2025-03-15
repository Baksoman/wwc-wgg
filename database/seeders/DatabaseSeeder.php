<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $count = (int) (request()->input('count', 10));
        $this->callWith(CardSeeder::class, ['count' => $count]);
    }
    
}
