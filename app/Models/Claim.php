<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function claimable()
    {
        return $this->morphTo();
    }

    public static function add( string $reason, int $userId, int $elementId, string $elementType)
    {
        $claim = self::create([
            'user_id' => $userId,
            'element_id' => $elementId,
            'reason' => $reason,
            'element_type' => $elementType,
        ]);

        return $claim;
    }
}
