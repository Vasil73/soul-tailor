<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Contracts\View\View;

class NewsletterUnsubscribeController extends Controller
{
    public function __invoke(string $token): View
    {
        $subscriber = NewsletterSubscriber::query()
            ->where('unsubscribe_token', $token)
            ->firstOrFail();

        if ($subscriber->unsubscribed_at === null) {
            $subscriber->update([
                'unsubscribed_at' => now(),
            ]);
        }

        return view('newsletter-unsubscribed');
    }
}
