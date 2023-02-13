<?php

namespace Modules\Inbound\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubjectsTakenStudents extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'subjects_taken_students';
    
    protected static function newFactory()
    {
        return \Modules\Inbound\Database\factories\SubjectsTakenStudentsFactory::new();
    }
}
