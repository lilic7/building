$(document).ready(function () {

    $('select').on('change', function(){

        var value   = $(this).val();
        var id      = $(this).attr('id');

        $('select').each(function () {
            $(this).val(-1);
        });

        $("#"+id).val(value);

    });

});
