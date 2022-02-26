<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Core\View;

/**
 * Class CustomerController
 */
class CustomerController extends Controller
{

    /**
     * Customer index action that shows customers list
     *
     * @return void
     */
    public function indexAction(): void
    {
        $this->forward('customer/list');
    }

    /**
     * Customer list action
     *
     * @return void
     */
    public function listAction(): void
    {
        $this->set('title', "Клієнти");

        $customers = $this->getModel('Customer')
            ->initCollection()
            ->sort($this->getSortParams())
            ->getCollection()
            ->select();

        $this->set('customers', $customers);

        $this->renderLayout();
    }


    protected function getSortParams(): array
    {
        $params = [];
        $sortfirst = filter_input(INPUT_POST, 'sortfirst');
        if ($sortfirst === "id_DESC") {
            $params['customer_id'] = 'DESC';
        } else {
            $params['customer_id'] = 'ASC';
        }

        return $params;
    }
}