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
        Db::name('user')->update(['transfer_enable' => Tools::string_to_size(config('mppdef.transfer_enable'))]);
    }
}
