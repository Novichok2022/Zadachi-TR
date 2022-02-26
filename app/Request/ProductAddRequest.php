<?php

declare(strict_types=1);

namespace Request;

use \Core\Requests;

/**
 * Class ProductEditRequest
 */
class ProductAddRequest extends Requests
{

    /**
     * Валідація форм
     * Повертає масив відалідованих форм HTML.
     * У разі виникнення помилки, створюється ([Eror] => false) для відповідного поля.
     *
     * @return array
     */
    public function formCheck() :array
    {
        $validArgument = [];

        if (filter_has_var(INPUT_POST, 'sku')) {
            $sku = (filter_input(INPUT_POST, 'sku', FILTER_VALIDATE_REGEXP,
                ["options" => ["regexp" => "/^([а-яА-ЯёЁЁёЇїІіЄєҐґa-zA-Z0-9][_]*){1,30}$/u"],]));
            if ($sku !== false && mb_strlen($sku) <= 30) {
                $validArgument['sku'] = $sku;
            } else {
                $validArgument['Eror'] = false;
            }
        }

        if (filter_has_var(INPUT_POST, 'name')) {
            $name = (filter_input(INPUT_POST, 'name', FILTER_VALIDATE_REGEXP,
                ["options" => ["regexp" => "/^([а-яА-ЯёЁЁёЇїІіЄєҐґa-zA-Z0-9\s]){1,255}$/u"],]));

            if ($name !== false && !empty($name)) {
                $name = trim($name);
                $validName = (mb_strlen($name) <= 255);

                if ($validName !== false) {
                    $validArgument['name'] = $name;
                } else {
                    $validArgument['Eror'] = false;
                }
            }
        }

        if (filter_has_var(INPUT_POST, 'price')) {
            $price = (filter_input(INPUT_POST, 'price', FILTER_VALIDATE_REGEXP,
                ["options" => ["regexp" => "/^[1-9]\d{1,9}[.,]?([0-9]{0,2})?$/"],]));
            if ($price !== false) {
                $validPrice = str_replace(",", ".", $price);
                $validArgument['price'] = $validPrice;
            } else {
                $validArgument['Eror'] = false;
            }
        }

        if (filter_has_var(INPUT_POST, 'qty')) {
            $qty = (filter_input(INPUT_POST, 'qty', FILTER_VALIDATE_REGEXP,
                ["options" => ["regexp" => "/^[1-9]\d{1,8}[.,]?([0-9]{0,3})?$/"],]));
            if ($qty !== false) {
                $validQty = str_replace(",", ".", $qty);
                $validArgument['qty'] = $validQty;
            } else {
                $validArgument['Eror'] = false;
            }
        }

        if (filter_has_var(INPUT_POST, 'description')) {
            $description = (filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
            if ($description !== false) {
                $validArgument['description'] = trim($description);
            } else {
                $validArgument['Eror'] = false;
            }
        }

        return $validArgument;
    }

}
