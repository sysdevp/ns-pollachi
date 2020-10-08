<?php

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
         $this->call(LocationTypeTableSeeder::class);
      //   $this->call(UomTableSeeder::class);
         $this->call(AddressTypeTableSeeder::class);
         $this->call(AccountTypeTableSeeder::class);
         $this->call(CategoryNameTableSeeder::class);
         $this->call(LanguageTableSeeder::class);
         $this->call(PermissionTableSeeder::class);
         $this->call(UserTableSeeder::class);
         //$this->call(DiscountTypeTableSeeder::class);
    }
}
