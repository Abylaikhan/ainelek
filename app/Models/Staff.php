<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getImagePathAttribute(): string
    {
        return FileHelper::getFile($this->image) ?: asset('assets/img/not-found.png');
    }
}
