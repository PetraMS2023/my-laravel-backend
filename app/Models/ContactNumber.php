<?php

// app/Models/ContactNumber.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'position',
    ];
}
