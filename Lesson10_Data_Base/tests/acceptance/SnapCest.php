<?php

use Page\Acceptance\UserListPage;

/**
 * Класс на проверку работы с данными пользователя
 */
class SnapCest
{  
        public $numberUsers = 10;
        public static $userData = [
                'owner'  => 'Olga_Krylova_A',
        ];
       
        /**
        * Подготовка данных
        */
        public function randomUserData(AcceptanceTester $I)
        {
                $faker = $I->getFaker();

                $this->data = [
                        "job" => $faker->jobTitle,
                        "superhero" =>$faker->boolean(),
                        "skill" =>$faker->word,
                        "email"  => $faker->email,
                        "name"  => $faker->name,
                        "DOB" =>$faker->date("Y-m-d"),
                        "avatar" =>$faker->imageUrl(),
                        "canBeKilledBySnap" =>$faker->boolean(),
                        "created_at" =>$faker->date("Y-m-d"),
                        "owner" => "Olga_Krylova_A",
                ];
        }        

        /**
         * Цикл на создание записей с рандомными данными
         */
        public function randomUserCreate(AcceptanceTester $I)
        {
                for ($i=1; $i<=$this->numberUsers; $i=$i+1)
                {
                        $this->randomUserData($I);
                        $I->haveInCollection('people', $this->data);
                }
        }

        /**
        * Метод, который выполняется после теста
        */
       protected function cleanBase(AcceptanceTester $I)
       {
               $I->sendGet('people', self::$userData); 

                foreach(json_decode($I->grabResponse()) as $v)
                {
                        $I->sendDelete('human?_id='.$v->_id);
                }
       }

        /**
         * Тест на проверку корректного отображения данных
         * @group test8
         * @before randomUserCreate
         * @after cleanBase
         */
        public function checkUserData(AcceptanceTester $I)
        {
               $I->amOnPage(UserListPage::$Url);
               $I->waitForElement(UserListPage::$listUsers);
               $I->seeNumberOfElements(UserListPage::$listUsers,$this->numberUsers);
               $I->click(UserListPage::$snapButton);

               /**
                * При прогоне теста  несколько раз подряд тест валится,  по причине того, что кнопка Snap не успевает отработать, 
                * Поэтому используем wait
                */
               $I->wait(3);

                /** 
                 * Проверка, что количество записей с   "canBeKilledBySnap=true" на странице =0 и в БД=0
                */
                        $this->data = [
                                "canBeKilledBySnap" =>true,
                                "owner" => "Olga_Krylova_A",
                        ];

                $count = $I->grabCollectionCount('people', $this->data);
                $I->assertEquals(0, $count, 'comment true');

                /** 
                 * Проверка, что количество записей с   "canBeKilledBySnap=false" на странице столько же сколько и в БД
                 */
                        $this->data = [
                                "canBeKilledBySnap" =>false,
                                "owner" => "Olga_Krylova_A",
                        ];

                $count = $I->grabCollectionCount('people', $this->data);
                $I->assertEquals(count($I->grabMultiple(UserListPage::$listUsers)), $count, 'comment false');
                
                /**
                 * Проверка, что записи со значением  "canBeKilledBySnap=false" есть в БД
                */
                        $this->data = [
                                "canBeKilledBySnap" =>false,
                                "owner" => "Olga_Krylova_A",
                        ];

                $I->seeInCollection('people',$this->data);

                /**
                 * Проверка, что записей со значением  "canBeKilledBySnap=true" нет в БД
                 */
                        $this->data = [
                                "canBeKilledBySnap" =>true,
                                "owner" => "Olga_Krylova_A",
                        ];

                $I->dontSeeInCollection('people',$this->data);
        }
}