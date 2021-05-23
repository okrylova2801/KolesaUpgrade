<?php

class SearcheProductCest
{
    
    /*
    Проверка количества найденных товаров 
    */
    public function CheckArticlePageThroughList(FunctionalTester $I)
    {
        $I->amOnPage('index.php');
        $I->seeElement('#search_query_top');
        $I->fillField('#search_query_top', 'Printed dress');
        $I->click('#searchbox > button');
        $I->seeElement('.product_list');
        $I->seeNumberOfElements('.product-container', 5);
       
        
    }
}