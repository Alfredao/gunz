<?php
namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

abstract class Repository extends EntityRepository
{


    /**
     * 
     * @param int $id
     */
    public function delete($id)
    {
        $entity = $this->find($id);
        
        if (! empty($entity)) {
            $em = $this->getEntityManager();
            $em->remove($entity);
            $em->flush();
        }
    }

    /**
     * Salva o objeto no banco
     * Retorna o id do objeto quando salva
     * 
     * @param Entity $data
     */
    public function save($data)
    {
        $em = $this->getEntityManager();
        $em->persist($data);
        $em->flush();
        
        if (method_exists($data, 'getId')) {
            return $data->getId();
        }
    }
}