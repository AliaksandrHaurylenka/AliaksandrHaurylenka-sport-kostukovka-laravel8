<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class CreateUserInAdminTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateNewUserInAdmin(): void
    {
        $user = User::new(
            $name = 'name',
            $email = 'email',
            $role_id = 2,
            $description = 'Администратор сайта.'
        );

        self::assertNotEmpty($user);

        self::assertEquals($name, $user->name);
        self::assertEquals($email, $user->email);
        self::assertNotEmpty($user->password, "Поле пароль не должно быть пустым!");
        self::assertEquals($role_id, $user->role_id, 'Роль идентифицируется цифрой!');
        self::assertEquals($description, $user->description, 'Описание должно быть не менее 10 и не более 500 символов.');        
    }
}
