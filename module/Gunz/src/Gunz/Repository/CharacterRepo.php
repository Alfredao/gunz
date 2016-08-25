<?php

namespace Gunz\Repository;

class CharacterRepo extends \Application\Repository\Repository 
{
	/**
	 * Retorna o total de personagens do servidor
	 *
	 * @return int
	 */
	public function getTotal()
	{
		$qb = $this->createQueryBuilder('Character');
		$qb->select('COUNT(Character.id)');
		
		return $qb->getQuery()->getSingleScalarResult();
	}
}

