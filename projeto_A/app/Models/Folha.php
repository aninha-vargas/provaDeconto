<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Funcionario;

class Folha extends Model
{
    protected $table = 'folhas';

    protected $guarded = ["id"];

    protected $hidden = ['created_at', 'updated_at'];

    public function funcionario()
    {
        return $this->hasOne(Funcionario::class, "id", "id_funcionario");
    }
}
