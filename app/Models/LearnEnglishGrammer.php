<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnEnglishGrammer extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        'topic_name',
        'title',
        'pdf_file_path',
    ];

    public function catengram()
    {
        return $this->belongsTo(CategoryEnglishGrammer::class,'topic_name');
    }
}
