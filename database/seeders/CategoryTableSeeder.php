<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Category::all() as $category){
            $category->delete();
        }

//        Category::factory()->count(10)->create();

        Category::query()->insert([
            ['id'=>1,'name'=>'صنایع دستی','slug'=>Str::random('6'),'parent_id'=>null],
            ['id'=>2,'name'=>'سفال','slug'=>Str::random('6'),'parent_id'=>1],
            ['id'=>3,'name'=>'مسی','slug'=>Str::random('6'),'parent_id'=>1],
            ['id'=>4,'name'=>'خراطی','slug'=>Str::random('6'),'parent_id'=>1],
            ['id'=>5,'name'=>'خمکاری','slug'=>Str::random('6'),'parent_id'=>1],
            ['id'=>6,'name'=>'گلیم ','slug'=>Str::random('6'),'parent_id'=>1],
            ['id'=>7,'name'=>'قالی ','slug'=>Str::random('6'),'parent_id'=>1],
            ['id'=>8,'name'=>'جاجیم','slug'=>Str::random('6'),'parent_id'=>1],
        ]);
    }
}
