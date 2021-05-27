<?php

class SearchBlouseCest
{
    /*
     Проверить поиск товара "Blouse" на странице
     */
    public function checkSearchBlouse(AcceptanceTester $I)
    {
        $I->amOnPage('index.php');
        $I->waitForElement('#homefeatured > li:nth-child(2) > div > div.left-block > div', 30);
        $I->moveMouseOver('#homefeatured > li:nth-child(2) > div > div.left-block > div');
        $I->click('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view > span');
        // ожидание iframe с классом .fancybox-iframe в момент иниициализации модального окна (содеражимое iframe отсутствует)
        $I->waitForElement('.fancybox-iframe', 30);
        $I->switchToIFrame('.fancybox-iframe');
        //ожидание содержимого iframe
        $I->waitForElement('#product', 30); 
        $I->waitForText('Blouse', 10, '#product > div > div > div.pb-center-column.col-xs-12.col-sm-4 > h1');

    }
}


        
