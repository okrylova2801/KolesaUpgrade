<?php
namespace Helper;

use Faker\Provider\Base;

class CustomFakerProvider extends Base
{       
        protected $creditCardNumbers = [
                '4111',
                '6011',
                '6390'
        ];

        /**
         * рандомный номер карточек
         */
        public function getCreditNumber()
        {
                return sprintf(
                        '%d%d%d%d',
                        $this->creditCardNumbers[array_rand($this->creditCardNumbers)],
                        random_int(1111, 9999),
                        random_int(2222, 7777),
                        random_int(1111, 9999)
                );
        }
}
