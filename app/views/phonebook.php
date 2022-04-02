
    <div class="container mt-5">
        <h1>Телефонная книга</h1>
        <!-- Button trigger modal -->
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Отчество</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Примечание</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($params as $key=>$param): ?>
                <tr>
                    <th scope="row"><?php echo $key + 1; ?></th>
                    <td class="editable" data-column="lastname"><?= $param['lastname']; ?></td>
                    <td class="editable" data-column="name"><?= $param['name']; ?></td>
                    <td class="editable" data-column="patronymic"><?= $param['patronymic']; ?></td>
                    <td class="editable" data-column="phone"><?= $param['phone']; ?></td>
                    <td class="editable" data-column="contact_type"><?= $param['contact_type']; ?></td>
                    <td>
                        <a type="button" class="btn btn-primary edit-row" data-id="<?= $param['id']; ?>"><span class="bi bi-pencil"></span></a>
                        <a type="button" class="btn btn-danger delete-row" data-id="<?= $param['id']; ?>"><span class="bi bi-trash"></span></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Добавить контакт
        </button>


    </div>