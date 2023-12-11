<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'isbn', 'book_category_id', 'publisher', 'author', 'stock_count'];
    protected $dates = ['deleted_at'];
    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }
}
?>