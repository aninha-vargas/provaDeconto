<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folha extends Model
{
    protected $table = 'folhas';

    protected $guarded = ["id"];

    protected $hidden = ['created_at', 'updated_at'];

}
