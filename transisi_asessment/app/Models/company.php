<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name','email','logo','website'
    ]; 

    public function employee(){
        return $this->hasMany('App\Models\employee');
    }
}
