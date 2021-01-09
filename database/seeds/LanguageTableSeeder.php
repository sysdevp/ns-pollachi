<?php

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();
        $json=File::get('database/language.json');
        $data=json_decode($json);
        foreach($data as $value)
        {
            Language::Create(array(
                'language_1'=>$value->language_1,
                'language_2'=>$value->language_2,
                'language_3'=>$value->language_3,
            ));

        }
    }
}
