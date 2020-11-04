<?php
namespace App\Http;

use Alexusmai\LaravelFileManager\Services\ACLService\ACLRepository;


class MyACLRepository implements ACLRepository
{
    /**
     * Get user ID
     *
     * @return mixed
     */
    public function getUserID()
    {
        return \Auth::user()->role_id;
//        return \Auth::id();
    }

    /**
     * Get ACL rules list for user
     *
     * @return array
     */
    public function getRules(): array
    {
//        return config('file-manager.aclRules')[$this->getUserID()] ?? [];

        if ($this->getUserID() === 1) {
            return [
                ['disk' => 'Новости', 'path' => '*', 'access' => 2],
                ['disk' => 'Объявления', 'path' => '*', 'access' => 2],
                ['disk' => 'Пользователи', 'path' => '*', 'access' => 2],
            ];
        } else {
            return [
                ['disk' => 'Пользователи', 'path' => '/*', 'access' => 1],

                ['disk' => 'Пользователи', 'path' => 'объявления', 'access' => 1],
                ['disk' => 'Пользователи', 'path' => 'объявления/', 'access' => 1],
                ['disk' => 'Пользователи', 'path' => 'объявления/' . \Auth::user()->name . '*', 'access' => 2],

                ['disk' => 'Пользователи', 'path' => 'новости', 'access' => 1],
                ['disk' => 'Пользователи', 'path' => 'новости/', 'access' => 1],
                ['disk' => 'Пользователи', 'path' => 'новости/' . \Auth::user()->name . '*', 'access' => 2]
            ];

        }

    }
}