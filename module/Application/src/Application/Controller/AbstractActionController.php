<?php
namespace Application\Controller;

use Application\Common\Message;

abstract class AbstractActionController extends \Zend\Mvc\Controller\AbstractActionController
{

    const SAVE = 'save';

    const REMOVE = 'remove';

    /**
     *
     * @var int
     */
    protected $lastInsertId;

    /**
     * Form
     *
     * @var \Zend\Form\Form
     */
    protected $form;

    /**
     * Model
     *
     * @var \Application\Model\Model
     */
    protected $model;

    /**
     * Retorna o usuário atual
     *
     * @return \Autenticacao\Entity\Usuario
     */
    protected function getIdentity()
    {
        $autuService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        $identity = $autuService->getIdentity();

        return $identity;
    }

    /**
     * Retorna a instituição atual
     *
     * @return \Cadastro\Entity\Instituicao
     */
    protected function getInstituicao()
    {
        $identity = $this->getIdentity();
        return $identity->getInstituicao();
    }

    /**
     *
     * @param string $method
     * @param string $message
     * @param string $route
     * @param array $params
     * @throws \Exception
     * @return Ambigous <\Zend\Http\Response, \Zend\Stdlib\ResponseInterface>|\Application\Controller\AbstractActionController
     */
    public function salvar($method, $message, $route, array $params)
    {
        if ($this->getRequest()->isPost()) {

            $data = array_merge_recursive($this->request->getPost()->toArray(), $this->request->getFiles()->toArray());

            $this->form->setData($data);

            if ($method == self::REMOVE) {
                $this->model->remove($this->object);
            } elseif ($method == self::SAVE) {
                if ($this->form->isValid()) {
                    $this->lastInsertId = $this->model->save($this->form->getData());
                } else {
                    throw new \Exception(Message::FORM_INVALID);
                }
            } else {
                throw new \Exception('$method deve ser self::SAVE ou self::REMOVE, no entanto foi recebido ' . $method);
            }

            $this->flashmessenger()->addSuccessMessage($message);
            return $this->redirect()->toRoute($route, $params);
        }

        return $this;
    }

    /**
     * Desabilita todos os campos do form
     *
     * @return \Application\Controller\AbstractActionController
     */
    protected function disableInputs()
    {
        foreach ($this->form->getIterator() as $iterator) {
            if ($iterator instanceof \Zend\Form\Element\Collection) {
                $this->disabledElements($iterator->getTargetElement()
                    ->getElements());
            } else
                if ($iterator instanceof \Zend\Form\Fieldset) {
                    $this->disabledElements($iterator->getElements());
                } else {
                    $this->disabledElements([
                        $iterator
                    ]);
                }
        }
        return $this;
    }

    /**
     * Desabilitar elementos de um form ou fieldset
     *
     * @param array $elements
     * @return \Application\Controller\AbstractActionController
     */
    protected function disabledElements(array $elements)
    {
        $notDisables = array(
            'submit',
            'hidden'
        );

        foreach ($elements as $element) {

            if (! in_array($element->getAttribute('type'), $notDisables)) {
                $element->setAttribute('disabled', true);
            }
        }
        return $this;
    }

    /**
     * Altera o label do botão cancelar para voltar e remove o botão confirmar
     *
     * @return \Application\Controller\AbstractActionController
     */
    protected function formView()
    {
        $this->disableInputs();
        $this->form->get('botoes')->remove('button-enviar');
        $this->form->get('botoes')
            ->get('button-cancelar')
            ->setOption('label', 'Voltar')
            ->setOption('glyphicon', 'chevron-left')
            ->setAttribute('class', 'btn-primary');

        return $this;
    }

    /**
     * Altera o lavel do botão confirmar para Remover e muda a cor pra vermelho
     *
     * @return \Application\Controller\AbstractActionController
     */
    protected function formRemove()
    {
        $this->disableInputs();
        $this->form->get('botoes')
            ->get('button-enviar')
            ->setOption('label', 'Remover')
            ->setAttribute('class', 'btn-danger')
            ->setAttribute('formnovalidate', 'formnovalidate');

        return $this;
    }

    /**
     *
     * @param string $repo
     */
    protected function getRepository($repo)
    {
        $em = $this->getServiceLocator()->get('EntityManager');
        return $em->getRepository($repo);
    }

    /**
     *
     * @return \Zend\Stdlib\Parameters
     */
    protected function getPost()
    {
        return $this->getRequest()->getPost();
    }

    /**
     *
     * @return boolean
     */
    protected function isAjax()
    {
        return $this->getRequest()->isXmlHttpRequest();
    }

    /**
     *
     * @return boolean
     */
    protected function isPost()
    {
        return $this->getRequest()->isPost();
    }

    /**
     * ID do último insert realizado no banco
     *
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->lastInsertId;
    }

    /**
     *
     * @param int $lastInsertId
     * @return \Application\Controller\AbstractActionController
     */
    public function setLastInsertId($lastInsertId)
    {
        $this->lastInsertId = $lastInsertId;

        return $this;
    }

    /**
     *
     * @return \Zend\Form\Form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     *
     * @param \Zend\Form\Form $form
     * @return \Application\Controller\AbstractActionController
     */
    public function setForm(\Zend\Form\Form $form)
    {
        $this->form = $form;

        return $this;
    }

    /**
     *
     * @return \Application\Model\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     *
     * @param \Application\Model\Model $model
     * @return \Application\Controller\AbstractActionController
     */
    public function setModel(\Application\Model\Model $model)
    {
        $this->model = $model;

        return $this;
    }
}

