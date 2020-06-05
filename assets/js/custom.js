$(document).ready(function () {

    var elem = document.querySelectorAll('.js-switch');
    for (var i=0;i<elem.length;i++){
        var init = new Switchery(elem[i]);
    }

    $(".situation").change(function (e) {
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        $.post($data_url,{data:$data},function (response) {})
    });
})
