<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $primaryKey  = 'author_id';

    protected $fillable = [
        'author_id',
        'author_name',
        'author_email',
        'author_phone_no',
        'author_status'
    ];

    public function postNews()
    {
        return $this->hasMany(PostNews::class);
    }
}
