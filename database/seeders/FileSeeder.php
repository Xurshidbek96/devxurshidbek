<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        File::create([
            'title' => 'test',
            'img' => 'test',
            'file' => 'test',
        ]) ;
    }
}
