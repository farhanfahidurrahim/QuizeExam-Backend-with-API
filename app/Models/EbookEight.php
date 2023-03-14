<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EbookEight extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_name',
        'topic_name',
        'title',
        'pdf_file_path',
    ];

    public function eight()
    {
        return $this->belongsTo(CategoryEbookEight::class,'topic_name');
    }
}
