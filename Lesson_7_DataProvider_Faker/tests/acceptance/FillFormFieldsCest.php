<?php

namespace Tests\Acceptance;

use Faker\Factory;
use Helper\CustomFakerProvider;
use Page\FillFields;


/**
 * Класс для тестирования заполнения формы
 */

class FillFormFieldsCest 
{       
        /**
         * Тест на проверку заполнения полей формы с помощью фейкера
         * @group test2
         */

        public function checkFillFields(\AcceptanceTester $I)
        {
                $faker = Factory::create();
                $faker->addProvider(new CustomFakerProvider($faker));

                $name = $faker->name;
                $lastName = $faker->lastName;
                $email = $faker->email;
                $phoneNumber = $faker->phoneNumber;
                $streetAddress = $faker->streetAddress;
                $city = $faker->city;
                $state = $faker->state;
                $postCode = $faker->postcode;
                $creditCardNumber = $I->getFaker()->getCreditNumber();
                $firstNamePaymentMethod = $faker->firstName;
                $lastNamePaymentMethod = $faker->lastName;
                $month = $faker->monthName;
                $streetAddressPayment = $faker->streetAddress;
                $cityPayment =$faker->city;
                $statePayment =$faker->state;
                $postalPayment =$faker->postcode;
                $countryPayment = $faker->country;
        
                
                $I->amOnPage(' ');
                $I->fillField(FillFields::$firstName,$name);
                $I->fillField(FillFields::$lastName,$lastName);
                $I->fillField(FillFields::$email,$email);
                $I->fillField(FillFields::$phoneNumber,$phoneNumber);
                $I->fillField(FillFields::$streetAddress,$streetAddress);
                $I->fillField(FillFields::$city,$city);
                $I->fillField(FillFields::$state,$state);
                $I->fillField(FillFields::$postCode,$postCode);
                $I->click(FillFields::$creditCard);
                $I->fillField(FillFields::$firstNamePaymentMethod,$firstNamePaymentMethod);
                $I->fillField(FillFields::$lastNamePaymentMethod,$lastNamePaymentMethod);
                $I->fillField(FillFields::$creditCardNumber,$creditCardNumber);
                $I->fillField(FillFields::$securityCode,rand(100,999));
                $I->selectOption(FillFields::$month, $month);
                $I->selectOption(FillFields::$expirationYear, rand(2021,2030));
                $I->fillField(FillFields::$streetAddressPayment,$streetAddressPayment);
                $I->fillField(FillFields::$cityPayment,$cityPayment);
                $I->fillField(FillFields::$statePayment,$statePayment);
                $I->fillField(FillFields::$postalPayment,$postalPayment);
                $I->selectOption(FillFields::$countryPayment,$countryPayment);
                $I->click(FillFields::$registerButton);
                $I->waitForText('Good job',10);

        }
}
