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
Route::post('register', 'mpanel/user/register');
Route::post('verify_account', 'mpanel/user/verify_account');
Route::get('change_password', 'mpanel/user/change_password');
Route::get('logout', 'mpanel/user/logout');
Route::post('update_password', 'mpanel/user/update_password');
Route::get('node_manage/[:page]', 'mpanel/index/node_manage')->pattern(['page'=>'\d+']);
Route::get('node_add', 'mpanel/index/node_add');
Route::post('node_add_post', 'mpanel/node/add');
Route::get('node_edit/:id', 'mpanel/index/node_edit')->pattern(['id'=>'\d+']);
Route::post('node_delete', 'mpanel/node/node_delete');
Route::get('user_manage/[:page]', 'mpanel/index/user_manage')->pattern(['page'=>'\d+']);
Route::get('user_edit/[:id]', 'mpanel/index/user_edit')->pattern(['page'=>'\d+']);
Route::post('user_back_update', 'mpanel/user/back_update');
Route::get('announcement_manage', 'mpanel/index/announcement_manage');
Route::get('announcement_add', 'mpanel/index/announcement_add');
Route::get('announcement_edit/:id', 'mpanel/index/announcement_edit')->pattern(['id'=>'\d+']);
Route::post('announcement_update_post', 'mpanel/announcement/update');
Route::get('node_list', 'mpanel/index/node_list');
Route::get('code_list/[:page]', 'mpanel/index/code_list')->pattern(['page'=>'\d+']);
Route::get('download', 'mpanel/index/download');
Route::get('code_add', 'mpanel/code/add');
Route::post('update_code_head', 'mpanel/user/update_code_head');
Route::get('announcement_list', 'mpanel/index/announcement_list');

return [

];
