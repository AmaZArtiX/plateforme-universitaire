//Dès que le fichier php est entièrement chargé
$(document).ready(function(){

  //Fonction d'affichage du modal avec données multiples
  $('.del_data').click(function(){
    //On récupère les données de data-type de data-id et data pour les mettres dans des variables
    var data_type = $(this).attr("data-type");
    var data_id = $(this).attr("data-id");
    var data = $(this).attr("data");

    //On écrit les données dans le modal
    $('#data_type').html(data_type);
    $('.conf_del').attr("data-type", data_type);
    $('.conf_del').attr("data-id", data_id);
    $('#data').html('<u><b>' + data + '</b></u>');

    //On fait apparaitre le modal
    $('#data_del').modal("show");
  });

  //Fonction de lancement de requête de suppression de données
  $('.conf_del').click(function(){
    //On récupère les données de data_id et de data_type pour les mettres dans des variables
    var data_type = $(this).attr("data-type");
    var data_id = $(this).attr("data-id");

    //Données à envoyer au fichier pour suppression
    if(data_type == "e catégorie") {

      //Code ajax pour requêtes
      $.ajax({
        //Lien vers fichier contenant les requêtes
        url:"../modeles-controleurs/administration.drop.data.php",
        //Méthode à utiliser pour les requêtes
        method:"post",
        //Déclaration de data
        data:{cat_id:data_id},
        //La fonction à apeller si la requête aboutie
        success:function(data){
          //On fait apparaitre le modal
          $('#data_del').modal("hide");

          $('#forum').append(data);

          //On raffraichit la liste des données
          //$("#forum").load(" #forum");
        },
        //La fonction à appeler si la requête n'a pas abouti
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    } else if (data_type == "e sous-catégorie") {
      //Code ajax pour requêtes
      $.ajax({
        //Lien vers fichier contenant les requêtes
        url:"../modeles-controleurs/administration.drop.data.php",
        //Méthode à utiliser pour les requêtes
        method:"post",
        //Déclaration de data
        data:{sscat_id:data_id},
        //La fonction à apeller si la requête aboutie
        success:function(data){
          //On fait apparaitre le modal
          $('#data_del').modal("hide");

          $('#forum').append(data);

          //On raffraichit la liste des données
          //$("#forum").load(" #forum");
        },
        //La fonction à appeler si la requête n'a pas abouti
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    } else if (data_type == "e topic") {
      //Code ajax pour requêtes
      $.ajax({
        //Lien vers fichier contenant les requêtes
        url:"../modeles-controleurs/administration.drop.data.php",
        //Méthode à utiliser pour les requêtes
        method:"post",
        //Déclaration de data
        data:{top_id:data_id},
        //La fonction à apeller si la requête aboutie
        success:function(data){
          //On fait apparaitre le modal
          $('#data_del').modal("hide");

          $('#forum').append(data);

          //On raffraichit la liste des données
          //$("#forum").load(" #forum");
        },
        //La fonction à appeler si la requête n'a pas abouti
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    } else if (data_type == "'utilisateur") {
      //Code ajax pour requêtes
      $.ajax({
        //Lien vers fichier contenant les requêtes
        url:"../modeles-controleurs/administration.drop.data.php",
        //Méthode à utiliser pour les requêtes
        method:"post",
        //Déclaration de data
        data:{mem_id:data_id},
        //La fonction à apeller si la requête aboutie
        success:function(data){
          //On fait apparaitre le modal
          $('#data_del').modal("hide");

          $('#utilisateurs').append(data);

          //On raffraichit la liste des données
          //$("#utilisateurs").load(" #utilisateurs");
        },
        //La fonction à appeler si la requête n'a pas abouti
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    }

  });
});
