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
                // case 'home.post':
                //     $mastHeadPhoto = asset('images/blog-post.jpg');
                //     break;
                // case 'home.about':
                //     $mastHeadPhoto = asset('images/about.jpg');
                //     break;
                // case 'home.contact':
                //     $mastHeadPhoto = asset('images/contact.jpg');
                //     break;
        }

        $view->with('formBgImage', $formBgImage);
    }
}
