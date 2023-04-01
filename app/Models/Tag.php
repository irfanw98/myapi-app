<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quote;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $fillable = ['name'];

    public function quotes()
    {
        return $this->belongsToMany(Quote::class, 'quote_tag', 'tag_id', 'quote_id')->withTimestamps();
    }
}