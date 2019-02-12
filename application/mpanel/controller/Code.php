<?php
namespace app\mpanel\controller;
use app\mpanel\model\Code as CodeModel;

class Code{
    public function validation($codenum) {
        return CodeModel::where('code', $codenum)->find();
    }
    
    public function discard($codenum) {
        $code = CodeModel::where('code', $codenum)->find();
        $code->enable = 0;
        $code->save();
    }
}
