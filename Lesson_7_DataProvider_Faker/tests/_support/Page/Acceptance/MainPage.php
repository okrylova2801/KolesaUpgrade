<?php
namespace Page\Acceptance;

class MainPage
{
    /**
     * урл главной страницы товаров
     */
    public static $URL = 'index.php';

    /**
     * селектор меню Dress
     */
    public static $TopMenu = '#block_top_menu > ul > li:nth-child(2) > a';

    /**
     * селектор подменю SummerDress
     */
    public static $menuSummerDress = '#block_top_menu > ul > li:nth-child(2) > ul > li:nth-child(3) > a';

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
     * Переход на  страницу Summer Dress
     */
    public function openSummerDresses()
    {
        $this->acceptanceTester->moveMouseOver(self::$TopMenu);
        $this->acceptanceTester->click(self::$menuSummerDress);
        $this->acceptanceTester->wait(3);
        
        return new SearchPage ($this->acceptanceTester);
    }

}
