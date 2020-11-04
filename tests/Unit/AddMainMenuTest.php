<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Menu;

class AddMainMenuTest extends TestCase
{
    use DatabaseTransactions;

    public static function testAddMainMenuAdmin()
    {
        $menu = Menu::new_menu(
            $title = 'menu',
            $slug = 'menu',
            $drop = 0
        );

        self::assertNotEmpty($menu, 'Сущность menu пустое!');

        self::assertEquals($title, $menu->title);
        self::assertEquals($slug, $menu->slug);
        self::assertEquals($drop, $menu->drop);
    }
}