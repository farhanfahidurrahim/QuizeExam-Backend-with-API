<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_name',
        'subject_name',
        'chapter_name',
        'pdf_file_path',
    ];
}
