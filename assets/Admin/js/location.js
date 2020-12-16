/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    
    var faIcon = {
        valid: 'fa fa-check-circle fa-lg text-success',
        invalid: 'fa fa-times-circle fa-lg',
        validating: 'fa fa-refresh'
    };

    //console.log($('#form-ajout-paiement').attr('action'));

    //Creation de 
    $('#form-ajout-paiement').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
            montant: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le montant du paiement'
                    },
                    numeric: {
                        message: 'Veuillez entrer une valeur numérique'
                    },
                    stringLength: {
                        min: 4,
                        message: 'Le montant doit être 4 caratères minimum'
                    }
                }
            },
            moyenPaiement: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le moyen de paiement'
                    }
                }
            },
            datePaiement: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la date du paiement'
                    }

                }
            }

        }
    }).on('success.form.bv', function (e) {
        $('#form-ajout-paiement').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        console.log($form.get(0));
        //Envoi du formulaire en Ajax
        $.ajax({
            url: $form.attr('action'), //Page de traitement
            type: 'POST',
            data: $form.serialize(),
            dataType: 'text',
            //contentType: false,
            //processData: false,
            //cache: false,
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
                } else if (data == "Session expirée") {
                    $.niftyNoty({
                        type: 'danger',
                        container: 'floating',
                        title: 'SESSION EXPIRÉ',
                        message: 'Vous êtes resté inactif trop longtemps <br>Veuillez vous reconnecter <br>Vous serez redirrigé vers la page de connexion dans quelques instans',
                        closeBtn: true,
                        timer: 3000,
                        onHidden: function () {
                            //Redirection vers la page de connexion 
                            var $url = "http://localhost/Locagest/index.php/login/login";
                            //window.location.href = $url;
                        }
                    });
                } else {
                    //message de succes
                    console.log(data);
                    $.niftyNoty({
                        type: 'success',
                        container: 'floating',
                        title: 'MODIFICATIONS ENREGISTRÉES',
                        message: 'Données enregistrées avec succès',
                        closeBtn: true,
                        timer: 3000,
                        onHidden: function () {
                            //Rechargement de la page 
                            var $url = "http://localhost/Locagest/index.php/AccueilAdmin/listeLocation";
                            //window.location.href = $url;
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
    });
});
