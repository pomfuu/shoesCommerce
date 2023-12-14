<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSum extends Model
{
    use HasFactory;
    protected $table = 'ordersums';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];
}
