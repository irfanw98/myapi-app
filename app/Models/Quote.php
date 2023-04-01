<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    User,
    Tag
};

class Quote extends Model
{
    use HasFactory;

    protected $table = 'quotes';
    protected $fillable = ['user_id','author', 'text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'quote_tag', 'quote_id', 'tag_id')->withTimestamps();
    }
}