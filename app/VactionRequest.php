<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class VactionRequest extends Model
{
    public function employee(){
        return $this->belongsTo(User::class,'employee_id');
    }
}
