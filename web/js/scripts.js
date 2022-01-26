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
                $("#minnesotaDocumentationAttribute").val(pp1);
                break;
            case "2":
                $("#minnesotaDocumentationAttribute").val(pp2);
                break;
            case "3":
                $("#minnesotaDocumentationAttribute").val(pp3);
                break;
            case "4":
                $("#minnesotaDocumentationAttribute").val(pp4);
                break;
            case "5":
                $("#minnesotaDocumentationAttribute").val(pp5);
                break;
            case "6":
                $("#minnesotaDocumentationAttribute").val(pp6);
                break;
            case "7":
                $("#minnesotaDocumentationAttribute").val(pp7);
                break;
            case "8":
                $("#minnesotaDocumentationAttribute").val(pp8);
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