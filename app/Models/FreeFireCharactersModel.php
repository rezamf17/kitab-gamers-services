<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FreeFireCharactersLevelUpModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class FreeFireCharactersModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'free-fire-characters';

    public function freeFireLevel()
    {
        return $this->hasMany(FreeFireCharactersLevelUpModel::class, 'id_character');
    }

}
