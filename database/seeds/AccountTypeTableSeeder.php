<?php

use App\Models\AccountType;
use Illuminate\Database\Seeder;

class AccountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_types')->delete();
        $json=File::get('database/account_type.json');
        $data=json_decode($json);
        foreach($data as $value)
        {
            AccountType::Create(array(
                'name'=>$value->name,
                'remark'=>$value->remark
            ));

        }

    }
}
