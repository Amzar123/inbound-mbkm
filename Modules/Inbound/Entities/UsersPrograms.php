<?php

namespace Modules\Inbound\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsersPrograms extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "program_id",
        "created_at",
        "updated_at"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Inbound\Database\factories\UsersProgramsFactory::new();
    }
}
