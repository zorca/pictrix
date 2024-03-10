<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rorecek\Ulid\HasUlid;

class Picture extends Model
{
    use HasFactory;
    use HasUlid;
    use HasSlug;

    protected $fillable = ['name', 'extension'];
}
