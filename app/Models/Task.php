<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','status','due_date','user_id'];

    protected $casts = [
        'status' => 'boolean',
        'due_date'=>'date'
    ];

    // A Task belongs to a single User 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Method to get the status of the task as a string
    public function getStatus(){
        return  $this -> status  == 0 ?  'in-progress'  : 'completed' ;
    }
}
