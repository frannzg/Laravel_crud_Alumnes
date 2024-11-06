<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Centre;
use App\Models\Ensenyament;

class Alumne extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'cognoms', 'data_naixement', 'centre_id','ensenyament_id'];

    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }

    public function ensenyament(): BelongsTo
    {
        return $this->belongsTo(Ensenyament::class);
    }
}