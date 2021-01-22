<?php

use App\Models\CategoryName;
use Illuminate\Database\Seeder;

class CategoryNameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_names')->delete();
        $json=File::get('database/category_name.json');
        $data=json_decode($json);
        foreach($data as $value)
        {
            CategoryName::Create(array(
                'category_1'=>$value->category_1,
                'category_2'=>$value->category_2,
                'category_3'=>$value->category_3,
            ));

        }
    }
}
