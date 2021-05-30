<?php

use Page\Acceptance\LoginPage;

/**
     *  Класс для проверки авторизации
     *
     */
    class LoginCest
    {
        /**
         * Проверяет ошибочную  авторизацию
         */
        public function checkUnsuccessLogin(AcceptanceTester $I)
        {
        $loginPage = new LoginPage($I);
        $I->amOnPage(LoginPage::$URL);
        $loginPage->fillUserNameField()
                        ->fillPassField()
                        ->clickButton();
        $I->waitForElementVisible(LoginPage::$errorBox);
        $loginPage->closeButton();
        $I->dontSeeElement(LoginPage::$errorBox);
        }
    }