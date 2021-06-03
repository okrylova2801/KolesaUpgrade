<?php

use Page\Acceptance\MainPage;
use Page\Acceptance\SearchPage;

/**
 * Класс для проверки смены отображения карточек 
*/  
class ChangeViewCest
{
    /**
     * Проверяет смену отображения карточек товара
     */
    public function changeViewToList(AcceptanceTester $I)
    {
            $mainPage = new MainPage($I);
            $searchPage = new SearchPage($I);
            $I->amOnPage(MainPage::$URL);
            $mainPage->openSummerDresses()
                        ->onSearchPage();
            $I->seeElement(SearchPage::$Grid);
            $I->seeElement(SearchPage::$productGrid);
            $searchPage->changeView();
            $I->seeElement(SearchPage::$productList);
    }
} 