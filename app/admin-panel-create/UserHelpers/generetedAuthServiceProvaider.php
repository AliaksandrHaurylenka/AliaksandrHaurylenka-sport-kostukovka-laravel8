<?php
namespace App\UserHelpers;

$name_models = [
    'main_menu',
    'program'
];

$actions = [
    '_access',
    '_create',
    '_edit',
    '_view',
    '_delete'
];




foreach ($name_models as $name_model){
    echo '// Auth gates for: ' . ucwords($name_model) . PHP_EOL;
    foreach ($actions as $action){
        $gate = <<<GATE
Gate::define('$name_model$action', function (\$user) {
    return in_array(\$user->role_id, [1]);
});
GATE;
      echo $gate . PHP_EOL;
    }
    echo PHP_EOL . PHP_EOL;
}
