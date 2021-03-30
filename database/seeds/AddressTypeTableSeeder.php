<?php

use App\Models\AddressType;
use Illuminate\Database\Seeder;

class AddressTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address_types')->delete();
        $json=File::get('database/address_type.json');
        $data=json_decode($json);
        foreach($data as $value)
        {
            AddressType::Create(array(
                'name'=>$value->name,
                'remark'=>$value->remark
            ));

        }
    }
}
