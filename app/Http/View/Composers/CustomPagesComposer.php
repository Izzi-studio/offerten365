<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\CustomPage;

class CustomPagesComposer
{


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('customPagesFront', CustomPage::whereShowFront(1)->get());
    }
}
