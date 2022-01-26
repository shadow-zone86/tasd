/*
 * Функция работы модального окна
 */
$(function () {
    $(document).on('click', '.showModalButton', function (e) {
        e.preventDefault();
        var container = $('#modalContent');
        var header = $('#modalHeader');
        container.html('Пожалуйста, подождите. Идет загрузка...');
        $('#modal').find(header).text($(this).attr('title'));
        $('#modal').modal('show').find(container).load($(this).attr('value'));
        $("#modal").on('hidden.bs.modal', function () {
            $('#modalContent').html('');
        });
    });
});