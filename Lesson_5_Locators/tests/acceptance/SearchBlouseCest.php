<?php

class SearchBlouseCest
{
    /*
     Проверить поиск товара "Blouse" на странице
     */
    public function checkSearchBlouse(AcceptanceTester $I)
    {
        //'#homefeatured > li:nth-child(2) > div > div.left-block > div'
        $leftBlockDivCSS = '#homefeatured > li:nth-child(2) > div > div.left-block > div';
        $leftBlockDivXPath = '//*[@id="homefeatured"]/li[2]/div/div[1]/div';
        //'#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view > span'
        $quickViewCSS = '#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view';
        $quickViewXPath = '//*[@id="homefeatured"]/li[2]/div/div[1]/div/a[2]';
        //'.fancybox-iframe'
        $fancyboxIframeCSS = '.fancybox-iframe';
        $fancyboxIframeXPath = '//*[@class="fancybox-iframe"]';
        //'#product'
        $productCSS = '#product';
        $productXPath = '//*[@id="product"]';
        //'Blouse'
        $textBlouseCSS = '#product > div > div > div.pb-center-column.col-xs-12.col-sm-4 > h1';
        $textBlouseXpath = '//*[@id="product"]/div/div/div[2]/h1';


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
