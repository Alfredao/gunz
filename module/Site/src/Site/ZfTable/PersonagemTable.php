<?php
namespace Site\ZfTable;

use ZfTable\AbstractTable;
use Doctrine\ORM\QueryBuilder;

class PersonagemTable extends AbstractTable
{

    protected $config = array(
        'name' => 'Personagem',
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
            'tableAlias' => 'Character',
            'title' => 'Nome',
            'width' => '150',
            'filters' => 'text'
        ),
        'level' => array(
            'tableAlias' => 'Character',
            'title' => 'Level',
            'width' => '150',
            'filters' => 'text'
        ),
        'xp' => array(
            'tableAlias' => 'Character',
            'title' => 'XP',
            'width' => '50',
            'filters' => 'text'
        ),
        'killCount' => array(
            'tableAlias' => 'Character',
            'title' => 'Assassinatos',
            'width' => '50',
            'filters' => 'text'
        ),
        'deathCount' => array(
            'tableAlias' => 'Character',
            'title' => 'Mortes',
            'width' => '50',
            'filters' => 'text'
        ),
        'id' => array(
            'tableAlias' => 'Character',
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

        $qb = $repo->createQueryBuilder('Character');

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
            $qb->andWhere($qb->expr()->like('Character.name', $qb->expr()->literal("%{$value}%")));
        }
        if ($value = $this->getParamAdapter()->getValueOfFilter('level')) {
            $qb->andWhere($qb->expr()->like('Character.level', $qb->expr()->literal("%{$value}%")));
        }
        if ($value = $this->getParamAdapter()->getValueOfFilter('xp')) {
            $qb->andWhere($qb->expr()->like('Character.xp', $qb->expr()->literal("%{$value}%")));
        }
        if ($value = $this->getParamAdapter()->getValueOfFilter('killCount')) {
            $qb->andWhere($qb->expr()->like('Character.killCount', $qb->expr()->literal("%{$value}%")));
        }
        if ($value = $this->getParamAdapter()->getValueOfFilter('deathCount')) {
            $qb->andWhere($qb->expr()->like('Character.deathCount', $qb->expr()->literal("%{$value}%")));
        }
    }
}