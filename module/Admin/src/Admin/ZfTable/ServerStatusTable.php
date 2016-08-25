<?php

namespace Admin\ZfTable;

use ZfTable\AbstractTable;
use Doctrine\ORM\QueryBuilder;

class ServerStatusTable extends AbstractTable
{

    protected $config = array(
        'name' => 'ServerStatus',
        'showPagination' => true,
        'showQuickSearch' => true,
        'showItemPerPage' => true,
        'showColumnFilters' => true,
    );

    protected $headers = array(
        'name' => array(
            'tableAlias' => 'ServerStatus',
            'title' => 'Nome',
            'width' => '150'
        ),
		'ip' => array(
            'tableAlias' => 'ServerStatus',
            'title' => 'IP',
            'width' => '100'
        ),
		'port' => array(
            'tableAlias' => 'ServerStatus',
            'title' => 'Porta',
            'width' => '30'
        ),
		'type' => array(
            'tableAlias' => 'ServerStatus',
            'title' => 'Tipo',
            'width' => '100'
        ),
		'opened' => array(
            'tableAlias' => 'ServerStatus',
            'title' => 'Status',
            'width' => '100'
        ),
		'id' => array(
            'tableAlias' => 'ServerStatus',
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

        $qb = $repo->createQueryBuilder('ServerStatus');

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
				$links = '<a href="' . $url('admin/default', array('controller' => 'server-status', 'action' => 'new')) . '" class="btn btn-success btn-condensed btn-sm"><i class="fa fa-plus"></i></a> ';

				return $links;
			}
		));

		$this->getHeader('id')->getCell()->addDecorator('callable', array(
			'callable' => function($record, $context) use($url) {

				$links = '<a href="' . $url('admin/default', array('controller' => 'server-status', 'action' => 'view', 'id' => $record)) . '" class="btn btn-default btn-condensed btn-sm"><i class="fa fa-search"></i></a> ';
				$links .= '<a href="' . $url('admin/default', array('controller' => 'server-status', 'action' => 'edit', 'id' => $record)) . '" class="btn btn-primary btn-condensed btn-sm"><i class="fa fa-pencil"></i></a> ';
				$links .= '<a href="' . $url('admin/default', array('controller' => 'server-status', 'action' => 'delete', 'id' => $record)) . '" class="btn btn-danger btn-condensed btn-sm"><i class="fa fa-trash-o"></i></a> ';

				return $links;
			}
		));

		$this->getHeader('opened')->getCell()->addDecorator('callable', array(
			'callable' => function($record, $context) {
				if ($record == \Gunz\Entity\ServerStatus::STATUS_CLOSED) return 'Fechado';
				elseif ($record == \Gunz\Entity\ServerStatus::STATUS_OPENED) return 'Aberto';
				else return $record;
			}
		));

		$this->getHeader('type')->getCell()->addDecorator('callable', array(
			'callable' => function($record, $context) {
                if ($record == \Gunz\Entity\ServerStatus::TYPE_NORMAL) return 'Normal';
                elseif ($record == \Gunz\Entity\ServerStatus::TYPE_CLAN) return 'Clã';
                elseif ($record == \Gunz\Entity\ServerStatus::TYPE_QUEST) return 'Quest';
                elseif ($record == \Gunz\Entity\ServerStatus::TYPE_DEBUG) return 'Debug & Test';
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