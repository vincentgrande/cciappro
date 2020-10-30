function select(id) {
    var x = document.getElementById(id).value;
    if(id=="marque"){
        document.getElementById('type').value="";
        document.getElementById("recherche").innerHTML="";
        document.getElementById("searchbar").value="";
    }else{
        document.getElementById('marque').value="";
        document.getElementById("searchbar").value="";
    }
    if(x==""){
        $('#recherche').css('display','none');
        $('.articles').show();

    }else{
    $('.articles').css('display','none');
    jQuery(function($) {
    var a=0;
    var text = $("."+x).map(function() {
        a++;
        console.log(a);
        if(a==3){
            a=0;
            return this.outerHTML+"</div><div class='div-third'>"
        }
        return this.outerHTML 
        
    }).get().join('');
    while(a<3){
        text=text+"<div class='div-pourcent div-produit'> <h3 class='center-bis'></h3><img class='center-bis' src='./img/blanc.jpg' width='100px' height='100px'></div>";
        a++;
    }
    text =  "<div class='div-third'>" + text;
    text = text + "</div>";
   console.log(text);   
    $("#recherche").show();       
    document.getElementById("recherche").innerHTML=text;
    })}
}
$(document).on("keypress", "input", function(e){
    if(e.which == 13){
        e.preventDefault();
        select('searchbar');
    }
});