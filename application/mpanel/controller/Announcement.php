<?php
namespace app\mpanel\controller;
use think\facade\Request;
use think\facade\Validate;
use app\mpanel\model\Announcement as AnnouncementModel;

class Announcement{
    public function update(){
    $error = []; 
    if(Request::has('id','post')) {
        if(AnnouncementModel::where('id', Request::param()['id'])->find()) {
            $anno = AnnouncementModel::get(Request::param()['id']);
            $anno->updater = User::fast_user()->id;
            $anno->updatetime = time();
        } else {
            return '错误的公告id';
        }
    } else {
        $anno = new AnnouncementModel();
        $anno->creater = User::fast_user()->id;
        $anno->createtime = time();
    }
    if(!Validate::checkRule(Request::param()['header'],'require|length:1,25')) {
        $error[] = ['key'=>'header', 'error'=>'长度不合法需1-25位'];
    }
    $anno->header = Request::param()['header'];
    $anno->text = Request::param()['text'];
    if(!empty(Request::param()['sort'])) {
        if(!Validate::checkRule(Request::param()['sort'],'number|Between:0,99')) {
            $error[] = ['key'=>'sort', 'error'=>'必须为0-99之间数字'];
        }
        $anno->sort = Request::param()['sort'];
    } else {
        $anno->sort = 0;
    }
    if(count($error) > 0) {
        return $error;
    }
    if($anno->save()) {
        return "LOL";
    } else {
        return '未知错误,请联系开发人员';
    }
}
    static public function all() {
        return AnnouncementModel::where(1, 1);
    }

    static public function one($id) {
        return AnnouncementModel::get($id);
    }
    
    static public function new() {
        $top = AnnouncementModel::order('sort', 'desc')->find();
        $new = AnnouncementModel::order('createtime', 'desc')->find();
        if($new['id'] == $top['id']) {
            $annos = [$top];
        } else {
            $annos = [$top, $new];
        }
        return $annos;
    }

    public function announcement_delete() {
        $announcement = NULL;

        if(Request::has('id','post')) {
            if(AnnouncementModel::where('id', Request::param()['id'])->find()) {
                $announcement = AnnouncementModel::get(Request::param()['id']);
            } else {
                return '错误的公告id';
            }
        } else {
            return '需要给定公告id';
        }

        if($announcement->delete()) {
            return 'LOL';
        } else {
            return '未知错误,请联系开发人员';
        }
    }
}
