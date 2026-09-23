<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Models\BeddingOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

final class BeddingOrderReceivedNotification extends Notification
{
    use Queueable;

    public function __construct(private readonly BeddingOrder $order) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)->subject("Ваша заявка №{$this->order->id} получена")->greeting("Здравствуйте, {$this->order->name}!")->line('Спасибо за заявку на индивидуальный расчёт комплекта.')->line('Мы свяжемся с вами в течение рабочего дня.')->line("Телефон в заявке: {$this->order->phone}");
    }
}
