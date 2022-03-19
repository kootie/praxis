<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create the two roles

        $worker = new Role;
        $worker->name = 'Worker';
        $worker->description = 'Looking for work at a residential place';
        $worker->save();

        $resident = new Role;
        $resident->name = 'Resident';
        $resident->description = 'Living in the residence ooking for a worker';
        $resident->save();



    }
}
