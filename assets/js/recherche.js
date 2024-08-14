$(document).ready(function(){
    $(document).on('change', '.cl_search', function(){
        if (parseInt($(this).val()) === 0) {
            $('.cl_content_filter_joueur').css('display', 'block');
            $('.cl_content_filter_staff').css('display', 'none');
        } 
        else if ((parseInt($(this).val()) === 1)) {
            $('.cl_content_filter_staff').css('display', 'block');
            $('.cl_content_filter_joueur').css('display', 'none');
        } else {
            $('.cl_content_filter_staff').css('display', 'none');
            $('.cl_content_filter_joueur').css('display', 'none');
        } 
    })
    $(document).on('change', '.cl_search', function() {    
        const allPlayer = $('.joueurs').find('.infoPlayer')
        allPlayer.each(function(index, value) {
            $(value).show()
            console.log($(value).attr('data-statut'))
            if (parseInt($('.cl_search').val()) === 0 && typeof $(value).attr('data-statut') !== 'undefined') $(value).hide()
            if (parseInt($('.cl_search').val()) === 1 && typeof $(value).attr('data-statut') === 'undefined') $(value).hide()
        });
    })

    function rechercheJoueur() {
        const sexe = $('.cl_recheche_joueur').val()
        const categorie = $('.cl_recheche_categorie').val()
        const allPlayer = $('.joueurs').find('.infoPlayer')
        allPlayer.each(function(index, value) {
            $(value).show()
            if (parseInt($('.cl_search').val()) === 0 && typeof $(value).attr('data-statut') !== 'undefined') $(value).hide()
        });
        if (parseInt($('.cl_search').val()) !== -1) {
            allPlayer.each(function(index, value) {
                if (parseInt($(value).attr('data-sexe')) !== parseInt(sexe) && parseInt(sexe) !== -1) $(value).hide()
                if (parseInt($(value).attr('data-age')) > 0) {
                    if (parseInt(categorie) === 2 && parseInt($(value).attr('data-age')) > 19) $(value).hide()
                    if (parseInt(categorie) === 1 && parseInt($(value).attr('data-age')) < 20) $(value).hide()
                    if (parseInt(categorie) === 3 && parseInt($(value).attr('data-categorie')) !== 7) $(value).hide()
                } 
            });
        }
    }

    function rechercheStaff() {
        const staff = $('.cl_recherche_staff').val()
        const allPlayer = $('.joueurs').find('.infoPlayer')
        allPlayer.each(function(index, value) {
            $(value).show()
            if (parseInt($('.cl_search').val()) === 1 && typeof $(value).attr('data-statut') === 'undefined') $(value).hide()
        });
        if (parseInt($('.cl_search').val()) !== -1) {
            allPlayer.each(function(index, value) {
                if (parseInt($(value).attr('data-statut')) !== parseInt(staff) && parseInt(staff) !== -1) $(value).hide()
            });
        }
    }

    $(document).on('change', '.cl_recheche_joueur, .cl_recheche_competition, .cl_recheche_categorie', function() {
        rechercheJoueur()
    })

    $(document).on('change', '.cl_recherche_staff', function() {
        rechercheStaff()
    })

    $(document).on('keyup', '.cl_search_name_playeur', function () {
        const nom = $(this).val()
        
        const allPlayer = $('.joueurs').find('.infoPlayer')
        if (parseInt($('.cl_search').val()) === 0) rechercheJoueur()
        if (parseInt($('.cl_search').val()) === 1) rechercheStaff()
        if (parseInt($('.cl_search').val()) === -1) {
            allPlayer.each(function(index, value) {
                $(value).show()
            });
        }
        
        allPlayer.each(function(index, value) {
            const joueur = $(value).attr('data-nom')
            if (!joueur.toString().toLowerCase().includes(nom)) $(value).hide()
        });
    })
})