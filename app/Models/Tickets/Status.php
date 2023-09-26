<?php

namespace App\Models\Tickets;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public const OPEN = 'open';
    public const APPROVED = 'approved';
    public const CLOSED = 'closed';

    protected $table = 'ticket_statuses';

    protected $guarded = ['id'];

    public static function statusesList(): array
    {
        return [
            self::OPEN => 'Открыт',
            self::APPROVED => 'Подтверждён',
            self::CLOSED => 'Закрыт',
        ];
    }

    public function isOpen(): bool
    {
        return $this->status === self::OPEN;
    }

    public function isApproved(): bool
    {
        return $this->status === self::APPROVED;
    }

    public function isClosed(): bool
    {
        return $this->status === self::CLOSED;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
