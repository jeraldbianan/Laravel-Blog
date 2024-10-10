<?php

namespace App\View\Composers;

use Illuminate\View\View;

class MastHeadComposer {

    public function compose(View $view) {
        $mastHeadPhoto = null;
        $routeName = request()->route()->getName();

        switch ($routeName) {
            case 'home':
                $mastHeadPhoto = asset('images/blog.jpg');
                break;
            case 'home.post':
                $mastHeadPhoto = asset('images/blog-post.jpg');
                break;
            case 'home.about':
                $mastHeadPhoto = asset('images/about.jpg');
                break;
            case 'home.contact':
                $mastHeadPhoto = asset('images/contact.jpg');
                break;
        }

        $view->with('mastHeadPhoto', $mastHeadPhoto);
    }
}
