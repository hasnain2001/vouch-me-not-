<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'store_category';
    protected $primaryKey = 'id';
    protected $fillable = ['category_name', 'top_category', 'status'];
    use HasFactory;
}