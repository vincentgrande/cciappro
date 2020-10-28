function select(id) {
    var x = document.getElementById(id).value;
    if(id=="marque"){
        document.getElementById('type').value="";
        document.getElementById("recherche").innerHTML="";
    }else{
        document.getElementById('marque').value="";
        document.getElementById("recherche").innerHTML="";
    }
    if(x==""){
        $('#recherche').css('display','none');
        $('#articles').show();

    }else{
    $('#articles').css('display','none');
    jQuery(function($) {
    var a=0;
    var text = $("."+x).map(function() {
        a++;
        console.log(a);
        if(a==4){
            return "</tr><tr><td>"+this.outerHTML + "</td>"
        }
        return "<td>"+this.outerHTML + "</td>"
        
    }).get().join('');
    while(a<3){
        text = text + "<td><div class='stabilo surligneur'> <h3 class='center'></h3><img class='center' src='./img/blanc.jpg' width='100px' height='100px'></div></td>";
        a++;
    }
    text = "<table><tr>"+text;
    text = text + "</tr></table>";
   console.log(text);   
    $("#recherche").show();       
    document.getElementById("recherche").innerHTML=text;
    })}
}