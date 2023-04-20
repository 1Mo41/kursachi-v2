<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class pol extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'НазваниеПола'
    ];

    protected $table = 'pol';
}