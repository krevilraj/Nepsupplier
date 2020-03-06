<?php
/**
 * Created by PhpStorm.
 * User: Mahesh Bohara <maheshbohara0101@gmail.com>
 * Date: 10/3/2017
 * Time: 1:19 PM
 */

namespace App\Http\ViewComposers;

use Harimayco\Menu\Facades\Menu;
use Illuminate\View\View;

class MenuListComposer {
	/**
	 * Bind data to the view.
	 *
	 * @param View $view
	 */
	public function compose( View $view ) {
		$menuList = Menu::list(2);
		$categoryMenuList = Menu::list(1);

		$view->with( [
			'menuList' => $menuList,
			'categoryMenuList' => $categoryMenuList
		] );
	}
}