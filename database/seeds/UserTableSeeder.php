<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $user=User::Create(array(
                'user_name'=>'admin',
                'password'=>bcrypt('admin'),
             ));

      
            $role = Role::create(['name' => 'Admin']);
       
            $permissions = Permission::pluck('id','id')->all();
      
           // $role->syncPermissions($permissions);
            $role->syncPermissions(Permission::all());
       
            $user->assignRole([$role->id]);

        
    }
}
