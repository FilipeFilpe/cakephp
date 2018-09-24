<?php
namespace App\View\Helper;

use Cake\View\Helper;

class TotalHelper extends Helper
{
    var $precoTotal;
    public function precoTotal($total) {
        $this->precoTotal += $total;
    }

    public function getPrecoTotal() {
        return "Total: ".$this->precoTotal;
    }
}