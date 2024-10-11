<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model {
    use HasFactory;

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function slug(): Attribute {
        return Attribute::make(
            get: fn(string $value) => $value,
            set: fn() => Str::slug($this->title)
        );
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
