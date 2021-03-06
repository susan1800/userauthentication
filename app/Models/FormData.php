<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;
    protected $table = "form_data";
    protected $fillable = [
        'registration_no',
        'exam_roll_no',
        'college_roll_no',
        'user_id',
        'program_id',
        'level_id',
        'payment',
        'payment_image',
        'image',
        'year',
        'signature',
        'date',
        'credit_hours',
        'status',
        'approve',
        'payment_remarks',

    ];


    public function subject(){
    	return $this->hasOne(FormDataSubject::class);
    }
    public function backSubject(){
    	return $this->hasOne(FormDataBackSubject::class);
    }
    public function level(){
    	return $this->belongsTo(Level::class , 'level_id');
    }
    public function user(){
    	return $this->belongsTo(User::class , 'user_id');
    }
    public function program(){
    	return $this->belongsTo(Program::class , 'program_id');
    }
    public function marks(){
    	return $this->hasOne(FormDataMarks::class);
    }
}
