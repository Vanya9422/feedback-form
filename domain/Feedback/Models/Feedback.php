<?php

namespace Domain\Feedback\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'name', 'phone', 'message', 'created_at'];
}
