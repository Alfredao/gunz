<?php
namespace Site\ZfTable;

use ZfTable\AbstractTable;
use Doctrine\ORM\QueryBuilder;

class ClaTable extends AbstractTable
{

    protected $config = array(
        'name' => 'Cla',
        'showPagination' => true,
        'showQuickSearch' => true,
        'showItemPerPage' => true,
        'showColumnFilters' => true
    );

    protected $headers = array(
        'pos' => array(
            'title' => '#',
            'width' => '50',
        ),
        'name' => array(
            'tableAlias' => 'Clan',
            'title' => 'Nome',
            'width' => '150',
            'filters' => 'text'
        ),
        'points' => array(
            'tableAlias' => 'Clan',
            'title' => 'Pontos',
            'width' => '150',
            'filters' => 'text'
        ),
        'wins' => array(
            'tableAlias' => 'Clan',
            'title' => 'Vitórias',
            'width' => '150',
            'filters' => 'text'
        ),
        'losses' => array(
            'tableAlias' => 'Clan',
            'title' => 'Derrotas',
            'width' => '150',
            'filters' => 'text'
        ),
        'id' => array(
            'tableAlias' => 'Clan',
            'width' => '50',
        ),

    );

    /**
     *
     * @param \Application\Repository\Repository $repo
     * @param \Zend\Stdlib\Parameters $post
     */
    public function __construct(\Application\Repository\Repository $repo, \Zend\Stdlib\Parameters $post)
    {
        $this->setRepository($repo);

        $qb = $repo->createQueryBuilder('Clan');

        $this->setSource($qb);
        $this->setParamAdapter($post);
    }

    /**
     * (non-PHPdoc)
     *
     * @see \ZfTable\AbstractTable::init()
     */
    public function init()
    {
        $url = $this->getViewHelperManager()->get('url');

		$this->getHeader('id')->getCell()->addClass('text-center')->addDecorator('callable', array(
    			'callable' => function($record, $context) use($url) {

				$links = '<a href="' . $url('site/default', array('controller' => 'visualizar', 'action' => 'clan', 'id' => $record)) . '" class="btn btn-default btn-condensed btn-sm"><i class="fa fa-search"></i></a> ';

				return $links;
			}
		));
    }

    /**
     * (non-PHPdoc)
     *
     * @see \ZfTable\AbstractTable::initFilters()
     */
    public function initFilters(QueryBuilder $qb)
    {
        if ($value = $this->getParamAdapter()->getValueOfFilter('name')) {
            $qb->andWhere($qb->expr()->like('Clan.name', $qb->expr()->literal("%{$value}%")));
        }
    }
}