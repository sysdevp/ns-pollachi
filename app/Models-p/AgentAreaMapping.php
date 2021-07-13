<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentAreaMapping extends Model
{
    use SoftDeletes;

    public function agent_area_mapping_detail()
    {
        return $this->belongsTo(AgentAreaMapping::class,'agent_area_mapping_id','id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class,'agent_id','id');
    }
}

