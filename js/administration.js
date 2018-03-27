//Dès que le fichier php est entièrement chargé
$(document).ready(function(){

  //Fonction d'affichage du modal avec données multiples
  $('.del_data').click(function(){
    //On récupère les données de data et de data_type pour les mettres dans des variables
    var data = $(this).attr("data");
    var data_type = $(this).attr("data-type");

    //Code ajax pour requêtes
    //$.ajax({
      //Lien vers fichier contenant les requêtes
      //url:"fichier.php",
      //Méthode à utiliser pour les requêtes
      //method:"post",
      //Données à envoyer au fichier
      //data:{data:data},
      //Si succès des requêtes, affichage des données dans html
      //success:function(data){
        //On écrit dans #data les données reçues
        //$('#data').html(data);
      //}
    //});

    //On écrit les données dans le modal
    $('#data_type').html(data_type);
    $('#data').html('<u><b>' + data + '</b></u>');

    //On fait apparaitre le modal
    $('#data_del').modal("show");
  });
});
