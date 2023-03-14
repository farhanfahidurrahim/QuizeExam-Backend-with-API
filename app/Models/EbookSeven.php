<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EbookSeven extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_name',
        'topic_name',
        'title',
        'pdf_file_path',
    ];

    public function seven()
    {
        return $this->belongsTo(CategoryEbookSeven::class,'topic_name');
    }
}
