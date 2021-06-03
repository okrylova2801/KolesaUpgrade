<?php
namespace Page;

/**
 * PageObject для заполнения формы
 */

class FillFields
{
/**
 * Селектор для поля FirstName
 */ 
public static $firstName = '#firstName'; 

/**
 * Селектор для поля Last Name
 */ 
public static $lastName = '#lastName'; 

/**
 * Селектор для поля E-mail
 */ 
public static $email = '#input_38'; 

/**
 * Селектор для поля phoneNumber
 */ 
public static $phoneNumber = '#phoneNumber'; 

/**
 * Селектор для поля streetAddress
 */ 
public static $streetAddress = '#address'; 

/**
 * Селектор для поля City
 */ 
public static $city = '#city'; 

/**
 * Селектор для поля State
 */ 
public static $state = '#state'; 

/**
 * Селектор для поля PostCode
 */ 
public static $postCode = '#postal';

/**
 * Селектор для переключателя Credit Card в разделе Payment Method
 */ 
public static $creditCard = '#input_32_paymentType_credit';

/**
 * Селектор для поля First Name в разделе Payment Method
 */ 
public static $firstNamePaymentMethod = '#input_32_cc_firstName';

/**
 * Селектор для поля Last Name в разделе Payment Method
 */ 
public static $lastNamePaymentMethod = '#input_32_cc_lastName';

/**
 * Селектор для поля Credit Card Number в разделе Payment Method
 */ 
public static $creditCardNumber = '#input_32_cc_number';

/**
 * Селектор для поля Security Code в разделе Payment Method
 */ 
public static $securityCode = '#input_32_cc_ccv';

/**
 * Селектор для поля Expiration Month в разделе Payment Method
 */ 
public static $month = '#input_32_cc_exp_month';

/**
 * Селектор для поля Expiration Year в разделе Payment Method
 */ 
public static $expirationYear = '#input_32_cc_exp_year';

/**
 * Селектор для поля Street Address в разделе Payment Method
 */ 
public static $streetAddressPayment = '#input_32_addr_line1';

/**
 * Селектор для поля Street Address в разделе Payment Method
 */ 
public static $cityPayment = '#input_32_city';

/**
 * Селектор для поля State в разделе Payment Method
 */ 
public static $statePayment = '#input_32_state';

/**
 * Селектор для поля Postal  в разделе Payment Method
 */ 
public static $postalPayment = '#input_32_postal';

/**
 * Селектор для поля Country  в разделе Payment Method
 */ 
public static $countryPayment = '#input_32_country';

/**
 * Селектор для кнопки Register
 */ 
public static $registerButton = '#input_36';
}
