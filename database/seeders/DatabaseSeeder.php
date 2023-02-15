<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory()->create([
            'name' => 'Андрей',
             'email' => 'wotacc0809@gmail.com',
             'role' => '1',
             'password' => '$2y$10$5sXScqKhyjdwuGvy/i1IaeZxD7jUA6sqXpTCIKVLFpzlng9K0bmZ.',
         ]);
        /*\App\Models\Type::factory()->create([
            'name' => 'Процессоры',
            'image' => '202302151146LTPJ9n7GZpsuBF7OOloGi7TzUEltjqRKaCfWbvxh.jpg',
        ]);
        \App\Models\Char::factory()->create([
            'type_id' => '1',
            'chars' => '{"asd":"none","asd1":"none"}',
        ]);
        \App\Models\Product::factory()->create([
            'type_id' => '1',
            'name' => 'Intel core i9-9900k',
            'image' => '202302151146x3z4mXxUTYdVvbXVJwUzSdnzmgwYBhh5ba4cW43D.jpg',
            'description' => 'Творческий онлайн-конкурс #БУКТОК среди школьников 7-10 классов с. Бердигестях продлен до 15 ноября.',
            'price' => '56000',
            'sale' => '56000',
            'available' => '100',
            'chars' => '{"asd":"23","asd1":"45"}',
        ]);*/
    }
}
