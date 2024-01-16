<?php

namespace App\Models;

use DateTimeInterface;
use App\Traits\ForUserId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CodeType extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name'
    ];

    public $timestamps = false;

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
