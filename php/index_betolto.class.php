<?php

class IndexBetolto {
    
    private $xtpl = null;
    
    public function Execute() {
        $this->setXtpl();
        $this->tartalomMegjelenitese();
    }
    
    private function setXtpl() {
        $this->xtpl = new XTemplate(TPL_FOLDER . 'index.tpl');
    }
    
    private function tartalomMegjelenitese() {
        $this->xtpl->parse('main');
        $this->xtpl->out('main');
    }
}