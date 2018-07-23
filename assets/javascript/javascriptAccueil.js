// Fonction qui permet d'afficher ma fenêtre modal
$(function(){
    
// Javascript pour la fenetre modal 
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

});