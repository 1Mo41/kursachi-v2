<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employees extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'ФИО',
        'polID',
        'birthday',
        'ДолжностьID',
        'ПодразделениеID',
        'Адрес',
        'age'
    ];


}