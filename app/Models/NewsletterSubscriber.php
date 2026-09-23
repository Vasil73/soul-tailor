<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class NewsletterSubscriber extends Model
{
    protected $fillable = ['email', 'name', 'source', 'unsubscribe_token', 'subscribed_at', 'unsubscribed_at'];

    protected function casts(): array
    {
        return ['subscribed_at' => 'datetime', 'unsubscribed_at' => 'datetime'];
    }
}
