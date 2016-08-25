<?php

namespace Admin\ZfTable;

use ZfTable\AbstractTable;
use Doctrine\ORM\QueryBuilder;

class ShopCategoryTable extends AbstractTable
{

    protected $config = array(
        'name' => 'ShopCategory',
        'showPagination' => true,
        'showQuickSearch' => true,
        'showItemPerPage' => true,
        'showColumnFilters' => true,
    );

    protected $headers = array(
        'nome' => array(
            'tableAlias' => 'ShopCategory',
            'title' => 'Nome',
            'width' => '250'
        ),
		'status' => array(
            'tableAlias' => 'ShopCategory',
            'title' => 'Status',
            'width' => '100'
        ),
		'ordem' => array(
            'tableAlias' => 'ShopCategory',
            'title' => 'Ordem',
            'width' => '50'
        ),
		'id' => array(
            'tableAlias' => 'ShopCategory',
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

        $qb = $repo->createQueryBuilder('ShopCategory');

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
				$links = '<a href="' . $url('admin/default', array('controller' => 'shop-category', 'action' => 'new')) . '" class="btn btn-success btn-condensed btn-sm"><i class="fa fa-plus"></i></a> ';

				return $links;
			}
		));

		$this->getHeader('id')->getCell()->addDecorator('callable', array(
			'callable' => function($record, $context) use($url) {

				$links = '<a href="' . $url('admin/default', array('controller' => 'shop-category', 'action' => 'view', 'id' => $record)) . '" class="btn btn-default btn-condensed btn-sm"><i class="fa fa-search"></i></a> ';
				$links .= '<a href="' . $url('admin/default', array('controller' => 'shop-category', 'action' => 'edit', 'id' => $record)) . '" class="btn btn-primary btn-condensed btn-sm"><i class="fa fa-pencil"></i></a> ';
				$links .= '<a href="' . $url('admin/default', array('controller' => 'shop-category', 'action' => 'delete', 'id' => $record)) . '" class="btn btn-danger btn-condensed btn-sm"><i class="fa fa-trash-o"></i></a> ';

				return $links;
			}
		));

		$this->getHeader('status')->getCell()->addDecorator('callable', array(
			'callable' => function($record, $context) {
				if ($record == \Gunz\Entity\ShopCategory::STATUS_INACTIVE) return 'Inativa';
				elseif ($record == \Gunz\Entity\ShopCategory::STATUS_ACTIVE) return 'Ativa';
				else return $record;
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