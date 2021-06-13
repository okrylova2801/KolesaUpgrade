<?php
namespace Page\Acceptance;

/**
 * Страница личного кабинета
 */
class CustomerAccount
{
	/**
	 * урл  страницы My account
         */
        public static $accountUrl = 'index.php?controller=my-account';

        /**
         * Селектор View my customer account
         */
        public static $viewAccount = '#header > div.nav > div > div > nav > div:nth-child(1)';

        /**
         * Селектор кнопки My Wishlist
         */
        public static $myWishlistButton = '#center_column > div > div:nth-child(2) > ul > li > a > span';	
}