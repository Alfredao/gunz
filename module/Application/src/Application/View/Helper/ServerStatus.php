<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ServerStatus extends AbstractHelper
{

    public function isOnline($host, $port)
    {
        $isOnline = @fsockopen($host, $port, $errno, $errstr, 3);

        if ($isOnline) {
            return true;
        }

        return false;
    }

    public function __invoke($host, $port)
    {
        if ($this->isOnline($host, $port)) {
            return '<span style="color: green;">ONLINE</span>';
        }

        return '<span style="color: red;">OFFLINE</span>';
    }
}


