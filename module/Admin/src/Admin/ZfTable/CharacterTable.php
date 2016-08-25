<?php

namespace Admin\ZfTable;

use ZfTable\AbstractTable;
use Doctrine\ORM\QueryBuilder;

class CharacterTable extends AbstractTable
{

    protected $config = array(
        'name' => 'Character',
        'showPagination' => true,
        'showQuickSearch' => true,
        'showItemPerPage' => true,
        'showColumnFilters' => true,
    );

    protected $headers = array(
        'name' => array(
            'tableAlias' => 'Character',
            'title' => 'Nome',
            'width' => '150'
        ),
		'account' => array(
			'column' => 'user',
            'tableAlias' => 'Account',
            'title' => 'Usuário',
            'width' => '150'
        ),
		'level' => array(
            'tableAlias' => 'Character',
            'title' => 'Level',
            'width' => '150'
        ),
		'xp' => array(
            'tableAlias' => 'Character',
            'title' => 'XP',
            'width' => '50'
        ),
		'id' => array(
            'tableAlias' => 'Character',
            'title' => '&nbsp;',
            'width' => '50'
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
		$qb->innerJoin('Character.account', 'Account');

        $this->setSource($qb);
        $this->setParamAdapter($post);

    }

    /**
     * (non-PHPdoc)

     * @see \ZfTable\AbstractTable::init()
     */
    public function init()
    {
        $url = $this->getViewHelperManager()->get('url');

		//$this->getHeader('regDate')->getCell()->addDecorator('dateformat', array('format' => 'd/m/Y'));

		$this->getHeader('id')->addDecorator('callable', array(
			'callable' => function() use($url) {
				$links = '<a href="' . $url('admin/default', array('controller' => 'character', 'action' => 'new')) . '" class="btn btn-success btn-condensed btn-sm"><i class="fa fa-plus"></i></a> ';

				return $links;
			}
		));

		$this->getHeader('id')->getCell()->addDecorator('callable', array(
    			'callable' => function($record, $context) use($url) {

				$links = '<a href="' . $url('admin/default', array('controller' => 'character', 'action' => 'view', 'id' => $record)) . '" class="btn btn-default btn-condensed btn-sm"><i class="fa fa-search"></i></a> ';
				$links .= '<a href="' . $url('admin/default', array('controller' => 'character', 'action' => 'edit', 'id' => $record)) . '" class="btn btn-primary btn-condensed btn-sm"><i class="fa fa-pencil"></i></a> ';
				$links .= '<a href="' . $url('admin/default', array('controller' => 'character', 'action' => 'delete', 'id' => $record)) . '" class="btn btn-danger btn-condensed btn-sm"><i class="fa fa-trash-o"></i></a> ';

				return $links;
			}
		));

    }

    /**
     * (non-PHPdoc)

     * @see \ZfTable\AbstractTable::initFilters()
     */
    public function initFilters(QueryBuilder $qb)
    {


    }
}