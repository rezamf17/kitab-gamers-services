<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FreeFireCharactersModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class FreeFireModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'free-fire';

    public function freeFire()
    {
        return $this->belongsTo(FreeFireCharactersModel::class, 'id_characters');
    }

}
