 <form action="edit?id=<?= $product['id'] ?>" method="post" data-toggle="validator">
     <div style="text-align:center;"><b><?php echo $this->get('message')?></b></div>

     <fieldset disabled>
         <div class="form-group">
             <label for="disabledTextInput">Ідентифікатор редагуючого товару</label>
             <input type="text" id="disabledTextInput"  value="№<?= $product['id'] ?>" class="form-control" placeholder="Disabled input">
         </div>
     </fieldset>
        <div class="form-group has-feedback">
            <label for="input-sku">SKU</label>
            <input type="text" name="sku" value="<?= $product['sku'] ?>" class="form-control" id="input-sku"
                   data-required-error="Поле не заповнено" placeholder="sku" required>
            <div class="help-block with-errors">Обов'язвкове поле. Поле повинно складатися лише з букв та цифр не більше 30 символів</div>
        </div>
        <div class="form-group has-feedback">
            <label for="input-name">Ім'я</label>
            <input type="text" name="name" value="<?= $product['name'] ?>" class="form-control" id="input-name"
                   data-required-error="Поле не заповнено" placeholder="Ім'я" required>
            <div class="help-block with-errors">Обов'язвкове поле</div>
        </div>
        <div class="form-group has-feedback">
            <label for="input-price">Ціна</label>
            <input type="text" pattern="\d+([\.,]\d+)?" name="price" value="<?= $product['price'] ?>" class="form-control" id="input-price"
                   data-required-error="Поле не заповнено" placeholder="Ціна" required>
            <div class="help-block with-errors">Обов'язвкове поле. Кільсть цифер після коми не більше двух</div>
        </div>
        <div class="form-group has-feedback">
            <label for="input-qty">QTY</label>
            <input type="text" pattern="\d+([\.,]\d+)?" name="qty" value="<?= $product['qty'] ?>" class="form-control" id="input-qty"
                   data-required-error="Поле не заповнено" placeholder="Кількість" required>
            <div class="help-block with-errors">Обов'язвкове поле. Кільсть цифер після коми не більше трьох</div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Опис продукту</label>
            <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3"><?php echo htmlspecialchars_decode($product['description']); ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Відправити</button>
        </div>
    </form>

