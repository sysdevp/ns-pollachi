<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    public function designation_det()
    {
        return $this->belongsTo(Designation::class, 'role_id', 'id');
    }
    public static function selectall_check($name,$role_id)
    {
        //$checked = DB::table("role_has_permissions")->where("permission_id",$permission_id)->where("role_id",$role_id)->count();

        // $checked = Role::where('permission_id',$data)->count('permission_id');
         $permission = DB::table("permissions")->where("class",$name)->pluck('id');
         $tess = 0;
         $count = count($permission);
         $checked =0;
         $total =0;
        for($i=0;$i<$count;$i++)
        {
            $query = DB::table("role_has_permissions")->where("permission_id",$permission[$i])->where("role_id",$role_id)->get();
            $checked = count($query);
            $total = $checked +$total;

        }

         
         
      //   Permission::where('name',$name)->pluck('id');

        return $total;
    }
    public static function submenu_check($class)
    {
        return $class;

    }
    
}
