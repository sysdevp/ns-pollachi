<?php

namespace App;

use App\Models\Employee;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Spatie\Permission\Models\Permission;
use App\Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Role as Roles;
use Spatie\Permission\Models\Permission as Permissions;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    use SoftDeletes;

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
