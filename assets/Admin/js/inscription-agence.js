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
    
    //console.log(redirect);

    //Validation du formulaire avec Form-Validation
    $('#form-inscription-agence').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
            denom: {
                validators: {
                    notEmpty: {
                        message: 'La dénomination ne peut être vide'
                    }
                }
            },
            siege: {
                validators: {
                    notEmpty: {
                        message: 'Le siège ne peut être vide'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'L\'adresse email ne peut être vide'
                    },
                    emailAddress: {
                        message: 'Ceci n\'est pas un email valide'
                    }
                }
            },
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
                    },
                    identical: {
                        field: 'motdepasse_confirm',
                        message: 'Les deux mots de passe ne correspondent pas'
                    }
                }
            },
            motdepasse_confirm: {
                validators: {
                    notEmpty: {
                        message: 'La confirmation de mot de passe ne peut être vide'
                    },
                    stringLength: {
                        min: 5,
                        message: 'Le mot de passe doit être d\'au minimum 5 caratères'
                    },
                    identical: {
                        field: 'motdepasse',
                        message: 'Les deux mots de passe ne correspondent pas'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-inscription-agence').data('bootstrapValidator').resetForm();

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

                if (data == 'Success') {
                    //message de succes
                    $.niftyNoty({
                        type: 'success',
                        container: 'floating',
                        title: 'COMPTE CRÉÉ AVEC SUCCÈS',
                        message: 'Vous serez redirrigé vers la page de connexion <br>dans quelques instants',
                        closeBtn: true,
                        timer: 5000,
                        onHidden: function () {
                            //Redirection vers la page de connexion 
                            //var $url = "http://localhost/Locagest/index.php/login/login";
                            var $url = redirect;
                            window.location.href = $url;
                        }
                    });
                } else {
                    $.niftyNoty({
                        type: 'danger',
                        container: 'floating',
                        title: 'ECHEC DE CREATION DU COMPTE',
                        message: 'Une erreur est survenue, veuillez reéssayer plus tard !',
                        closeBtn: true,
                        timer: 0
                    });
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);

                $.niftyNoty({
                    type: 'danger',
                    container: 'floating',
                    title: 'ECHEC DE CREATION DU COMPTE',
                    message: 'Une erreur est survenue, veuillez reéssayer plus tard !',
                    closeBtn: true,
                    timer: 0
                });
            }
        });
    });

});
