<?php


namespace App\Assistants\Users;
use App\Models\Subscriber;
use App\Models\User;

class SubscribeService
{
    public function subscribe($subscriberId, $authorId): void
    {
        $subscriber = User::findOrFail($subscriberId);
        $author = User::findOrFail($authorId);

        $subscriber->subscribe($author->id);
    }

    public function countSubscribers($userId): int
    {
        return Subscriber::where('author_id', $userId)->count();
    }
}
