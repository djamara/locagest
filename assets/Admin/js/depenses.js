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
    //console.log("Redirection: "+redirect);
    var idbien = $('#idbien option:selected').attr('id');
    setAdresse(idbien);
    typePaiement();
    calculMontant();

    var faIcon = {
        valid: 'fa fa-check-circle fa-lg text-success',
        invalid: 'fa fa-times-circle fa-lg',
        validating: 'fa fa-refresh'
    };

    //console.log($('#form-ajout-paiement').attr('action'));

    //Creation de 
    $('#form-depense').bootstrapValidator({
        message: 'Cette valeur n\'est pas valide',
        feedbackIcons: faIcon,
        fields: {
            nombien: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le nombre de mois à régler'
                    }
                }
            },
            adressebien: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la situation du bien'
                    }
                }
            },
            typereparation: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez préciser le type de bien'
                    }
                }
            },
            nomTechnicien: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le nom du technicien'
                    }

                }
            },
            contactTech: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le contact du technicien'
                    }

                }
            }
            ,
            adresseTech: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner l\'adresse du technicien'
                    }

                }
            },
            dateRealisation: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner la date des travaux'
                    }

                }
            },
            montantrealisation: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner le montant de la facture'
                    },
                    regexp: {
                        regexp: /^[0-9\,]+$/i,
                        message: 'Entrez uniquement des chifres svp'
                    }

                }
            }

        }
    }).on('success.form.bv', function (e) {
        $('#form-depense').data('bootstrapValidator').resetForm();

        //Empecher la soumission par defaut du formulaire
        e.preventDefault();

        //Obtention d'une instance du formulaire
        var $form = $(e.target);

        //Obtention d'une instance du validateur
        //var bf = $form.data('bootstrapValidator');

        console.log($form.attr('action'));

        console.log($form.get(0));
        //Envoi du formulaire en Ajax
        //ajouterPaiment();
        console.log($form.serializeArray());
        
        ajouterDepense();
    });
});

function setAdresse(idbien) {
    console.log("set adresse: "+urlAdresse)
        //url: 'http://localhost/locagest/index.php/AccueilAdmin/getBienByID',
    $.ajax({

        url: urlAdresse,
        type: 'POST',
        dataType: 'json',
        data: {
            idBien: idbien
        },
        success: function (data, textStatus, jqXHR) {
            //console.log("bonjour");
            //data = JSON.stringify(data);
            //alert(data['bienLocalisation']);
            $('#adressebien').val(data['bienLocalisation']);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            //alert("bonsoir");
        }
    })
}



function ajouterDepense() {

    //console.log($('#form-paiement').attr('action'));

    $.ajax({

        url: $('#form-depense').attr('action'),
        type: 'POST',
        dataType: 'text',
        data: $('#form-depense').serialize(),

        success: function (data, textStatus, jqXHR) {

            console.log(data);

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
                    message: 'Données enregistrées avec succès <br>Redirection vers la liste des dépenses en cours',
                    closeBtn: true,
                    timer: 3000,
                    onHidden: function () {
                        //Rechargement de la page 
                        //var $url = "http://localhost/Locagest/index.php/AccueilAdmin/listDepenses";
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