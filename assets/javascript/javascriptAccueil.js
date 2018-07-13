// Javascript pour la fenetre modal 
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})