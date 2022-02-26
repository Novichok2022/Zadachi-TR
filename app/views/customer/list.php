<div class="row">
    <div class="col mt-1">
        <button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal"><i class="fa fa-user-plus"></i></button>
        <table class="table shadow ">
            <thead class="thead-dark">
            <tr>
                <th>№</th>
                <th>Прізвище</th>
                <th>Ім'я</th>
                <th>Номер телефону</th>
                <th>Email</th>
                <th>Місце проживання</th>
            </tr>
    <?php
    $customers = $this->get('customers');

    foreach ($customers as $customer): ?>
        <tr>
            <td><?=$customer['customer_id']?></td>
            <td><?=$customer['last_name']?></td>
            <td><?=$customer['first_name']?></td>
            <td><?=$customer['telephone']?></td>
            <td><?=$customer['email']?></td>
            <td><?=$customer['city']?></td>
            <td>
            <a href="?edit=<?=$customer['customer_id'] ?>" class="btn btn-success btn-sm" data-toggle="modal"><i class="fa fa-edit"></i></a>
            <a href="?delete=<?=$customer['customer_id'] ?>" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fa fa-trash"></i></a>
            </td>
        </tr> <?php endforeach; ?>
            </thead>
        </table>
    </div>
</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title">Додати користувача</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="" placeholder="Прізвище">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" value="" placeholder="Ім'я">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pos" value="" placeholder="Номер телефону">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pos" value="" placeholder="Emai">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pos" value="" placeholder="Місце проживання">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Відміна</button>
                <button type="submit" name="submit" class="btn btn-primary">Добавити</button>
            </div>
            </form>
        </div>
    </div>



