<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rorecek\Ulid\HasUlid;

class Picture extends Model
{
    use HasFactory;
    use HasUlid;

    protected $fillable = ['extension'];
}
