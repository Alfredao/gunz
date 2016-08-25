<?php

namespace Gunz\Repository;

class ServerLogRepo extends \Application\Repository\Repository
{
	/**
	 * Retorna o recorde de players online
	 *
	 * @return int
	 */
    public function getRecorde()
	{
		$qb = $this->createQueryBuilder('ServerLog');
		$qb->select('MAX(ServerLog.playerCount)');

		return $qb->getQuery()->getSingleScalarResult();
	}
}

