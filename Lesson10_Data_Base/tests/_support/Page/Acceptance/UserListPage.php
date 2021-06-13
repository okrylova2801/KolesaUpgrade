<?php
namespace Page\Acceptance;

/**
 * Страница со списком пользователей по owner
 */
class UserListPage
{
	/**
	 * урл  страницы
         */
        public static $Url = '?owner=Olga_Krylova_A';

        /**
         * Селектор списка пользователей
         */
        public static $listUsers = 'li.user-card';

        /**
         * Селектор кнопки Snap
         */
        public static $snapButton = '#snap';
}