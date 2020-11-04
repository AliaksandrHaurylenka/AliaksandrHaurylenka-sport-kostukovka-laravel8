<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

/**
 * @property  post
 */
class NewEvent extends Notification implements ShouldQueue
{
    use Queueable;

    private $event;

    /**
     * Create a new notification instance.
     *
     * @param $pst
     */
    public function __construct($pst)
    {
        $this->event = $pst;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
//        dd($notifiable);
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     *
     * Условие принимает колонку folder
     * и проверяет наличие определенного названия папки.
     * Если совпадает условие, то приходит сообщение о добавлении
     * нового объявления, если нет то сообщение о новом спортивном событии.
     */
    public function toMail($notifiable)
    {

        if(DB::table('ads')->where('folder', $this->event->folder)->first()){
            $url = env('APP_URL_SITE');
            return (new MailMessage)
                ->subject('Объявление')
                ->greeting('Привет!')
                ->line('Добавлено объявление на сайте Спорт-Костюковка.')
                ->action('Читать', $url)
                ->line('Спасибо, что Вы с нами!');
        }


        $url = env('APP_URL_SITE').'/post/'. $this->event->slug;
        return (new MailMessage)
            ->subject('Событие')
            ->greeting('Привет!')
            ->line('Добавлено спортивное событие на сайте Спорт-Костюковка.')
            ->action('Читать', $url)
            ->line('Спасибо, что Вы с нами!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
