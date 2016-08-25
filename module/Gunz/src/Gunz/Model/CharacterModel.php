<?php
namespace Gunz\Model;

class CharacterModel extends \Application\Model\Model
{

    const ENTITY = 'Gunz\Entity\Character';

    /**
     * Save character
     *
     * @param \Gunz\Entity\Character $data
     * @return mixed
     */
    public function save($data)
    {
        if (null === $data->getRegDate()) {
            $data->setRegDate(new \DateTime());
        }

        return parent::save($data);
    }
}