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

    $('#groupePropriettaireNom').on('change', function () {
        searchInfoProprietaireGroupe();
    });
    $('#groupePropriettaireNomModif').on('change', function () {
        searchInfoProprietaireGroupeModif();
    });

    $('.dual_select').bootstrapDualListbox({
        selectorMinimalHeight: 250,
        infoText: 'Total visible {0}',
        infoTextFiltered: '<span class="badge badge-warning">Trié</span> {0} sur {1}',
        filterPlaceHolder: 'Rechercher un élément',
        infoTextEmpty: 'Aucun bien enregistré'
    });
    

    //searchInfoProprietaire();

    console.log($('#form-groupe-bien').attr('action'));

    //Creation du groupement
    $('#form-groupe-bien').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
            groupePropriettaireNom: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez sélectionner le propriétaire'
                    }
                }
            },
            libelle: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le libéllé'
                    }
                }
            },
            localisation: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la localisation'
                    }
                }
            },
            superficie: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la superficie'
                    },
                    numeric: {
                        message: 'Veuillez entrer une valeur numérique'
                    }
                }
            }

        }
    }).on('success.form.bv', function (e) {
        $('#form-groupe-bien').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        console.log($form.serialize);

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
                            //var $url = "http://localhost/Locagest/index.php/AccueilAdmin/GestGroupeBiens";
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

    //Modificataion du groupement
    $('#form-modif-groupe-bien').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
            groupePropriettaireNomModif: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez sélectionner le propriétaire'
                    }
                }
            },
            libelle: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le libéllé'
                    }
                }
            },
            localisation: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la localisation'
                    }
                }
            },
            superficie: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la superficie'
                    },
                    numeric: {
                        message: 'Veuillez entrer une valeur numérique'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-modif-groupe-bien').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //alert();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        //var formData = new FormData($form.get(0));
        console.log($form.serialize());

        //Extraction de l'ID du groupement via l'URL
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
                        title: 'GROUPEMENT MODIFIÉ',
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

function searchInfoProprietaireGroupe() {

    //$('#locataireNom').change(function(){

    idProprietaire = $('#groupePropriettaireNom option:selected').val();

    console.log('le id du proprietaire est : ' + idProprietaire);
    /*alert(idlocataire);
     alert(JSON.stringify(Tableaulocataire[0]));*/

    for (var i = 0; i < groupeTableauProprietaire.length; i++) {

        //console.log(JSON.stringify(tableauProprietaire[i]));

        if (idProprietaire == groupeTableauProprietaire[i]['idPersonne'] && idProprietaire != 0) {

            var dateNaiss = groupeTableauProprietaire[i]['dateNaiss'];
            var LieuNaiss = groupeTableauProprietaire[i]['LieuNaiss_PersPhys'];

            /*alert('le lieu de naissance est :'+LieuNaiss);*/


            /*$('#LieuNaiss').prop('disabled',true);
             $('#dateNaiss').prop('disabled',true);*/

            $('#groupeLieuNaisProprio').val(LieuNaiss);
            $('#groupeDateNaissProprio').val(dateNaiss);

        } else if (idProprietaire == 0) {

            $('#groupeLieuNaisProprio').val("");
            $('#groupeDateNaissProprio').attr("fieldset", "jj/MM/aaaa");
        }
    }
    //});
}

function searchInfoProprietaireGroupeModif() {

    //$('#locataireNom').change(function(){

    idProprietaire = $('#groupePropriettaireNomModif option:selected').val();

    console.log('le id du proprietaire est : ' + idProprietaire);
    /*alert(idlocataire);
     alert(JSON.stringify(Tableaulocataire[0]));*/

    for (var i = 0; i < groupeTableauProprietaireModif.length; i++) {

        //console.log(JSON.stringify(tableauProprietaire[i]));

        if (idProprietaire == groupeTableauProprietaireModif[i]['idPersonne'] && idProprietaire != 0) {

            var dateNaiss = groupeTableauProprietaireModif[i]['dateNaiss'];
            var LieuNaiss = groupeTableauProprietaireModif[i]['LieuNaiss_PersPhys'];

            /*alert('le lieu de naissance est :'+LieuNaiss);*/


            /*$('#LieuNaiss').prop('disabled',true);
             $('#dateNaiss').prop('disabled',true);*/

            $('#groupeLieuNaisProprioModif').val(LieuNaiss);
            $('#groupeDateNaisProprioModif').val(dateNaiss);

        } else if (idProprietaire == 0) {

            $('#groupeLieuNaisProprioModif').val("");
            $('#groupeDateNaisProprioModif').val("%y-%m-%d");
        }
    }

}

