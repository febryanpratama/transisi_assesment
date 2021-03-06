<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'company_id'
    ];

    public function company(){
        return $this->belongsTo('App\Models\company','company_id', 'id');
    }
}
