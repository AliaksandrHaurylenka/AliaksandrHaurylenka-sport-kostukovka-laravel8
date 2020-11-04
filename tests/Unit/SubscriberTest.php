<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Subscribe;

class SubscriberTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function testRequest(): void
    {
        $subscriber = Subscribe::register_subscriber(
            $email = 'email'
        );

        self::assertNotEmpty($subscriber);

        self::assertEquals($email, $subscriber->email);
    }


    public function testVerify(): void
    {
        $subscriber = Subscribe::register_subscriber('email');

        $subscriber->verify();

        self::assertNull($subscriber->token, "Подписчик не верефицирован!");
    }


    public function testAlreadyVerified(): void
    {
        $subscriber = Subscribe::register_subscriber('email');
        $subscriber->verify();

        $this->expectExceptionMessage('Подписчик уже верефицирован!');
        $subscriber->verify();
    }
}
