<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense_Type extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'code'
    ];
}
