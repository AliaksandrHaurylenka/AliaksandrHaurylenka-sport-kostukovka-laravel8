<?php
namespace App\UserHelpers;

class generateRoute
{
    public $name_table;
    public $controller;

    function __construct($name_table, $controller)
    {
        $this->name_table = $name_table;
        $this->controller = $controller;
    }
}

$resource = new generateRoute('main_menus', 'MainMenusController');

$actions = [
    '_mass_destroy',
    '_restore',
    '_perma_del',
];


echo '// Route for: ' . ucwords($resource->name_table) . PHP_EOL;

$route = <<<ROUTE
Route::resource('$resource->name_table', 'Admin\MainMenusController');
Route::post('$resource->name_table$actions[0]', ['uses' => 'Admin\\{$resource->controller}@massDestroy', 'as' => '$resource->name_table.mass_destroy']);
Route::post('$resource->name_table$actions[1]/{id}', ['uses' => 'Admin\\{$resource->controller}@restore', 'as' => '$resource->name_table.restore']);
Route::delete('$resource->name_table$actions[2]/{id}', ['uses' => 'Admin\\{$resource->controller}@perma_del', 'as' =>'$resource->name_table.perma_del']);
ROUTE;

echo $route;
?>