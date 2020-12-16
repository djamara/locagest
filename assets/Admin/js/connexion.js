/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    
    serveur = "localhost:90";
    var faIcon = {
        valid: 'fa fa-check-circle fa-lg text-success',
        invalid: 'fa fa-times-circle fa-lg',
        validating: 'fa fa-refresh'
    };
    
    //console.log(redirect);

    console.log($('#form-connexion').attr('action'));

    $('#form-connexion').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
            login: {
                validators: {
                    notEmpty: {
                        message: 'Le nom d\'utilisateur ne peut être vide'
                    },
                    stringLength: {
                        min: 5,
                        max: 30,
                        message: 'Le nom d\'utilisateur doit être compris entre 5 et 30 caratères'
                    }
                }
            },
            motdepasse: {
                validators: {
                    notEmpty: {
                        message: 'Le mot de passe ne peut être vide'
                    },
                    stringLength: {
                        min: 5,
                        message: 'Le mot de passe doit être d\'au minimum 5 caratères'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-connexion').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        //Envoi du formulaire en Ajax
        $.ajax({
            url: $form.attr('action'), //Page de traitement
            type: 'POST',
            data: $form.serialize(),
            dataType: 'text',
            success: function (data, textStatus, jqXHR) {
                console.log(jqXHR);

                if (data == "Utilisateur inexistant") {

                    $('#login').addClass('style-error');
                    $('#motdepasse').addClass('style-error');

                    $.niftyNoty({
                        type: 'danger',
                        container: 'floating',
                        title: 'CONNEXION ECHOUE',
                        message: 'Nom d\'utilisateur ou mot de passe incorrect <br>Veuillez corriger svp!',
                        closeBtn: true,
                        timer: 0
                    });
                } else if (data == "Vous n'êtes pas propriétaire") {
                    $.niftyNoty({
                        type: 'danger',
                        container: 'floating',
                        title: 'ACCÈS NON AUTORISÉ',
                        message: 'Vous n\'êtes pas autorisé à vous connecter <br>Veuiller contacter l\'administrateur',
                        closeBtn: true,
                        timer: 0
                    });
                } else {
                    //message de succes
                    $.niftyNoty({
                        type: 'success',
                        container: 'floating',
                        title: 'CONNEXION RÉUSSIE',
                        message: 'Vous serez redirrigé vers la page d\'accueil <br>dans quelques instants',
                        closeBtn: true,
                        timer: 3000,
                        onHidden: function () {
                            //Redirection vers la page d'accueil
                            //var $url = "/locagest/index.php/AccueilAdmin/accueil";
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
                    title: 'CONNEXION ECHOUE',
                    message: 'Nom d\'utilisateur ou mot de passe incorret <br>Veuillez corriger svp!',
                    closeBtn: true,
                    timer: 0
                });
            }
        });
    });
});
