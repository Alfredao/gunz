<?php
namespace Gunz\Model;

class ClanModel extends \Application\Model\Model
{

    const ENTITY = 'Gunz\Entity\Clan';

    /**
     * Save character
     *
     * @param \Gunz\Entity\Clan $data
     * @return mixed
     */
    public function save($data)
    {
//         if (null === $data->getRegDate()) {
//             $data->setRegDate(new \DateTime());
//         }

        return parent::save($data);
    }
}