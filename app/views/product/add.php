<form action="<?php use Core\Route; $_SERVER['PHP_SELF']; ?>"  method="post" data-toggle="validator">
    <div class="form-group has-feedback">
        <label for="input-sku">SKU</label>
        <input type="text" name="sku" class="form-control" id="input-sku"
               data-required-error="Поле не заповнено" placeholder="sku" required>
        <div class="help-block with-errors">Обов'язвкове поле. Поле повинно складатися лише з букв та цифр не більше 30 символів</div>
    </div>
    <div class="form-group has-feedback">
        <label for="input-name">Ім'я</label>
        <input type="text" name="name" class="form-control" id="input-name"
               data-required-error="Поле не заповнено" placeholder="Ім'я" required>
        <div class="help-block with-errors">Обов'язвкове поле</div>
    </div>
    <div class="form-group has-feedback">
        <label for="input-price">Ціна</label>
        <input type="text" pattern="\d+([\.,]\d+)?" name="price"  class="form-control" id="input-price"
               data-required-error="Поле не заповнено" placeholder="Ціна" required>
        <div class="help-block with-errors">Обов'язвкове поле. Кільсть цифер після коми не більше двух</div>
    </div>
    <div class="form-group has-feedback">
        <label for="input-qty">QTY</label>
        <input type="text" pattern="\d+([\.,]\d+)?" name="qty" class="form-control" id="input-qty"
               data-required-error="Поле не заповнено" placeholder="Кількість" required>
        <div class="help-block with-errors">Обов'язвкове поле. Кільсть цифер після коми не більше трьох</div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Опис продукту</label>
        <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Створити</button>
    </div>
</form>