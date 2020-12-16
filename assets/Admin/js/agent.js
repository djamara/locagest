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

    console.log($('#form-add-agent').attr('action'));

    //Creation du proprietaire
    $('#form-add-agent').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
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
            email: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner l\'adresse email'
                    },
                    emailAddress: {
                        message: 'Ceci n\'est pas un email valide'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-add-agent').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        //var formData = new FormData($form.get(0));
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
                } else {
                    //message de succes
                    console.log(data);
                    $.niftyNoty({
                        type: 'success',
                        container: 'floating',
                        title: 'AGENT CRÉÉ',
                        message: 'Données enregistrées avec succès <br>Redirection vers la liste des agents',
                        closeBtn: true,
                        timer: 3000,
                        onHidden: function(){
                            //Rechargement de la page 
                            //var $url = "http://localhost/Locagest/index.php/AccueilAdmin/GestProprietaire";
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

    //Modificataion du proprietaire
    $('#form-modif-proprietaire').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
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
        }
    }).on('success.form.bv', function (e) {
        $('#form-modif-proprietaire').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        //var formData = new FormData($form.get(0));
        console.log(window.location.href);

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
                        title: 'PROPRIÉTAIRE MODIFIÉ',
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

});