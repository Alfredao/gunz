<?php

namespace Admin\ZfTable;

use ZfTable\AbstractTable;
use Doctrine\ORM\QueryBuilder;

class AccountTable extends AbstractTable
{

    protected $config = array(
        'name' => 'Account',
        'showPagination' => true,
        'showQuickSearch' => true,
        'showItemPerPage' => true,
        'showColumnFilters' => true,
    );

    protected $headers = array(
        'name' => array(
            'tableAlias' => 'Account',
            'title' => 'Nome',
            'width' => '150'
        ),
		'user' => array(
            'tableAlias' => 'Account',
            'title' => 'Usuário',
            'width' => '150'
        ),
		'email' => array(
            'tableAlias' => 'Account',
            'title' => 'E-mail',
            'width' => '150'
        ),
		'regDate' => array(
            'tableAlias' => 'Account',
            'title' => 'Data criação',
            'width' => '50'
        ),
		'id' => array(
            'tableAlias' => 'Account',
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

        $qb = $repo->createQueryBuilder('Account');
        $qb->innerJoin('Account.login', 'Login');

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

		$this->getHeader('regDate')->getCell()->addDecorator('dateformat', array('format' => 'd/m/Y'));

		$this->getHeader('id')->addDecorator('callable', array(
			'callable' => function() use($url) {
				$links = '<a href="' . $url('admin/default', array('controller' => 'account', 'action' => 'new')) . '" class="btn btn-success btn-condensed btn-sm"><i class="fa fa-plus"></i></a> ';

				return $links;
			}
		));

		$this->getHeader('id')->getCell()->addDecorator('callable', array(
    			'callable' => function($record, $context) use($url) {

				$links = '<a href="' . $url('admin/default', array('controller' => 'account', 'action' => 'view', 'id' => $record)) . '" class="btn btn-default btn-condensed btn-sm"><i class="fa fa-search"></i></a> ';
				$links .= '<a href="' . $url('admin/default', array('controller' => 'account', 'action' => 'edit', 'id' => $record)) . '" class="btn btn-primary btn-condensed btn-sm"><i class="fa fa-pencil"></i></a> ';
				$links .= '<a href="' . $url('admin/default', array('controller' => 'account', 'action' => 'delete', 'id' => $record)) . '" class="btn btn-danger btn-condensed btn-sm"><i class="fa fa-trash-o"></i></a> ';

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