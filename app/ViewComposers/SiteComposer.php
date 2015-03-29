<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class SiteComposer
{

  /**
   * Compose the view with the following variables bound to it
   * @param  View $view The View
   * @return null
   */
  public function compose(View $view)
  {
    $_metas = \Config::get('site._metas');
    $_common = \Config::get('site._site');
    view()->share('_metas', $_metas);
    view()->share('_site', $_common);
    
    $all_items = \Config::get('site.menu_items');
    $menu_items = array();
    foreach ($all_items as $key => $item) {
      if (\Auth::user() && \Auth::user()->canPerformAction($item)) {
        $menu_items[$key] = $item;
      }
    }

    $view->with('menu_items', $menu_items);
  }

}
