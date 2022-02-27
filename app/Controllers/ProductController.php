<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Core\View;
use Request\ProductEditRequest;
use Request\ProductAddRequest;


/**
 * Class ProductController
 */
class ProductController extends Controller
{
    /**
     * @var ProductEditRequest
     */
    private $productEditRequest;

    /**
     * @var ProductEditRequest
     */
    private $productAddRequest;

    public function __construct()
    {
        $this->productEditRequest = new ProductEditRequest();
        $this->productAddRequest = new ProductAddRequest();
        parent::__construct();
    }

    /**
     * Product index action that shows product list
     *
     * @return void
     */
    public function indexAction(): void
    {
        $this->forward('product/list');
    }

    /**
     * Product list action
     *
     * @return void
     */
    public function listAction(): void
    {
        $this->set('title', "Товари");

        $products = $this->getModel('Product')
            ->initCollection()
            ->sort($this->getSortParams())
            ->getCollection()
            ->select();

        $this->set('products', $products);

        $this->renderLayout();
    }

    /**
     * Single product view action
     *
     * @return void
     */
    public function viewAction(): void
    {
        $this->set('title', 'Карточка товара');

        $product = $this->getModel('Product');
        $product->initCollection()
            ->filter(['id', $this->getId()])
            ->getCollection()
            ->selectFirst();
        $this->set('products', $product);

        $this->renderLayout();
    }

    /**
     * Shows product editing page
     *
     * @return void
     */
    public function editAction(): void
    {
        $this->set("title", "Редагування товару");
        $this->set('message', 'Перевіряйте коректність ведених даних');
        $id = $this->getIdFromUrl();
        $request = $this->productEditRequest;
        $model = $this->getModel('Product');
        $product = $model->getItem($id);

        if ($product === null || empty($product)) {
            $this->redirect('/eror/eror404');
        }

        $data = $request->formCheck();

        if (isset($data['Eror'])) {
            $this->set('message', 'Введіть коректні дані');
        } elseif (isset($_GET['sucsess'])) {
            $this->set('message', 'Товар успішно збережено');
        } elseif(!empty($data)) {
            $model->updateItem($id, $data);
            $product = $model->getItem($id);
            $this->set('message', 'Запис успішно оновлено');
        }

        $this->set('product', $product);

        $this->renderLayout();
    }

    /**
     * Shows product add page
     *
     * @return void
     */
    public function addAction(): void
    {
        $this->set("title", "Додавання товару");
        $model = $this->getModel('Product');
        $request = $this->productAddRequest;
        $data = $request->formCheck();
        
        if (!isset($data['Eror']) && !empty($data)) {
            $model->addItem($data);
            $this->redirect('/product/edit?id=' . $model->getId() . '&sucsess');
        }

        $this->renderLayout();
    }

    /**
     * Delete product from DB
     *
     * @return void
     */
    public function deleteaction(): void
    {
        $this->set("title", "Видалення товару");
        $id = $this->getIdFromUrl();
        $model = $this->getModel('Product');
        $product = $model->getItem($id);

        if($product === null || empty($product)) {
            $this->redirect('/eror/eror404');
        }

            if (isset($_GET['value'])) {
                if ($_GET['value'] === 'yes') {
                    $model->deleteItem($id);
                    $this->redirect('/product/list');
                } else {
                    $this->redirect('/');
                }
            }

        $this->set('product', $product);

        $this->renderLayout();
    }

    /**
     * @return array
     */
    public function getSortParams(): array
    {
        $params = [];
        $sortfirst = filter_input(INPUT_POST, 'sortfirst');
        if ($sortfirst === "price_DESC") {
            $params['price'] = 'DESC';
        } else {
            $params['price'] = 'ASC';
        }
        $sortsecond = filter_input(INPUT_POST, 'sortsecond');
        if ($sortsecond === "qty_DESC") {
            $params['qty'] = 'DESC';
        } else {
            $params['qty'] = 'ASC';
        }

        return $params;
    }

    /**
     * @return mixed
     */
    public function getIdFromUrl()
    {
        if (filter_has_var(INPUT_GET, 'id')) {
            return filter_input(INPUT_GET, 'id');
        } else {
            return false;
        }
    }

}
