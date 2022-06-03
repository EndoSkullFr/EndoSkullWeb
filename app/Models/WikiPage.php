<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WikiPage extends Model
{
    use HasFactory;

    protected $fillable = ["name", "slug", "category", "content"];
}
