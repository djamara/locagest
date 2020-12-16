/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    //console.log("Delete url: "+urlDeleteBien);

    var faIcon = {
        valid: 'fa fa-check-circle fa-lg text-success',
        invalid: 'fa fa-times-circle fa-lg',
        validating: 'fa fa-refresh'
    };

    $('#propriettaireNom').on('change', function () {
        searchInfoProprietaire();
    });
    $('#propriettaireNomModif').on('change', function () {
        searchInfoProprietaireModif();
    });
    /*$('#idImmeuble').on('change', function () {
     console.log($('#idImmeuble').val());
     });*/

    //searchInfoProprietaire();

    console.log($('#form-bien').attr('action'));

    //console.log($('#box-choix-proprietaire'));

    $boxProprietaire = $('#box-choix-proprietaire').hide();

    var btnSelectionProprietaire = $('#selection-proprietaire');
    btnSelectionProprietaire.attr('disabled', 'true');

    $tableRechProprietaire = $('#table-liste-proprietaire-bien');

    $tableRechProprietaire.click(function () {
        $('#table-liste-proprietaire-bien tr.selected').each(function () {
            btnSelectionProprietaire.removeAttr('disabled');
            var idpropriétaire = $(this).find('td:first').html();
            console.log('ID ' + idpropriétaire + ' ' + btnSelectionProprietaire.prop('disabled'));
        });
    });

    //Creation du bien
    $('#form-bien').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
            propriettaireNom: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez sélectionner le propriétaire du bien'
                    }
                }
            },
            libelleBien: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le libéllé du bien'
                    }
                }
            },
            localisationBien: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la localisation du bien'
                    }
                }
            },
            superficieBien: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le numéro de la pièce'
                    },
                    numeric: {
                        message: 'Veuillez entrer une valeur numérique'
                    }
                }
            },
            dateCreationBien: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la date de construction'
                    }
                }
            },
            loyerHC: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le montant hors taxe du loyer'
                    },
                    regexp: {
                        regexp: /^[0-9\,]+$/i,
                        message: 'Entrez uniquement des chifres svp'
                    }
                }
            },
            charge: {
                validators: {
                    regexp: {
                        regexp: /^[0-9\,]+$/i,
                        message: 'Entrez uniquement des chifres svp'
                    }
                }
            }

        }
    }).on('success.form.bv', function (e) {
        $('#form-bien').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

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
                            //var $url = "http://localhost/Locagest/index.php/login/login";
                            var $url = redirectLogin;
                            window.location.href = $url;
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
                            //var $url = "http://localhost/Locagest/index.php/AccueilAdmin/GestBiens";
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

    //Modificataion du bien
    $('#form-modif-bien').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
            libelleBien: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le libéllé du bien'
                    }
                }
            },
            localisationBien: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la localisation du bien'
                    }
                }
            },
            superficieBien: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le numéro de la pièce'
                    },
                    numeric: {
                        message: 'Veuillez entrer une valeur numérique'
                    }
                }
            },
            dateCreationBien: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la date de construction'
                    }
                }
            },
            loyerHC: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le montant hors taxe du loyer'
                    },
                    regexp: {
                        regexp: /^[0-9\,]+$/i,
                        message: 'Entrez uniquement des chifres svp'
                    }
                }
            },
            charge: {
                validators: {
                    regexp: {
                        regexp: /^[0-9\,]+$/i,
                        message: 'Entrez uniquement des chifres svp'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-modif-bien').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //alert();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        //var formData = new FormData($form.get(0));
        //console.log($form.serialize());

        //Extraction de l'ID du locataire via l'URL
        var urlPage = window.location.href;
        var array = urlPage.split('/');
        var $idBien = array[array.length - 1];

        //console.log($idLocataire);

        //Envoi du formulaire en Ajax
        $.ajax({
            url: $form.attr('action') + '/' + $idBien, //Page de traitement
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
                        title: 'BIEN MODIFIÉ',
                        message: 'Données enregistrées avec succès',
                        closeBtn: true,
                        timer: 3000
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
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

function Supprimerbien(idbien) {

    $.confirm({
        title: 'Confirmation !',
        content: 'Voulez voulez eefectué la suppression ?',
        draggable: true,
        buttons: {
            confirm: {
                btnClass: 'btn-green',
                action: function () {
                        //url: "http://localhost/locagest/index.php/AccueilAdmin/deleteBien", //Page de traitement
                    $.ajax({
                        url: urlDeleteBien, //Page de traitement
                        type: 'POST',
                        data: {idbien: idbien},
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
                                    title: 'BIEN MODIFIÉ',
                                    message: 'Données enregistrées avec succès',
                                    closeBtn: true,
                                    timer: 3000,
                                    onHidden: function () {
                                        //Rechargement de la page 
                                        //var $url = "http://localhost/Locagest/index.php/AccueilAdmin/GestBiens";
                                        var $url = redirect;
                                        window.location.href = $url;
                                    }
                                });
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);
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
			Cancel:{
            	btnClass: 'btn-red',
				action: function (){

				}
			}
        }
    });

}


function searchInfoProprietaire() {

    //$('#locataireNom').change(function(){

    idProprietaire = $('#propriettaireNom option:selected').val();

    console.log('le id du proprietaire est : ' + idProprietaire);
    /*alert(idlocataire);
     alert(JSON.stringify(Tableaulocataire[0]));*/

    for (var i = 0; i < tableauProprietaire.length; i++) {

        //console.log(JSON.stringify(tableauProprietaire[i]));

        if (idProprietaire == tableauProprietaire[i]['idPersonne'] && idProprietaire != 0) {

            var dateNaiss = tableauProprietaire[i]['dateNaiss'];
            var LieuNaiss = tableauProprietaire[i]['LieuNaiss_PersPhys'];

            /*alert('le lieu de naissance est :'+LieuNaiss);*/


            /*$('#LieuNaiss').prop('disabled',true);
             $('#dateNaiss').prop('disabled',true);*/

            $('#lieuNaisProprio').val(LieuNaiss);
            $('#dateNaissProprio').val(dateNaiss);

        } else if (idProprietaire == 0) {

            $('#lieuNaisProprio').val("");
            $('#dateNaissProprio').val("%y-%m-%d");
        }
    }
    //});
} 

function searchInfoProprietaireModif() {

    //$('#locataireNom').change(function(){

    idProprietaire = $('#propriettaireNomModif option:selected').val();

    console.log('le id du proprietaire est : ' + idProprietaire);
    /*alert(idlocataire);
     alert(JSON.stringify(Tableaulocataire[0]));*/

    for (var i = 0; i < tableauProprietaire.length; i++) {

        //console.log(JSON.stringify(tableauProprietaire[i]));

        if (idProprietaire == tableauProprietaire[i]['idPersonne'] && idProprietaire != 0) {

            var dateNaiss = tableauProprietaire[i]['dateNaiss'];
            var LieuNaiss = tableauProprietaire[i]['LieuNaiss_PersPhys'];

            /*alert('le lieu de naissance est :'+LieuNaiss);*/


            /*$('#LieuNaiss').prop('disabled',true);
             $('#dateNaiss').prop('disabled',true);*/

            $('#lieuNaisProprioModif').val(LieuNaiss);
            $('#dateNaissProprioModif').val(dateNaiss);

        } else if (idProprietaire == 0) {

            $('#lieuNaisProprioModif').val("");
            $('#dateNaissProprioModif').val("%y-%m-%d");
        }
    }

}
