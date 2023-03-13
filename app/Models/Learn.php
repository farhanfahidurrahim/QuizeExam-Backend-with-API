<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryEnglish;

class Learn extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_name',
        'topic_name',
        'title',
        'pdf_file_path',
    ];

    public function categoryenglish()
    {
        return $this->belongsTo(CategoryEnglish::class,'topic_name');
    }
}
