<?php
namespace app\mpanel\model;
use think\Model;

class Node extends Model {
    protected $table = 'ss_node';
    protected $pk = 'id';

    public function getIpAttr($value) {
        return long2ip($value);
    }
}