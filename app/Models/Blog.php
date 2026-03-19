<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'image',
        'article',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
