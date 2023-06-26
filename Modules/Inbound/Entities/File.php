<?php

namespace Modules\Inbound\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_id',
        'file_name',
        'user_id',
        'type',
        'updated_at',
        'created_at' 	
    ];
    
    protected static function newFactory()
    {
        return \Modules\Inbound\Database\factories\FileFactory::new();
    }
}
