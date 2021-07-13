<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentAreaMappingDetails extends Model
{
    use SoftDeletes;
    public function agent_area_mapping_details(){
        return $this->hasMany(AgentAreaMappingDetails::class);
    }
    public function area(){
        return $this->belongsTo(Area::class,"area_id","id");
    }
}
