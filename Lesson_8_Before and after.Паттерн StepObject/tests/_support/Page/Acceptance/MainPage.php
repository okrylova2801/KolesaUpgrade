<?php
namespace Page\Acceptance;

/**
 * Главная страница
 */
class MainPage
{
        /**
         * урл главной страницы товаров
         */
        public static $URL = 'index.php';

        /**
         * Селектор с блоком товаров
         */
        public static $firstProductCard = '#homefeatured > li:nth-child(%s) > div > div.left-block > div';

        /**
         * Селектор кнопки Quick-view
         */
        public static $quickViewButton = '#homefeatured > li:nth-child(%s) > div > div.left-block > div > a.quick-view > span';   

        /**
         * Селектор iframe
         */
        public static $fancyboxiframe = '.fancybox-iframe';

        /**
         * Селектор карточки товара в iframe
         */
        public static $productCard = '#product';

        /**
         * Селектор кнопки Add to wishlist
         */
        public static $addToWishListButton = '#wishlist_button';

        /**
         * Селектор сообщения об успешном добавлении
         */
        public static $successMessage = 'Added to your wishlist.';

        /**
         * Селектор кнопки закрытия плашки об успешном добавлени
         */
        public static $closeButtonSuccess = '.fancybox-item.fancybox-close';

        /**
         * Селектор кнопки закрытия окна просмотра карточки товара
         */
        public static $closeButtonProductCard = '.fancybox-close';
}