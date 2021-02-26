<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mandatoryfields extends Model
{
    //
    public static function validation($name)
    {
        $where_check = Mandatoryfields::where('check',$name)->first();
        if($where_check!="")

        if($where_check->defaultfields == 1)
        {
            return 'required disabled';
        }
        else if($where_check->mandatory == 1)
        {
            return 'required';
        }
        else
        {
            return '';
        }
        
    }
    public static function mandatory($name)
    {
        $where_check = Mandatoryfields::where('check',$name)->first();
        if($where_check!="")
        if($where_check->mandatory == 1)
        {
            return '<span class="mandatory">*</span>';
        }
        else
        {
            return '';
        }

    }
    public static function checkbox($name)
    {
        $where_check = Mandatoryfields::where('check',$name)->first();
        if($where_check!="")

        if($where_check->defaultfields == 1)
        {
            return 'checked disabled';
        }
        else if($where_check->mandatory == 1)
        {
            return 'checked';
        }
        else
        {
            return '';
        }
        
    }
}
