function show(id){
    $('.admin').css('display', 'none');
    $('#'+id).show();
}
$(document).on("keypress", "input", function(e){
    if(e.which == 13){
        e.preventDefault();
    // to do : affichage de la recherche utilisateur
    }
});