<?php

use App\Models\LocationType;
use Illuminate\Database\Seeder;

class LocationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('location_types')->delete();
        $json=File::get('database/location_type.json');
        $data=json_decode($json);
        foreach($data as $value)
        {
            LocationType::Create(array(
                'name'=>$value->name,
                'remark'=>$value->remark
            ));

        }

    }
}
