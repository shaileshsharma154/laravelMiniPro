<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    protected $primarykey="member_id";

    public function getMemberData(){
        return $this->hasone('App\Models\group','group_id');
    }
}
