<?php

use App\DefaultColumn;
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
        // $this->call(UserSeeder::class);

                    // $table->string('title')->nullable();
            // $table->string('environment')->nullable();
            // $table->string('steps_to_reproduce')->nullable();
            // $table->string('expected_result')->nullable();
            // $table->string('actual_result')->nullable();
            // $table->string('visual_proof')->nullable();
            // $table->string('priority')->nullable();
                        // $table->string('url')->nullable();
            // $table->string('description')->nullable();
        $webColumnNames = ["title", "environment", "steps_to_reproduce", "expected_result", "actual_result", "visual_proof", "priority", "url", "description"];
        foreach($webColumnNames as $i => $item){
            $columnNameExists = DefaultColumn::where('name', '=', $item)->first();
            if(!$columnNameExists){
                DefaultColumn::create([
                    "name" => $item,
                    "order" => $i,
                    "type" => "web"
                ]);
            }
        }
    }
}
