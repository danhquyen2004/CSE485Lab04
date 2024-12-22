<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    //
    protected $fillable = [
        'id',
        'reader_id',
        'book_id',
        'borrow_date',
        'return_date',
        'status'
    ];
    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
