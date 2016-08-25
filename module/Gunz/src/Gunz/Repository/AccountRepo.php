<?php

namespace Gunz\Repository;

class AccountRepo extends \Application\Repository\Repository 
{
	/**
	 * Retorna o total de contas cadastradas
	 *
	 * @return int
	 */
	public function getTotal()
	{
		$qb = $this->createQueryBuilder('Account');
		$qb->select('COUNT(Account.id)');
		
		return $qb->getQuery()->getSingleScalarResult();
	}
}

