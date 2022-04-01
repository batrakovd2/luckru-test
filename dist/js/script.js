$(document).ready(function () {

    function getAnyPageParameters(formselector) {
        const form = document.querySelector(formselector);
        formdata = new FormData(form);
        return formdata;
    }

    function axiosPostRequest(api, params, responseFunc) {
        $.ajax({
            type: "POST",
            url: api,
            processData: false,
            contentType: false,
            data: params,
            success: responseFunc
        });

    }

    $('.addContactBtn').click(function () {
        const params = getAnyPageParameters('#addContact');
        const url = '/phonebook/create';
        axiosPostRequest(url, params, function (response) {
            console.log(response);
        });
    });


});