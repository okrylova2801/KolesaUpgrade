<?php

/**
 * Класс для работы с юзером
 */
class UsersCest
{
        public $userId;

        public static $defaultSchema = [
                "job"       => 'string',
                "_id"       => 'string',
                "email"     => 'string',
                "superhero" => 'boolean',
                "name"      => 'string',
                "owner"     => 'string',
        ];

        public static $userData = [
                'email'  => 'test_test_777@inbox.ru',
                'name'   => 'Olga',
                'owner'  => 'Olga_Krylova',
        ];

        /**
         * Тест на создание юзера
         * @group test1
         */
        public function checkUserCreate(\FunctionalTester $I)
        {
                $I->haveHttpHeader('Content-Type', 'application/json' );
                $I->sendPost('human', self::$userData);
                $I->seeResponseCodeIsSuccessful();
                $I->seeResponseContainsJson(['status' => 'ok']); 
                $this->userId = json_decode($I->grabResponse())->_id;
                $I->sendGet('people', self::$userData); 
                $I->seeResponseMatchesJsonType(self::$defaultSchema);
        }

        /**
         * Тест на обновление юзера
         * @group test1
         */
        public function checkUserUpdate(\FunctionalTester $I)
        {
                $userData = [
                        'name'  => 'Olga_New_Name',
                ];
                
                $I->haveHttpHeader('Content-Type', 'application/json' );
                $I->sendPut('human?_id='.$this->userId, $userData);
                $I->seeResponseCodeIsSuccessful();
                $I->seeResponseContainsJson(['nModified' => '1']); 
                $I->sendGet('people', self::$userData);
                $I->assertEquals($userData['name'], json_decode($I->grabResponse())[0]->name, 'check name is updated');
        }        

         /**
         * Тест на удаление юзера
         * @group test1
         */
        public function checkUserDelete(\FunctionalTester $I)
        {
                $I->haveHttpHeader('Content-Type', 'application/json' );
                $I->sendDelete('human?_id='.$this->userId);
                $I->seeResponseCodeIsSuccessful();
                $I->seeResponseContainsJson(['deletedCount' => '1']); 
                $I->sendGet('people', self::$userData); 
                $I->assertEquals(array(), json_decode($I->grabResponse()), 'check user is deleted');
        } 
} 
