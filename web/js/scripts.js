/*
 * Функция автоматического заполнения составных полей номера МКФ.
 */
$(function () {
    $(document).on('change', '#minnesotaForm', function (e) {
        e.preventDefault();
        var first = $("#minnesotaNumberForm").val();
        var form = $("#minnesotaForm").val();
        var second = "";
        if (form == "Рулонный микрофильм") {
            $("#minnesotaKey1").val(first.substr(0,3));
            $("#minnesotaKey2").val(first.substr(4,6));
            $("#minnesotaKey3").val(first.substr(11,3));
            $("#minnesotaKey4").val(second);
            $("#minnesotaKey5").val(first.substr(15,1));
        } else {
            $("#minnesotaKey1").val(first.substr(0,3));
            $("#minnesotaKey2").val(first.substr(4,6));
            $("#minnesotaKey3").val(first.substr(11,3));
            $("#minnesotaKey4").val(first.substr(15,3));
            $("#minnesotaKey5").val(first.substr(19,1));
        }
    });
});

/*
 * Функция автоматического заполнения признака документации.
 */
$(function () {
    $(document).on('change', '#minnesotaNumberForm', function (e) {
        e.preventDefault();
        var first = $("#minnesotaNumberForm").val();
        var form = $("#minnesotaForm").val();
        var second = "";
        if (form == "Рулонный микрофильм") {
            $("#minnesotaKey1").val(first.substr(0,3));
            $("#minnesotaKey2").val(first.substr(4,6));
            $("#minnesotaKey3").val(first.substr(11,3));
            $("#minnesotaKey4").val(second);
            $("#minnesotaKey5").val(first.substr(15,1));
        } else {
            $("#minnesotaKey1").val(first.substr(0,3));
            $("#minnesotaKey2").val(first.substr(4,6));
            $("#minnesotaKey3").val(first.substr(11,3));
            $("#minnesotaKey4").val(first.substr(15,3));
            $("#minnesotaKey5").val(first.substr(19,1));
        }
        var key5 = $("#minnesotaKey5").val();
        var pp1 = "Документация на изделие";
        var pp2 = "Документация на изделие";
        var pp3 = "Нормативно-техническая документация";
        var pp4 = "Нормативно-техническая документация";
        var pp5 = "Нормативно-техническая документация";
        var pp6 = "Нормативно-техническая документация";
        var pp7 = "Уникальная и особо ценная документация";
        var pp8 = "Аварийная документация";
        switch(key5) {
            case "1":
                $("#minnesotaDocumentationAttribute").val(pp1).trigger('change');
                break;
            case "2":
                $("#minnesotaDocumentationAttribute").val(pp2).trigger('change');
                break;
            case "3":
                $("#minnesotaDocumentationAttribute").val(pp3).trigger('change');
                break;
            case "4":
                $("#minnesotaDocumentationAttribute").val(pp4).trigger('change');
                break;
            case "5":
                $("#minnesotaDocumentationAttribute").val(pp5).trigger('change');
                break;
            case "6":
                $("#minnesotaDocumentationAttribute").val(pp6).trigger('change');
                break;
            case "7":
                $("#minnesotaDocumentationAttribute").val(pp7).trigger('change');
                break;
            case "8":
                $("#minnesotaDocumentationAttribute").val(pp8).trigger('change');
                break;
        }
    });
});

/*
 * Функция автоматического заполнения в номере МКФ номера экземпляра.
 */
$(function () {
    $(document).on('change', '#minnesotaNumberCopy', function (e) {
        e.preventDefault();
        var nform = $("#minnesotaNumberForm").val();
        var ncopy = $("#minnesotaNumberCopy").val();
        var form = $("#minnesotaForm").val();
        if (form == "Рулонный микрофильм") {
            var plus = nform.substr(0,16) + "-" + ncopy.substr(0,1);
        } else {
            var plus = nform.substr(0,20) + "-" + ncopy.substr(0,1);
        }
        $("#minnesotaNumberForm").val(plus);
    });
});

/*
 * Функция работы кнопки расширенного поиска.
 */
$(function () {
    $(document).on('click', '.search-button', function (e) {
        e.preventDefault();
        $('.search-form').toggle(1000);
        return false;
    });
});

/*
 * Функция работы по страничной навигации.
 */
$(function () {
    $(document).ready(function () {
        var window_page = $("#window_page").val();
        var rows = $('#rows_count');
        var rows_count = Math.ceil(rows[0]['defaultValue'] / 15);
        switch (window_page) {
            case 'sheet':
                $('.prev a').attr('href', '/sheet/index?page=1&per-page=15');
                $('.next a').attr('href', '/sheet/index?page='+rows_count+'&per-page=15');
                break;
            case 'bigger':
                $('.prev a').attr('href', '/sheet/bigger?page=1&per-page=15');
                $('.next a').attr('href', '/sheet/bigger?page='+rows_count+'&per-page=15');
                break;
            case 'inspector':
                $('.prev a').attr('href', '/inspector/index?page=1&per-page=15');
                $('.next a').attr('href', '/inspector/index?page='+rows_count+'&per-page=15');
                break;
            case 'agent':
                $('.prev a').attr('href', '/agent/index?page=1&per-page=15');
                $('.next a').attr('href', '/agent/index?page='+rows_count+'&per-page=15');
                break;
            case 'index':
                $('.prev a').attr('href', '/index/index?page=1&per-page=15');
                $('.next a').attr('href', '/index/index?page='+rows_count+'&per-page=15');
                break;
        }
    });
});

/*
 * Функция работы кнопки отображения списка, где используется индекс / предприятие.
 */
$(function () {
    $(document).on('click', '.list-button', function (e) {
        e.preventDefault();
        $('.list-form').toggle(1000);
        return false;
    });
});