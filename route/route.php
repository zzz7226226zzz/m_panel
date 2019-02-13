<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('index', 'mpanel/index/index');
Route::get('login', 'mpanel/user/login');
Route::get('signup', 'mpanel/user/signup');
Route::get('node_manage', 'mpanel/index/node_manage');
Route::get('announcement_manage', 'mpanel/index/announcement_manage');
Route::post('register', 'mpanel/user/register');
Route::post('verify_account', 'mpanel/user/verify_account');

return [

];
