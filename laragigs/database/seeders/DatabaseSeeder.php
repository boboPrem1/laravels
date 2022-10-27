<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);
        Listing::factory(15)->create([
            'user_id' => $user->id
        ]);

        // Listing::create([
        //     'id' => 1,
        //     'title' => 'Listing One',
        //     'tags' => 'java,c++,c',
        //     'company' => 'Diarra',
        //     'location' => 'Lomé, Togo',
        //     'email' => 'diarramamadou@miridoo.com',
        //     'website' => 'www.mirridoo.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
        //          Dolore corrupti atque porro culpa vero repudiandae placeat? Temporibus excepturi
        //           corporis, deserunt, ab eum alias eos similique beatae eius natus dolor doloremque.
        //           Lorem ipsum dolor sit amet consectetur adipisicing elit.
        //           Dolore corrupti atque porro culpa vero repudiandae placeat? Temporibus excepturi
        //            corporis, deserunt, ab eum alias eos similique beatae eius natus dolor doloremque.'
        // ]);
        // Listing::create([
        //     'id' => 2,
        //     'title' => 'Listing Two',
        //     'tags' => 'javascript',
        //     'company' => 'Togocel',
        //     'location' => 'Lomé, Togo',
        //     'email' => 'contactstogocel@gmail.com',
        //     'website' => 'www.togocel.tg',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
        //          Dolore corrupti atque porro culpa vero repudiandae placeat? Temporibus excepturi
        //           corporis, deserunt, ab eum alias eos similique beatae eius natus dolor doloremque.
        //           Lorem ipsum dolor sit amet consectetur adipisicing elit.
        //           Dolore corrupti atque porro culpa vero repudiandae placeat? Temporibus excepturi
        //            corporis, deserunt, ab eum alias eos similique beatae eius natus dolor doloremque.'
        // ]);
        // Listing::create([
        //     'id' => 3,
        //     'title' => 'Listing Three',
        //     'tags' => 'arduino,c++,c',
        //     'company' => 'CEET',
        //     'location' => 'Lomé, Togo',
        //     'email' => 'contactsceet@gmail.com',
        //     'website' => 'www.ceet-tg.tg',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
        //          Dolore corrupti atque porro culpa vero repudiandae placeat? Temporibus excepturi
        //           corporis, deserunt, ab eum alias eos similique beatae eius natus dolor doloremque.
        //           Lorem ipsum dolor sit amet consectetur adipisicing elit.
        //           Dolore corrupti atque porro culpa vero repudiandae placeat? Temporibus excepturi
        //            corporis, deserunt, ab eum alias eos similique beatae eius natus dolor doloremque.'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
