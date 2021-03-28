<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillables = ["first_name", 'last_name', 'fb_first_name', 'fb_last_name', 'mail_first_name', 'mail_last_name', 'email', 'fb_completed'];
}
