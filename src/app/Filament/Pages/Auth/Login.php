<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BasePage;
use MarcoGermani87\FilamentCaptcha\Forms\Components\CaptchaField;
//use MarcoGermani87\FilamentHcaptcha\Forms\Components\Captcha;

class Login extends BasePage
{
    public function mount(): void
    {
        parent::mount();

        $this->form->fill([
            'email' => 'user@example.com',
            'password' => '123Stella@',
            'remember' => true,
        ]);
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),
//                        Captcha::make('h-captcha-response'),
                        CaptchaField::make('captcha'),
                    ])
                    ->statePath('data')
                ,
            ),
        ];
    }
}
