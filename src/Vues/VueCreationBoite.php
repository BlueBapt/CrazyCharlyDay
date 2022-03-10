<?php

namespace custumbox\Vues;

class VueCreationBoite extends Vue{

    public function __construct($c, $rq){
        parent::__construct("", $c, $rq);
    }

    public function linkCss() : string{
        return "";
    }

    public function createContent() : string{
        $html = <<<HTML
            <h1> Vue création compte </h1>
        HTML;
        return $html;
    }
}