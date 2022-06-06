<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table="permissions";
    protected $fillable =[
        'title',
        'subtitle',
        'role_id',
    ];

    public function role(){
    	return $this->belongsTo(Auth::class , 'role_id');
    }
}
