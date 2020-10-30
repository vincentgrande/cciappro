function show(id){
    $('.admin').css('display', 'none');
    $('#'+id).show();
}
$(document).on("keypress", "input", function(e){
    if(e.which == 13){
        e.preventDefault();
        console.log("cc");
        alert(this.value);
    }
});