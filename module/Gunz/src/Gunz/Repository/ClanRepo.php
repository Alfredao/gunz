<?php

namespace Gunz\Repository;

class ClanRepo extends \Application\Repository\Repository
{
	/**
	 * Retorna o total de clãs do servidor
	 *
	 * @return int
	 */
	public function getTotal()
	{
		$qb = $this->createQueryBuilder('Clan');
		$qb->select('COUNT(Clan.id)');

		return $qb->getQuery()->getSingleScalarResult();
	}
}

