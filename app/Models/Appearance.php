<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appearance extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_color',
        'background_color',
        'button_color',
        'button_text_color'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
