<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EbookNineten extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_name',
        'topic_name',
        'title',
        'pdf_file_path',
    ];

    public function nineten()
    {
        return $this->belongsTo(CategoryEbookNineten::class,'topic_name');
    }
}
