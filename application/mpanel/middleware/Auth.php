<?php
namespace app\mpanel\middleware;
use app\mpanel\controller\User;

class Auth {
    public function handle($request, \Closure $next) {
        if(!User::is_login()) {
            return redirect('mpanel/user/login');
        }
        return $next($request);
    }
}
