<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cocktail;

class CocktailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[];
        $file_stream = fopen(__DIR__ . '/../../config/cocktails.csv', 'r');
        if ($file_stream === false) {
            exit('cannot open file');
        }

        while(($row = fgetcsv($file_stream)) !==false) {
            $data[] = $row;
        }
        fclose($file_stream);

        foreach($data as $key => $cocktail) {

            if ($key === 0) continue;

            $newCocktail = new Cocktail();
            $newCocktail->name = $cocktail[0];
            $newCocktail->technique = $cocktail[1];

            $newCocktail->save();

        }

    }
}
