$(document).ready(function () {

    function postRequest(api, params, responseFunc) {
        $.ajax({
            type: "POST",
            url: api,
            processData: false,
            contentType: false,
            data: params,
            success: responseFunc
        });
    }

    function getAnyPageParameters(formselector) {
        const form = document.querySelector(formselector);
        formdata = new FormData(form);
        return formdata;
    }

    function addRow(params) {
        $('table tbody').append('<tr >\n' +
            '                    <th scope="row">' + ($("table tbody tr").length + 1) + '</th>\n' +
            '                    <td class="editable" data-column="lastname">' + params.get('lastname') + '</td>\n' +
            '                    <td class="editable" data-column="name">' + params.get('name') + '</td>\n' +
            '                    <td class="editable" data-column="patronymic">' + params.get('patronymic') + '</td>\n' +
            '                    <td class="editable" data-column="phone">' + params.get('phone') + '</td>\n' +
            '                    <td class="editable" data-column="contact_type">' + params.get('contact_type') + '</td>\n' +
            '                    <td>\n' +
            '                        <a type="button" class="btn btn-primary edit-row" data-id=' + params.get('id')  + '><span class="bi bi-pencil"></span></a>\n' +
            '                        <a type="button" class="btn btn-danger delete-row" data-id=' + params.get('id')  + '><span class="bi bi-trash"></span></a>\n' +
            '                    </td>\n' +
            '                </tr>')
    }

    $('.addContactBtn').click(function () {
        const params = getAnyPageParameters('#addContact');
        const url = '/phonebook/create';
        postRequest(url, params, function (response) {
            if(response == 200) {
                addRow(params);
                $('#exampleModal').modal('hide')
            }
        });
    });

    $('body').on('click', function (e) {
        if($(e.target).hasClass('bi-check')) {
            let formdata = new FormData();
            $('.editable.selected').each(function () {
                formdata.append($(this).data("column"), $(this).text())
            });
            formdata.append("id", $(this).data('id'))
            const url = '/phonebook/update';
            postRequest(url, formdata, function (response) {
                if(response == 200) {
                    $('.editable.selected').removeAttr("contenteditable");
                    $('.editable.selected').removeAttr("style");
                    $('.editable.selected').removeClass('selected');
                    $('.editable.selected').removeClass('save');

                    $('.edit-row.save').find('span.bi-check').remove();
                    $('.edit-row.save').append('<span class="bi bi-pencil"></span>');
                    $('.edit-row.save').removeClass('save');
                }
            });
        }

        if($(e.target).hasClass('edit-row') || $(e.target).hasClass('bi-pencil')) {
            let self = $(e.target.parentElement);
            $('.editable.selected').removeAttr("contenteditable");
            $('.editable.selected').removeAttr("style");
            $('.editable.selected').removeClass('selected');
            $('.editable.selected').removeClass('save');
            const editable = self.closest('tr').find(".editable");
            editable.addClass('selected');
            editable.attr("contenteditable", "");
            editable.attr("style", "color: #f53");

            $('.edit-row.save').find('span.bi-check').remove();
            $('.edit-row.save').append('<span class="bi bi-pencil"></span>');
            $('.edit-row.save').removeClass('save');

            self.addClass('save');
            self.find('span').remove();
            self.append('<span class="bi bi-check"></span>');
        }

        if($(e.target).hasClass('delete-row') || $(e.target).hasClass('bi-trash')) {
            let self = $(e.target).closest('.delete-row');
            let formdata = new FormData();
            formdata.append("id", self.data('id'))
            const url = '/phonebook/destroy';
            postRequest(url, formdata, function (response) {
                if(response == 200) {
                    self.closest('tr').remove();
                }
            });
        }
    });

});