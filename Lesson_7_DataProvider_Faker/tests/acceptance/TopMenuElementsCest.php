<?php

namespace Tests\Acceptance;

use Codeception\Example;
use Page\MainPage;

/**
 * Класс для тестирования
 * @group test
 */
class TopMenuElementsCest
{
        /**
         * Тест на проверку нажатия на ссылку в меню
         * @group test
         * @param Example $data
         * @dataProvider getDataForClickMenu
         */
        
        public function MenuElements  (\AcceptanceTester $I, Example $data)
        {
                $I->amOnPage('');
                $I->waitForElementClickable(sprintf(MainPage::$topMenu, $data['menuIndex']));
                $I->click(sprintf(MainPage::$topMenu, $data['menuIndex']));
                $I->seeInCurrentUrl($data['menuLink']);
                $I->waitForText($I->grabTextFrom(sprintf(MainPage::$topMenu, $data['menuIndex'])),3,MainPage::$pageHeader);
        }
        
                protected function getDataForClickMenu()
                {       
                        $array = array(
                                ['menuIndex' => 2, 'menuLink' => 'develop'],
                                ['menuIndex' => 3, 'menuLink' => 'admin'],
                                ['menuIndex' => 4, 'menuLink' => 'design'],
                                ['menuIndex' => 5, 'menuLink' => 'management'],
                                ['menuIndex' => 6, 'menuLink' => 'marketing'],
                                ['menuIndex' => 7, 'menuLink' => 'popsci'],
                        );

                shuffle($array);
                return(array_slice($array,0,2));
                }         
        }