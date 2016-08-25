<?php
namespace Gunz\Model;

class ServerStatusModel extends \Application\Model\Model
{

    const ENTITY = 'Gunz\Entity\ServerStatus';

    public function save($data)
    {
        $data->setCurrPlayer(0);
        $data->setTime(new \DateTime());

        $this->getRepository()->save($data);
    }
}