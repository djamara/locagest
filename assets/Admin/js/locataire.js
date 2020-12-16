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

    console.log($('#form-locataire').attr('action'));

    $typePersonne = $('#type-personne');
    $formMorale = $('#form-morale');
    $formPhysique = $('#form-physique');

    //console.log($typePersonne.val());
    $formMorale.hide();

    $typePersonne.on('change', function () {
        //alert("Cliqué");
        if ($typePersonne.val() == "0") {
            $formMorale.hide();
            $formPhysique.show(500);
        } else {
            $formPhysique.hide();
            $formMorale.show(500);
        }
    });

    var champsPhysique = {
        nom: {
            validators: {
                notEmpty: {
                    message: 'Veuillez renseigner le nom de famille'
                }
            }
        },
        prenom: {
            validators: {
                notEmpty: {
                    message: 'Veuillez renseigner le/les prénom(s)'
                }
            }
        },
        adresse1: {
            validators: {
                notEmpty: {
                    message: 'Veuillez renseigner l\'adresse'
                }
            }
        },
        email: {
            validators: {
                notEmpty: {
                    message: 'Veuillez renseigner l\'adresse email'
                },
                emailAddress: {
                    message: 'Ceci n\'est pas un email valide'
                }
            }
        },
        cel: {
            validators: {
                notEmpty: {
                    message: 'Veuillez renseigner le numéro mobile'
                }
            }
        }
    };
    var champsMorale = {
        denomination: {
            validators: {
                notEmpty: {
                    message: 'Veuillez renseigner la dénomination'
                }
            }
        },
        numRc: {
            validators: {
                notEmpty: {
                    message: 'Veuillez renseigner le numero RCCM'
                }
            }
        },
        adresse1: {
            validators: {
                notEmpty: {
                    message: 'Veuillez renseigner l\'adresse'
                }
            }
        },
        email: {
            validators: {
                notEmpty: {
                    message: 'Veuillez renseigner l\'adresse email'
                },
                emailAddress: {
                    message: 'Ceci n\'est pas un email valide'
                }
            }
        },
        cel: {
            validators: {
                notEmpty: {
                    message: 'Veuillez renseigner le numéro mobile'
                }
            }
        }
    };

    //Creation du locataire
    $('#form-locataire').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: ($typePersonne.val() == "0") ? champsPhysique : champsMorale
    }).on('success.form.bv', function (e) {

        $('#form-locataire').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        //var formData = new FormData($form.get(0));
        console.log($form.serializeArray());
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
                } else {
                    //message de succes
                    console.log(data);
                    $.niftyNoty({
                        type: 'success',
                        container: 'floating',
                        title: 'LOCATAIRE CRÉÉ',
                        message: 'Données enregistrées avec succès <br>Redirection vers la liste des locataires en cours',
                        closeBtn: true,
                        timer: 3000,
                        onHidden: function () {
                            //Rechargement de la page 
                            //var $url = "http://localhost/Locagest/index.php/AccueilAdmin/GestLocataire";
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
    });

    //Modificataion du locataire
    $('#form-modif-locataire').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: ($typePersonne.val() == "0") ? champsPhysique : champsMorale
    }).on('success.form.bv', function (e) {
        $('#form-modif-locataire').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        //var formData = new FormData($form.get(0));
        console.log(window.location.href);
        console.log($form.serializeArray());

        //Extraction de l'ID du locataire via l'URL
        var urlPage = window.location.href;
        var array = urlPage.split('/');
        var $idLocataire = array[array.length - 1];

        //console.log($idLocataire);

        //Envoi du formulaire en Ajax
        $.ajax({
            url: $form.attr('action') + '/' + $idLocataire, //Page de traitement
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
                } else {
                    //message de succes
                    console.log(data);
                    $.niftyNoty({
                        type: 'success',
                        container: 'floating',
                        title: 'LOCATAIRE MODIFIÉ',
                        message: 'Données enregistrées avec succès',
                        closeBtn: true,
                        timer: 3000
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



    //Suppression du locataire
    //Recuperation des lien de suppression
    //console.log($('td a[id]'));

    /* var $listeBtnSup = $('td a[id]');
     //console.log($listeBtnSup.length);
     
     for (var i = 0; i < $listeBtnSup.length; i++) {
     
     var $id = $($listeBtnSup[i]).attr('id');
     
     $('#' + $id).click(function () {
     alert($id);
     });
     
     }*/


    $('.btn-sup-locataire').on('click', function () {
        //alert($('.btn-sup-locataire').attr('id'));
    });

});

function deleteLocataire(idlocataire) {

    $.confirm({
        title: 'Confirm!',
        content: 'Voulez vous supprimer la selection ?',
        buttons: {
            confirm: {
                btnClass: 'btn-red',
                action: function () {
                    $.alert('Nous supprimons le locataore N° '+idlocataire);
                }
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
}