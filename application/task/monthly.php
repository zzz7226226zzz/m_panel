<?php
namespace app\task;

use think\Db;
use yunwuxin\cron\Task;
use app\mpanel\controller\Tools;

class monthly extends Task
{

    public function configure()
    {
        $this->monthly();
    }

    /**
     * 执行任务
     * @return mixed
     */
    protected function execute()
    {
        Db::name('user')->update(['u' => 0, 'd'=>0]);
    }
}
