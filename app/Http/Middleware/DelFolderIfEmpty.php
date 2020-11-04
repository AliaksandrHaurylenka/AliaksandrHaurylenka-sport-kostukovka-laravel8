<?php

namespace App\Http\Middleware;

use App\Models\Ad;
use App\Models\Post;
use Closure;
use App\Models\FoldersSystem;
use Auth;

class DelFolderIfEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        FoldersSystem::del_dir_if_empty(Post::NEWS);
        FoldersSystem::del_dir_if_empty(Ad::PATH);
        FoldersSystem::del_dir_if_empty('/images/simple_users/объявления/'.Auth::user()->name.'/');
        FoldersSystem::del_dir_if_empty('/images/simple_users/новости/'.Auth::user()->name.'/');

        //$empty_dir = new FoldersSystem();
        //$empty_dir->rmdir_empty('/images/simple_users/новости/');

        return $next($request);
    }
}
