<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Подтверждение почты')
                ->line('Пожалуйста, нажмите кнопку ниже, чтобы подтвердить свой адрес электронной почты.')
                ->action('Подтвердить почту', $url)
                ->line('Если вы не создавали учетную запись, никаких дальнейших действий не требуется.');
        });

        ResetPassword::toMailUsing(function ($notifiable, $token) {
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            return (new MailMessage)
                ->subject('Уведомление о сбросе пароля')
                ->line('Вы получили это письмо, поскольку мы получили запрос на сброс пароля для вашей учетной записи.')
                ->action('Сброс пароля', $url)
                ->line(__('Срок действия этой ссылки для сброса пароля истекает через :count минут.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
                ->line('Если вы не запрашивали сброс пароля, никаких дальнейших действий не требуется.');
        });



    }
}
