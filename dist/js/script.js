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
            data: params.serialize(),
            success: function (response) {
                console.log(response)
            }
        });


        // $.post(api, params).done(function (response) {
        //     responseFunc(response);
        // });
        // fetch(api, {
        //     method: 'POST',
        //     body: params
        // }).then(function (response) {
        //     console.log(response);
        //     if(!response.ok) {
        //         console.log('no ok');
        //     }
        //     return response.json();
        // }).then(function (resp) {
        //     console.log(resp);
        //     // const json = response.json()
        //     // responseFunc(json);
        // });

    }

    $('.addContactBtn').click(function () {
        const params = getAnyPageParameters('#addContact');
        const url = '/phonebook/create';
        axiosPostRequest(url, params, function (response) {
            console.log(response);
        });
    });


});