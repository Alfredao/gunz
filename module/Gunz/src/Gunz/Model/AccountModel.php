<?php
namespace Gunz\Model;

class AccountModel extends \Application\Model\Model
{

    const ENTITY = 'Gunz\Entity\Account';

    /**
     * Save account
     *
     * @param \Gunz\Entity\Account $data
     * @return mixed
     */
    public function save($data)
    {
        if (null === $data->getRegDate()) {
            $data->setRegDate(new \DateTime());
        }

        // define os dados do usuário no login
        $usuario = $data->getUser();
        $data->getLogin()->setUser($usuario);
        $data->getLogin()->setAccount($data);

        return parent::save($data);
    }

    public function novaConta(\Gunz\Entity\Account $account)
    {
        $account->setGradeId(0);
        $account->setPGradeId(0);

        return $this->save($account);
    }
}