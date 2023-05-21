<?php

namespace Modules\Inbound\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'user_id',
        'updated_at',
        'created_at' 	
    ];
    
    protected static function newFactory()
    {
        return \Modules\Inbound\Database\factories\FileFactory::new();
    }
}
