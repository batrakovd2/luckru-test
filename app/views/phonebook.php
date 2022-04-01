
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
                <tr >
                    <th scope="row"><?php echo $key + 1; ?></th>
                    <td><?= $param['lastname']; ?></td>
                    <td><?= $param['name']; ?></td>
                    <td><?= $param['patronymic']; ?></td>
                    <td><?= $param['phone']; ?></td>
                    <td><?= $param['contact_type']; ?></td>
                    <td>
                        <a type="button" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                        <a type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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