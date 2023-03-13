<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnBanglaLiterature extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        'topic_name',
        'title',
        'pdf_file_path',
    ];

    public function catbnlit()
    {
        return $this->belongsTo(CategoryBanglaLiterature::class,'topic_name');
    }
}
