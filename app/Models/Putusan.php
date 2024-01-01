<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Putusan extends Model
{
    use HasFactory;
    protected $table = 'putusans';

    protected $guard = ["id"];
    protected $fillable = ["putusan_id", "data_putusan", "kondisi"];
}
