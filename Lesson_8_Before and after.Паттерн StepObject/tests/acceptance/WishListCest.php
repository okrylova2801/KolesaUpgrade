<?php

use Page\Acceptance\CustomerAccount;
use Page\Acceptance\LoginPage;
use Page\Acceptance\MainPage;
use Page\Acceptance\MyWishList;

/**
 * Класс для  добавления карточек в WishList
 */

class WishListCest
{       
        public const PRODUCTS_NMB = 2;

        /**
         * Метод, который выполняется перед тестом
        */
        protected function login(AcceptanceTester $I)
        {
                $I->amOnPage(LoginPage::$URL);
                $I->fillField(LoginPage::$emailField, LoginPage::EMAILADDRESS);
                $I->fillField(LoginPage::$passwordField, LoginPage::PASSWORD);
                $I->click(LoginPage::$submitLoginButton);
        }
        
        /**
         * Метод, который выполняется после теста
         */
        protected function logout(AcceptanceTester $I)
        {
                $I->seeInCurrentUrl(MyWishList::$wishListUrl);
                $I->click(MyWishList::$wishlistDelete);
                $I->acceptPopup();
                $I->waitForElementVisible(MyWishList::$logout);
                $I->click(MyWishList::$logout);
                $I->wait(3);
        }

        /**
         * Тест на проверку добавления карточек в WishList и проверка счетчика в таблице My Wishlist
         * @group test1
         * @before login
         * @after logout
         */
        public function checkValueInTableMyWishlist(\Step\Acceptance\AddCardsToWishListStep $I)
        {
                $I->amOnPage(MainPage::$URL);
                $I->comment('Добавляем товары в WishList');
                $I->addProductsToWishList();
                $I->comment('Проверяем счетчик в таблице My Wishlist');
                $I->click(CustomerAccount::$viewAccount);
                $I->seeInCurrentUrl(CustomerAccount::$accountUrl);
                $I->click(CustomerAccount::$myWishlistButton);
                $I->seeInCurrentUrl(MyWishList::$wishListUrl);
                $I->waitForElementVisible(MyWishList::$qtyValue);
                $qty = $I->grabTextFrom(MyWishList::$qtyValue);
                $I->assertEquals(self::PRODUCTS_NMB, $qty, 'checks qty is correct');
        }       
}