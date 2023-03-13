<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnMath extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        'topic_name',
        'title',
        'pdf_file_path',
    ];

    public function math()
    {
        return $this->belongsTo(CategoryMath::class,'topic_name');
    }
}
