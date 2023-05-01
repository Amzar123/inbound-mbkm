<?php

namespace Modules\Inbound\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "name",
        "institution",
        "kode",
        "created_at",
        "updated_at"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Inbound\Database\factories\ProgramFactory::new();
    }
}
