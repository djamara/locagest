/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var montantTotal = 0;

/*$(function () {

    //alert('Bonjour la page de paiement '+montantduTerme);
    //rechercher();
    typePaiement();
    calculMontant();
    //compterEcheance();
});*/

$(document).ready(function () {
    $('.money').simpleMoneyFormat();
    typePaiement();
    calculMontant();
    
    var faIcon = {
        valid: 'fa fa-check-circle fa-lg text-success',
        invalid: 'fa fa-times-circle fa-lg',
        validating: 'fa fa-refresh'
    };

    //console.log($('#form-ajout-paiement').attr('action'));

    //Creation de 
    $('#form-paiement').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
            Nbreecheance: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le nombre de mois à régler'
                    },
                    greaterThan: {
                        value: 0,
                        message: 'l\'echeance doit être supérieure à 0'
                    }
                }
            },
            montants: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le montant à régler'
                    },
                    regexp: {
                        regexp: /^[0-9\,]+$/i,
                        message: 'Entrez uniquement des chifres svp'
                    }
                }
            },
            dateDebut: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la date de debut'
                    }
                }
            },
            dateFin: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la date de fin'
                    }
                    
                }
            },
            typepaiement: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la date de fin'
                    }
                    
                }
            }

        }
    }).on('success.form.bv', function (e) {
        $('#form-paiement').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        //var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        console.log($form.serializeArray());
        //Envoi du formulaire en Ajax
        ajouterPaiment();
    });
});

function typePaiement() {

    if ($('#typepaiement').val() == 2) {

        $('#NumCheque').prop('disabled', false);

    } else {

        $('#NumCheque').val("N° chèque");
        $('#NumCheque').prop('disabled', true);
    }
}

function calculMontant() {

    if ($('#nbreMois').val() > 0) {

        montantTotal = montantduTerme * $('#nbreMois').val();

        //alert('Vous devez payer '+montantTotal);

        $('#montant').val(montantTotal);
    } else {

        $('#montant').val('');
    }

}

function ajouterPaiment() {

    //console.log($('#form-paiement').attr('action'));
    
    $.ajax({

        url: $('#form-paiement').attr('action'),
        type: 'POST',
        dataType: 'text',
        data: $('#form-paiement').serialize(),

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
                //window.open("http://localhost/quittanceLoyer/", '_blank');
                window.open(urlQuittance, '_blank');
                $.niftyNoty({
                    type: 'success',
                    container: 'floating',
                    title: 'PAIEMENT MISE A JOUR',
                    message: 'Données enregistrées avec succès <br>Redirection vers la liste des locations en cours',
                    closeBtn: true,
                    timer: 3000,
                    onHidden: function () {
                        //Rechargement de la page 
                        //var $url = "http://localhost/Locagest/index.php/AccueilAdmin/listeLocation";
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
