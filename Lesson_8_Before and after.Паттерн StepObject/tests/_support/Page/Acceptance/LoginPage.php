<?php
namespace Page\Acceptance;
 
/**
 * страница для авторизации
 */
class LoginPage
{
	/**
         * константа email для авторизации
	 */
	public const EMAILADDRESS = 'test_test_777@inbox.ru';

	/**
	 * константа пароль для авторизации
	 */
	public const PASSWORD = 'uiTAM-nmcI71';

	/**
	 * УРЛ страницы авторизации
	 */
	public static $URL = 'index.php?controller=authentication&back=my-account';

	/**
	 * селектор для поля ввода логина
	 */
	public static $emailField = '#email';

	/**
	 * селектор для поля ввода пароля
	 */
	public static $passwordField = '#passwd';

	/**
	 * селектор для кнопки Sign In
	 */
	public static $submitLoginButton =  '#SubmitLogin';
}