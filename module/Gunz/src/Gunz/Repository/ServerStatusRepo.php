<?php

namespace Gunz\Repository;

class ServerStatusRepo extends \Application\Repository\Repository 
{
	/**
	 * Retorna o total de players online no servidor
	 *
	 * @return int
	 */
    public function getTotal()
	{
		$qb = $this->createQueryBuilder('ServerStatus');
		$qb->select('SUM(ServerStatus.currPlayer)');
		$qb->where($qb->expr()->eq('ServerStatus.opened', \Gunz\Entity\ServerStatus::STATUS_OPENED));
		
		return $qb->getQuery()->getSingleScalarResult();
	}
}

