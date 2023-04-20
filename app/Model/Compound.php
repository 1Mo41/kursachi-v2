<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Compound extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'НазваниеСостава',
    ];
    protected $table = 'Compound';

}