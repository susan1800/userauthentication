<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table="subjects";
    protected $fillable =[
        'subject',
        'subject_code',
        'barrier_id',
        'concorrent_id',
        'credit_hours',
        'level_id',
        'program_id',
    ];


    public function level(){
    	return $this->belongsTo(Level::class , 'level_id');
    }
    public function program(){
    	return $this->belongsTo(Program::class , 'program_id');
    }
    public function backSubject(){
    	return $this->hasMany(FormDataBackSubject::class);
    }
    public function regularSubject(){
    	return $this->hasMany(FormDataSubject::class);
    }
}
