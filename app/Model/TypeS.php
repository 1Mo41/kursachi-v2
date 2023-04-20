<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TypeS extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
    protected $table = 'TypeS';

}