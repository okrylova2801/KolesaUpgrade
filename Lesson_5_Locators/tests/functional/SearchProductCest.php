<?php

class SearcheProductCest
{
    
    /*
    Проверка количества найденных товаров 
    */
    public function CheckArticlePageThroughList(FunctionalTester $I)
    {   

        //'#search_query_top'
        $searchQueryTopCSS = '#search_query_top';
        $searchQueryTopXPath = '//*[@id="search_query_top"]';
        //'#searchbox > button'
        $searchboxButtonCSS = '.button-search';
        $searchboxButtonXPath = '//*[@id="searchbox"]/button';
        //'.product_list'
        $productListCSS = '.product_list';
        $productListXPath = '//*[@id="center_column"]';
        //'.product-container'
        $productContainerCSS = '.product-container';
        $productContainerXPath = '//*[@class="product-container"]';


        $I->amOnPage('index.php');
        $I->seeElement('#search_query_top');
        $I->fillField('#search_query_top', 'Printed dress');
        $I->click('#searchbox > button');
        $I->seeElement('.product_list');
        $I->seeNumberOfElements('.product-container', 5);
       
        
    }
}
