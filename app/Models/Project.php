<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'laptop_brand',
        'issue_description',
        'total_price',
        'status',
        'created_at',
    ];
}

