<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use App\Models\Platform;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $tags = ['metaphisical', 'horrific', 'visionary', 'funny'];
        
        foreach($tags as $name){
            Tag::create([
                'name'=>$name,
                ]);
            }


            
        $platforms = ['canal+', 'mubi', 'piratebay', 'cineblog'];
        
        foreach($platforms as $platform){
            Platform::create([
                'name'=>$platform,
                ]);
            }
   
    }
}
