/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

idlocataire = "";

/*$(function () {
 
 //alert('Bonjour');
 //rechercher();
 searchInfoLocataire(Tableaulocataire);
 });*/
$(document).ready(function () {

    //console.log("Redirection: "+redirect);

    //setMontantTotal();

    searchInfoLocataire(Tableaulocataire);

    var faIcon = {
        valid: 'fa fa-check-circle fa-lg text-success',
        invalid: 'fa fa-times-circle fa-lg',
        validating: 'fa fa-refresh'
    };

    //console.log($('#form-ajout-paiement').attr('action'));

    //Creation de 
    $('#form-location').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
            datedebut: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la date de debut de location'
                    }
                }
            },
            datefin: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la date de fin de location'
                    }
                }
            },
            montantavance: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le montant de l\'avance '
                    },
                    regexp: {
                        regexp: /^[0-9\,]+$/i,
                        message: 'Entrez uniquement des chifres svp'
                    }

                }
            },
            montantcaution: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le montant de l\'avance '
                    },
                    regexp: {
                        regexp: /^[0-9\,]+$/i,
                        message: 'Entrez uniquement des chifres svp'
                    }
                }
            },
            montantannexe: {
                validators: {
                    regexp: {
                        regexp: /^[0-9\,]+$/i,
                        message: 'Entrez uniquement des chifres svp'
                    }
                }
            }

        }
    }).on('success.form.bv', function (e) {
        $('#form-location').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        console.log($form.serializeArray());
        //Envoi du formulaire en Ajax
        updateLocation();
    });
});

function searchInfoLocataire() {

    //$('#locataireNom').change(function(){

    idlocataire = $('#locataireNom option:selected').val();

    console.log('le id du locataire est : ' + idlocataire);
    /*alert(idlocataire);
     alert(JSON.stringify(Tableaulocataire[0]));*/

    for (var i = 0; i < Tableaulocataire.length; i++) {

        console.log(JSON.stringify(Tableaulocataire[i]));

        if (idlocataire == Tableaulocataire[i]['idPersonne'] && idlocataire != 0) {

            var dateNaiss = Tableaulocataire[i]['dateNaiss'];
            var LieuNaiss = Tableaulocataire[i]['LieuNaiss_PersPhys'];

            /*alert('le lieu de naissance est :'+LieuNaiss);*/


            /*$('#LieuNaiss').prop('disabled',true);
             $('#dateNaiss').prop('disabled',true);*/

            $('#LieuNaiss').val(LieuNaiss);
            $('#dateNaiss').val(dateNaiss);

        } else if (idlocataire == 0) {

            $('#LieuNaiss').val("");
            $('#dateNaiss').val("%y-%m-%d");
        }
    }
    //});


}

function updateLocation() {


    $.ajax({

        url: url_Ajax,
        type: 'POST',
        dataType: 'text',
        data: {

            idlocataire: idlocataire,
            idbien: idBien,
            idProprioBien: idProprioBien,
            datedebut: $('#datedebut').val(),
            datefin: $('#datefin').val(),
            montantavance: $('#montantavance').val(),
            montantcaution: $('#montantcaution').val(),
            montantannexe: $('#montantannexe').val(),
            totalMontant: $('#totalMontant').val()
        },

        success: function (data, textStatus, jqXHR) {

            console.log(jqXHR);

            if (data == "Erreur") {

                $.niftyNoty({
                    type: 'danger',
                    container: 'floating',
                    title: 'DONNEES NON ENREGISTRÉES',
                    message: 'Une erreur interne est survenue <br>Certaines données n\'ont pas pu être enregistrées',
                    closeBtn: true,
                    timer: 0
                });
            } else {
                //message de succes
                console.log(data);
                $.niftyNoty({
                    type: 'success',
                    container: 'floating',
                    title: 'LOCATION MISE A JOUR',
                    message: 'Données enregistrées avec succès <br>Redirection vers la liste des locataires en cours',
                    closeBtn: true,
                    timer: 3000,
                    onHidden: function () {
                        //Rechargement de la page 
                        //var $url = "http://localhost/Locagest/index.php/AccueilAdmin/Gestlocations";
                        var $url = redirect;
                        window.location.href = $url;
                    }
                });
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);

            $.niftyNoty({
                type: 'danger',
                container: 'floating',
                title: 'DONNEES NON ENREGISTRÉES',
                message: 'Une erreur interne est survenue <br>Certaines données n\'ont pas pu être enregistrées',
                closeBtn: true,
                timer: 0
            });
        }
    });

}

function SupprimerLocation(idlocation) {


    $.confirm({
        title: 'Confirm!',
        content: 'Voulez vous supprimer cet element ?',
        buttons: {
            confirm: {
                btnClass: 'btn-red',
                text: '',
                action: function () {
                    $.ajax({

                        url: url_delete,

                        type: 'POST',
                        dataType: 'text',
                        data: {

                            idlocation: idlocation,
                        },

                        success: function (data, textStatus, jqXHR) {

                            console.log(jqXHR);

                            if (data == "Erreur") {

                                $.niftyNoty({
                                    type: 'danger',
                                    container: 'floating',
                                    title: 'DONNEES NON ENREGISTRÉES',
                                    message: 'Une erreur interne est survenue <br>Certaines données n\'ont pas pu être enregistrées',
                                    closeBtn: true,
                                    timer: 0
                                });
                            } else {
                                //message de succes
                                console.log(data);
                                $.niftyNoty({
                                    type: 'success',
                                    container: 'floating',
                                    title: 'SUPPRESSION REUSSIE',
                                    message: 'Données enregistrées avec succès <br>Redirection vers la liste des locataires en cours',
                                    closeBtn: true,
                                    timer: 3000,
                                    onHidden: function () {
                                        //Rechargement de la page 
                                        //var $url = "http://localhost/Locagest/index.php/AccueilAdmin/Gestlocations";
                                        var $url = redirect;
                                        window.location.href = $url;
                                    }
                                });
                            }

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(errorThrown);

                            $.niftyNoty({
                                type: 'danger',
                                container: 'floating',
                                title: 'DONNEES NON ENREGISTRÉES',
                                message: 'Une erreur interne est survenue <br>Certaines données n\'ont pas pu être enregistrées',
                                closeBtn: true,
                                timer: 0
                            });
                        }
                    });
                }
            },
            cancel: function () {
                $.alert('Canceled!');
            },
        }
    });


}

function setMontantTotal() {

    var montantAnnexe = $('#montantannexe').val().replace(/,/gi, "");
    var monatntCaution = $('#montantcaution').val().replace(/,/gi, "");
    var montantAvance = $('#montantavance').val().replace(/,/gi, "");
    
    var montantTotal=0;
    
    if(montantAnnexe!='' && monatntCaution!='' && montantAvance!=''){
        montantTotal = parseFloat(montantAvance) + parseFloat(monatntCaution) + parseFloat(montantAnnexe);
    }else{
        if(montantAnnexe!='' && monatntCaution!='' && montantAvance==''){
            montantTotal =parseFloat(monatntCaution) + parseFloat(montantAnnexe);
        }else{
            if(montantAnnexe!='' && monatntCaution=='' && montantAvance!=''){
                montantTotal = parseFloat(montantAvance) + parseFloat(montantAnnexe);
            }else{
                if(montantAnnexe=='' && monatntCaution!='' && montantAvance!=''){
                    montantTotal = parseFloat(montantAvance) + parseFloat(monatntCaution);
                }else{
                    if(montantAnnexe!='' && monatntCaution=='' && montantAvance==''){
                        montantTotal = parseFloat(montantAnnexe);
                    }
                    if(montantAnnexe=='' && monatntCaution!='' && montantAvance==''){
                        montantTotal =parseFloat(monatntCaution);
                    }
                    if(montantAnnexe=='' && monatntCaution=='' && montantAvance!=''){
                        montantTotal = parseFloat(montantAvance);
                    }
                }
            }
        }
    }
    //var montantTotal = parseInt(montantAvance) + parseInt(monatntCaution) + parseInt(montantAnnexe);
    $('#totalMontant').val(montantTotal);

}
