<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Post;

class AddPostTest extends TestCase
{
    use DatabaseTransactions;

    public static function testAddPostAdmin()
    {
        $post = Post::new_post(
            $title = 'Post',
            $slug = 'post',
            $content = 'Вот имена победителей и призеров:',
            $image = '0QKhmukeSK.jpeg',
            $date = date('02/11/2020'),
            // $section_id = 1,
            // $user_id = 1
            // $status = 0,
            // $views = 100,
            // $is_featured = 0
        );

        self::assertNotEmpty($post, 'Объект "post" пустой!');

        self::assertEquals($title, $post->title);
        self::assertEquals($slug, $post->slug);
        self::assertEquals($content, $post->content);
        self::assertEquals($image, $post->image);
        self::assertEquals($date, $post->date);
        // self::assertEquals($section_id, $post->section_id);
        // self::assertEquals($user_id, $post->user_id);
        // self::assertEquals($status, $post->$status);
        // self::assertEquals($views, $post->$views);
        // self::assertEquals($is_featured, $post->$is_featured);
    }
}
