<?php
namespace app\mpanel\controller;
use think\facade\Request;
use app\mpanel\controller\User;
use app\mpanel\controller\Tools;
use app\mpanel\model\Bot as BotModel;

class Bot{
    public function yours($bot) {
        return User::fast_user()->id == $bot->user;
    }
    
    public function validation($botnum) {
        return BotModel::where('bot', $botnum)->find();
    }
    
    public function discard($botnum) {
        $bot = BotModel::where('bot', $botnum)->find();
        $bot->enable = 0;
        $bot->save();
    }

    static public function bot_list($user) {
        return BotModel::where('user', $user->id)->order('enable');
    }

    static public function one($id) {
        return BotModel::get($id);
    }

    public function bot_delete() {
        $bot = NULL;

        //TODO

        if($bot->delete()) {
            return 'LOL';
        } else {
            return '未知错误,请联系开发人员';
        }
    }

    public function add() {
        $user = User::fast_user();
        $bot = new BotModel();
        
        if($bot->save()) {
            $botjson->SteamLogin = Request::param()['name'];
            $botjson->SteamPassword = Request::param()['pass'];
            //挂卡规则
            $botjson->FarmingOrders = Request::param()['order'];
            //可退款游戏是否挂卡
            $botjson->IdleRefundableGames = Request::param()['exorder'];
            //挂卡时显示的信息
            $botjson->CustomGamePlayedWhileFarming = Request::param()['message'];
            //挂卡时显示的状态
            $botjson->OnlineStatus = Request::param()['state'];
            $botjson->PasswordFormat = 'ProtectedDataForCurrentUser';
            return 'LOL';
        } else {
            return '未知错误,请联系开发人员';
        }
    }

    static public function delete_with_user($bot) {
        $bot = BotModel::where('bot', $bot)->find();
        return $bot->delete();
    }

    static public function enable_bot($user) {
        return count(BotModel::where('author', $user->id)->where('enable', 1)->all());
    }
}
