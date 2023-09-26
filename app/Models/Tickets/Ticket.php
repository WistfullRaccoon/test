<?php

namespace App\Models\Tickets;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
    protected $table = 'tickets';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'ticket_id', 'id');
    }

    public function statuses()
    {
        return $this->hasMany(Status::class, 'ticket_id', 'id');
    }

    public static function add(int $userId, string $subject, string $content)
    {
        $ticket = self::create([
            'user_id' => $userId,
            'subject' => $subject,
            'content' => $content,
            'status' => Status::OPEN,
            'user_new_messages' => 1
        ]);
        $ticket->setStatus(Status::OPEN, $userId);
        return $ticket;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function addMessage(int $userId, $message): void
    {
        if (!$this->allowsMessages()) {
            throw new \DomainException('Запрос закрыт');
        }
        $this->messages()->create([
            'user_id' => $userId,
            'message' => $message,
        ]);
        $this->update();
    }

    public function allowsMessages(): bool
    {
        return !$this->isClosed();
    }

    public function approve(int $userId): void
    {
        if ($this->isApproved()) {
            throw new \DomainException('Ticket is already approved.');
        }
        $this->setStatus(Status::APPROVED, $userId);
    }

    public function close(int $userId): void
    {
        if ($this->isClosed()) {
            throw new \DomainException('Ticket is already closed.');
        }
        $this->setStatus(Status::CLOSED, $userId);
    }

    public function reopen(int $userId): void
    {
        if (!$this->isClosed()) {
            throw new \DomainException('Ticket is not closed.');
        }
        $this->setStatus(Status::APPROVED, $userId);
    }

    public function isOpen(): bool
    {
        return $this->status === Status::OPEN;
    }

    public function isApproved(): bool
    {
        return $this->status === Status::APPROVED;
    }

    public function isClosed(): bool
    {
        return $this->status === Status::CLOSED;
    }

    public function canBeRemoved(): bool
    {
        return $this->isOpen();
    }

    private function setStatus($status, ?int $userId): void
    {
        $this->statuses()->create(['status' => $status, 'user_id' => $userId]);
        $this->update(['status' => $status]);
    }


    public function incrementUserMessages()
    {
        $this->increment('user_new_messages');
        $this->save();
    }

    public function incrementAdminMessages()
    {
        $this->increment('admin_new_messages');
        $this->save();
    }

    public function resetUserMessagesCount()
    {
        $this->user_new_messages = 0;
        $this->save();
    }

    public function resetAdminMessagesCount()
    {
        $this->admin_new_messages = 0;
        $this->save();
    }

    public function scopeForUser(Builder $query, User $user)
    {
        return $query->where('user_id', $user->id);
    }
}
