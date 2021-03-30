<?php

use App\Models\DiscountType;
use Illuminate\Database\Seeder;

class DiscountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discount_types')->delete();
        $json=File::get('database/discount_types.json');
        $data=json_decode($json);
        foreach($data as $value)
        {
            DiscountType::Create(array(
                'name'=>$value->name,
            ));

        }
    }
}
