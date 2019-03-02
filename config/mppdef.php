<?php
//面板参数
return [
    //网站名
    'sitename' => '梯云纵',
    //用户默认加密方式
    'method' => 'chacha20-ietf',
    //用户默认协议
    'protocol' => 'auth_sha1_v4_compatible',
    //用户默认协议参数
    'protocol_param' => '',
    //用户默认混淆放式
    'obfs' => 'http_simple_compatible',
    //用户默认混淆参数
    'obfs_param' => 'img.alicdn.com',
    //用户默认混淆参数
    'code_head' => 'mpp',
    //节点默认流量比
    'traffic_rate' => '1',
    //端口池
    'port_min' => 10000,
    'port_max' => 20000,
    //每月默认流量
    'transfer_enable' => '50GB',
];
?>