<?php
namespace app\mpanel\controller;
use think\Controller;
use Config;

class Index extends Controller {
    public function index() {
        return $this->fetch();
    }
}
