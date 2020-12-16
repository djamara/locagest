/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    $('#btnTrieBien').on('click', function (e) {
        e.preventDefault();
        $comboAnne = $('#anneeTrie').val();
        $comboBien = $('#bienTrie').val();
        $form = $('#form-bilan');
        //console.log($form.attr('action') + '/' + $comboAnne + '/' + $comboBien);
        $.ajax({
            url: $form.attr('action') + '/' + $comboAnne + '/' + $comboBien,
            type: 'POST',
            data: $form.serialize(),
            dataType: 'text',
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                $.getJSON(data, function (val) {
                    console.log(val);
                    /*$.each(val, function (key, value) {
                        console.log('Clé: '+key+' Valeur: '+value);
                    });*/
                });
            }
        });
    });
});

