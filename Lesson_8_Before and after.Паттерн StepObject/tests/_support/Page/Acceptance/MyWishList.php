<?php
namespace Page\Acceptance;

/**
 * Страница MyWishList
 */
class MyWishList
{
	/**
	 * урл  страницы My WishList
	 */
	public static $wishListUrl = 'index.php?fc=module&module=blockwishlist&controller=mywishlist';

	/**
	 * Селектор значения столбца Qty
	 */
	public static $qtyValue = '#block-history td.bold.align_center';

	/**
	 * Селектор кнопки очистки списка wishlist
	 */
	public static $wishlistDelete = '#block-history td.wishlist_delete > a';

	/**
	 * Селектор кнопки logout
	 */
	public static $logout = '.logout';
}