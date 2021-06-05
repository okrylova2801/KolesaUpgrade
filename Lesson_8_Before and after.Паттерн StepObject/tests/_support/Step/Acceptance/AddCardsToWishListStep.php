<?php
namespace Step\Acceptance;

use Page\Acceptance\MainPage;
use WishListCest;

class WishListStep extends \AcceptanceTester
{
        /**
         * Цикл добавления карточек в My WishList
         */
        public function addProductsToWishList() {
                $I = $this;
        
                for ($i = 1; $i<= WishListCest::PRODUCTS_NMB; $i++) {
                        $I->waitForElement(sprintf(MainPage::$firstProductCard,$i),5);
                        $I->moveMouseOver(sprintf(MainPage::$firstProductCard,$i));
                        $I->waitForElementVisible(sprintf(MainPage::$quickViewButton,$i));
                        $I->click(sprintf(MainPage::$quickViewButton,$i));
                        // ожидание iframe с классом .fancybox-iframe в момент иниициализации модального окна (содеражимое iframe отсутствует)
                        $I->waitForElementVisible(MainPage::$fancyboxiframe);
                        $I->switchToIFrame(MainPage::$fancyboxiframe);
                        //ожидание содержимого iframe
                        $I->waitForElementVisible(MainPage::$productCard,30); 
                        $I->moveMouseOver(MainPage::$addToWishListButton);
                        $I->click(MainPage::$addToWishListButton);
                        $I->waitForText(MainPage::$successMessage); //сообщение
                        $I->waitForElementVisible(MainPage::$closeButtonSuccess);
                        $I->click(MainPage::$closeButtonSuccess);
                        $I->switchToIFrame();
                        $I->waitForElementVisible(MainPage::$closeButtonProductCard);
                        $I->click(MainPage::$closeButtonProductCard); 
                }
        }
}