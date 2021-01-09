<?php

use App\Models\Uom;
use Illuminate\Database\Seeder;

class UomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('uoms')->delete();
        $json=File::get('database/uom.json');
        $data=json_decode($json);
        foreach($data as $value)
        {
            Uom::Create(array(
                'name'=>$value->name,
                'description'=>$value->description,
              ));

        }
    }
}
