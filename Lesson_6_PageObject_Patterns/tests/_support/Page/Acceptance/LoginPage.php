<?php
namespace Page\Acceptance;

/**
 * страница для авторизации
 */
class LoginPage
{
    /**
     * константа юзернейм для ошибочной  авторизации
    */
    public const USERNAME = 'locked_out_user';

    /**
     * константа пароль для  ошибочной  авторизации
     */
    public const PASS = 'secret_sauce';

    /**
     * УРЛ страницы авторизации
     */
    public static $URL = ' ';

    /**
     * селектор для поля ввода логина
     */
    public static $userNameField = '#user-name';

    /**
     * селектор для поля ввода пароля
     */
    public static $passwordField = '#password';

    /**
     * селектор на кнопку Login
     */
    public static $loginButton =  '#login-button';

    /**
     * селектор на кнопку закрытия (блок ошибки) 
     */
    public static $closeButton =  '.error-button';

    /**
     * селектор на поле с ошибкой
     */
    public static $errorBox =  '.error-message-container > h3';

    /**
     * объект AcceptanceTester
     *
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    /**
     * метод конструктора
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    /**
     * Заполняет поле ввода username
     */
    public  function fillUserNameField ( )
    {
        $this->acceptanceTester->fillField(self::$userNameField, self::USERNAME);

        return $this;

    }

    /**
     * Заполняет поле ввода password
    */
    public  function fillPassField ( )
    {
        $this ->acceptanceTester->fillField (self::$passwordField, self::PASS);

        return $this;

    }

    /**
     * нажимает на кнопку Login
    */
      public  function clickButton ( )
      {
         $this ->acceptanceTester->click (self::$loginButton);

         return $this;
      }

    /**
     * нажимает на кнопку закрытия (блок ошибки)
    */
      public  function closeButton ( )
      {
         $this ->acceptanceTester->click (self::$closeButton);
         
         return $this;
        
      }

}