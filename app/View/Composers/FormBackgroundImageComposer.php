<?php

namespace App\View\Composers;

use Illuminate\View\View;

class FormBackgroundImageComposer {
    public function compose(View $view) {
        $formBgImage = null;
        $routeName = request()->route()->getName();

        switch ($routeName) {
            case 'custom.login':
                $formBgImage = asset('images/login.jpg');
                break;
            case 'custom.password.reset.link.form':
                $formBgImage = asset('images/password-reset.jpg');
                break;
            case 'custom.password.reset.form':
                $formBgImage = asset('images/password-reset-2.jpg');
                break;
                // case 'home.contact':
                //     $mastHeadPhoto = asset('images/contact.jpg');
                //     break;
        }

        $view->with('formBgImage', $formBgImage);
    }
}
