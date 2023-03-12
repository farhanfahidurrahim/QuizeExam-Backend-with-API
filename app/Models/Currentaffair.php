<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currentaffair extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        'title',
        'month_year',
        'pdf_file_path',
    ];
}
