jQuery(document).ready(function ($) {
    // Використовуємо wp_localize_script для передачі ajaxurl
    var ajaxurl = my_ajax_object.ajaxurl;

    // Ваша функція, яка викликається при кліку на кнопку або іншій події
    function makeAjaxRequest() {
        // Ваші дані для передачі на сервер
        var data = {
            action: 'my_custom_action',
            // Інші дані, які ви хочете передати
        };

        // Виклик асинхронного AJAX-запиту
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            success: function (response) {
                // Обробка успішного відгуку від сервера
                console.log(response);
            },
            error: function (error) {
                // Обробка помилок
                console.log(error);
            },
        });
    }

    // Приклад виклику функції при кліку на кнопку з ідентифікатором 'my-button'
    $('#my-button').on('click', function () {
        makeAjaxRequest();
    });
});

