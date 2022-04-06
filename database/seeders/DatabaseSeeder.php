<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\{
    User, Role, Job
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::factory(2)
            ->state(new Sequence(
                ['name'=>'freelance'],
                ['name'=>'client'],
            ))
            ->create();



       User::factory(6)
           ->has(Role::factory()->count(1))
           ->has(Job::factory()->count(3))
               ->create();

    }
}
