<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnBanglaGrammer extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        'topic_name',
        'title',
        'pdf_file_path',
    ];

    public function catbngram()
    {
        return $this->belongsTo(CategoryBanglaGrammer::class,'topic_name');
    }
}
