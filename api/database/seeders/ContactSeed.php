<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'phone' => 'Física',
            'email' => 'Física',
            'address' => 'Física',
            'facebook' => 'Física',
            'twitter' => 'Física',
            'instagram' => 'Física',
            'googlemaps' => 'Física'
        ]);
    }
}
