<?php

namespace Database\Seeders;

use App\Models\Product;
use Exception;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(__DIR__ . "/amazon_clean_mini.csv", "r");

        $onFirstLine = true;
        $count = 0;
        while(($data = fgetcsv($csvFile, 0, ",")) !== false)
        {
            try
            {
                if ($onFirstLine)
                    $onFirstLine = false;
                else
                {
                    echo $count . " / 5860\n";
                    $count++;

                    $categories = explode("|", $data[1]);
                    $categories = str_replace('&', 'and', $categories);

                    Product::create([
                        "name" => $data[0],
                        "category" => $categories[0],
                        "subcategory" => $categories[1],
                        "price" => $data[2],
                        "about" => $data[3],
                        "details" =>$data[4],
                        "weight" => $data[5],
                        "image" => $data[6]
                    ]);
                }
            }
            catch (Exception $e)
            {
                //Ignore line
            }
        }

        fclose($csvFile);
    }
}
