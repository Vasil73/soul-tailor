<?php

namespace App\Console\Commands;

use App\Models\NewsletterSubscriber;
use App\Notifications\NewsletterNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class SendNewsletter extends Command
{
    protected $signature = 'newsletter:send
        {subject : Тема письма}
        {message : Текст письма}
        {--yes : Отправить без дополнительного подтверждения}';

    protected $description = 'Поставить email-рассылку в очередь';

    public function handle(): int
    {
        $subject = trim((string) $this->argument('subject'));
        $message = trim((string) $this->argument('message'));

        if ($subject === '' || $message === '') {
            $this->error('Тема и текст письма не должны быть пустыми.');

            return self::FAILURE;
        }

        $subscribersCount = NewsletterSubscriber::query()
            ->active()
            ->count();

        if ($subscribersCount === 0) {
            $this->warn('Нет активных подписчиков.');

            return self::SUCCESS;
        }

        $this->info("Активных подписчиков: {$subscribersCount}");

        if (
            !$this->option('yes')
            && !$this->confirm('Поставить рассылку в очередь?')
        ) {
            $this->warn('Отправка отменена.');

            return self::SUCCESS;
        }

        $queued = 0;

        NewsletterSubscriber::query()
            ->active()
            ->orderBy('id')
            ->chunkById(
                200,
                function ($subscribers) use (
                    $subject,
                    $message,
                    &$queued,
                ): void {
                    foreach ($subscribers as $subscriber) {
                        $unsubscribeUrl = route(
                            'newsletter.unsubscribe',
                            ['token' => $subscriber->unsubscribe_token],
                        );

                        Notification::route('mail', $subscriber->email)
                            ->notify(
                                new NewsletterNotification(
                                    subject: $subject,
                                    content: $message,
                                    unsubscribeUrl: $unsubscribeUrl,
                                ),
                            );

                        $queued++;
                    }
                },
            );

        $this->info("Поставлено в очередь: {$queued}");

        return self::SUCCESS;
    }
}
