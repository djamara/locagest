/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// Row selection (single row)
// -----------------------------------------------------------------
var rowSelection = $('#demo-dt-selection').DataTable({
    "responsive": true,
    "language": {
        "paginate": {
            "previous": '<i class="demo-psi-arrow-left"></i>',
            "next": '<i class="demo-psi-arrow-right"></i>'
        }
    }
});

$('#demo-dt-selection').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        //$(this).removeClass('selected');
    } else {
        rowSelection.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

//Tableau liste des biens
var rowSelectionListeBienProprietaite = $('#table-liste-proprietaire-bien').DataTable({
    "responsive": true,
    "language": {
        "paginate": {
            "previous": '<i class="demo-psi-arrow-left"></i>',
            "next": '<i class="demo-psi-arrow-right"></i>'
        }
    }
});

$('#table-liste-proprietaire-bien').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        //$(this).removeClass('selected');
    } else {
        rowSelectionListeBienProprietaite.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

var rowSelectionListeBien = $('#table-liste-bien').DataTable({
    "responsive": true,
    "language": {
        "paginate": {
            "previous": '<i class="demo-psi-arrow-left"></i>',
            "next": '<i class="demo-psi-arrow-right"></i>'
        }
    }
});

$('#table-liste-bien').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        //$(this).removeClass('selected');
    } else {
        rowSelectionListeBien.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

/***
 * TaBleau liste des proprietaires
 ***/
var rowSelectionListeAgent = $('#table-liste-agent').DataTable({
    "responsive": true,
    "language": {
        "paginate": {
            "previous": '<i class="demo-psi-arrow-left"></i>',
            "next": '<i class="demo-psi-arrow-right"></i>'
        }
    }
});

$('#table-liste-agent').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        //$(this).removeClass('selected');
    } else {
        rowSelectionListeAgent.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

/***
 * TaBleau liste des agents
 ***/
var rowSelectionListeProprietaire = $('#table-liste-proprietaire').DataTable({
    "responsive": true,
    "language": {
        "paginate": {
            "previous": '<i class="demo-psi-arrow-left"></i>',
            "next": '<i class="demo-psi-arrow-right"></i>'
        }
    }
});

$('#table-liste-proprietaire').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        //$(this).removeClass('selected');
    } else {
        rowSelectionListeProprietaire.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

/***
 * TaBleau liste des locataires
 ***/
var rowSelectionListeLocataire = $('#table-liste-locataire').DataTable({
    "responsive": true,
    "language": {
        "paginate": {
            "previous": '<i class="demo-psi-arrow-left"></i>',
            "next": '<i class="demo-psi-arrow-right"></i>'
        }
    }
});

$('#table-liste-locataire').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        //$(this).removeClass('selected');
    } else {
        rowSelectionListeLocataire.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

/***
 * TaBleau liste des locations
 ***/
var rowSelectionListeLocation = $('#table-liste-location').DataTable({
    "responsive": true,
    "language": {
        "paginate": {
            "previous": '<i class="demo-psi-arrow-left"></i>',
            "next": '<i class="demo-psi-arrow-right"></i>'
        }
    }
});

$('#table-liste-location').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        //$(this).removeClass('selected');
    } else {
        rowSelectionListeLocation.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

/***
 * TaBleau liste des bien bilan
 ***/
//console.log($('#table-bilan-liste-bien'));
var rowBienBilan = $('#table-bilan-liste-bien').DataTable({
    "responsive": true,
    "language": {
        "paginate": {
            "previous": '<i class="demo-psi-arrow-left"></i>',
            "next": '<i class="demo-psi-arrow-right"></i>'
        }
    },
    "fixedColumns": 10,
});

$('#table-bilan-liste-bien').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        //$(this).removeClass('selected');
    } else {
        rowBienBilan.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

/***
 * TaBleau liste des groupes de biens
 ***/
var rowGroupeBien = $('#table-liste-groupe-bien').DataTable({
    "responsive": true,
    "language": {
        "paginate": {
            "previous": '<i class="demo-psi-arrow-left"></i>',
            "next": '<i class="demo-psi-arrow-right"></i>'
        }
    },
    "fixedColumns": 10,
});

$('#table-liste-groupe-bien').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        //$(this).removeClass('selected');
    } else {
        rowGroupeBien.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});