<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Телефонная книга</title>
    <link href="/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <?php include 'app/views/' . $template; ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить контакт</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" id="addContact">
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Фамилия</label>
                            <input type="text" class="form-control"  name="lastname" id="lastname" placeholder="Фамилия" >
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Имя</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Имя">
                        </div>
                        <div class="mb-3">
                            <label for="patronymic" class="form-label">Отчество</label>
                            <input type="text" class="form-control" name="patronymic" id="patronymic" placeholder="Отчество">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Телефон</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Телефон">
                        </div>
                        <div class="mb-3">
                            <label for="contact_type" class="form-label">Примечание</label>
                            <input type="text" class="form-control" name="contact_type" id="contact_type" placeholder="Примечание">
                        </div>
                    </form>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>
                    <button type="button" class="btn btn-primary addContactBtn">Добавить</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="/dist/js/bootstrap.js"></script>
<script src="/dist/js/jquery.min.js"></script>
<script src="/dist/js/script.js"></script>
</html>