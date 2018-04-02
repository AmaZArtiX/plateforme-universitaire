//Dès que le fichier php est entièrement chargé
$(document).ready(function(){

  function del_init(){
    //On récupère les données de data-type de data-id et data pour les mettres dans des variables
    var data_type = $(this).attr("data-type");
    var data_id = $(this).attr("data-id");
    var data = $(this).attr("data");
    var data_container = $(this).attr("data-container");

    //On écrit les données dans le modal
    $('#data_del_type').html(data_type);
    $('.conf_del').attr("data-type", data_type);
    $('.conf_del').attr("data-id", data_id);
    $('.conf_del').attr("data-container", data_container);
    $('#data_del_data').html('<u><b>' + data + '</b></u>');

    //On fait apparaitre le modal
    $('#data_del').modal("show");
  }

  //Fonction d'affichage du modal avec données multiples
  $('.del_data').click(del_init);

  //Fonction de lancement de requête de suppression de données
  $('.conf_del').click(function(){
    //On récupère les données de data_id et de data_type pour les mettres dans des variables
    var data_type = $(this).attr("data-type");
    var data_id = $(this).attr("data-id");
    var data_container = $(this).attr("data-container");

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

          //$('#forum').append(data);

          //On mets à jour le conteneur
          $('#'+data_container).load(location.href+" #"+data_container+">*", function(){
            $.getScript('../js/administration.js', function(){
              //Fonction d'affichage du modal avec données multiples
              $('.del_data').click(del_init);
            });
          });
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

          //$('#forum').append(data);

          //On mets à jour le conteneur
          $('#'+data_container).load(location.href+" #"+data_container+">*", function(){
            $.getScript('../js/administration.js', function(){
              //Fonction d'affichage du modal avec données multiples
              $('.del_data').click(del_init);
            });
          });
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

          //$('#forum').append(data);

          //On mets à jour le conteneur
          $('#'+data_container).load(location.href+" #"+data_container+">*", function(){
            $.getScript('../js/administration.js', function(){
              //Fonction d'affichage du modal avec données multiples
              $('.del_data').click(del_init);
            });
          });
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

          //$('#forum').append(data);

          //On mets à jour le conteneur
          $('#'+data_container).load(location.href+" #"+data_container+">*", function(){
            $.getScript('../js/administration.js', function(){
              //Fonction d'affichage du modal avec données multiples
              $('.del_data').click(del_init);
            });
          });
        },
        //La fonction à appeler si la requête n'a pas abouti
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    }

  });

  function add_init(){
    //On récupère les données de data-type de data-id et data pour les mettres dans des variables
    var data_type = $(this).attr("data-type");

    //On écrit les données dans le modal
    $('#data_add_type').html(data_type);
    $('.conf_add').attr("data-type", data_type);

    //Données à envoyer au fichier pour suppression
    if(data_type == "e catégorie") {
      //Code ajax pour requêtes
      $.ajax({
        //Lien vers fichier contenant les requêtes
        url:"../modeles-controleurs/administration.get.data.php",
        //Méthode à utiliser pour les requêtes
        method:"post",
        //Déclaration de data
        data:{data_type:"categorie"},
        //La fonction à apeller si la requête aboutie
        success:function(data){
          $('#data_add_data').html(data);
        },
        //La fonction à appeler si la requête n'a pas abouti
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    } else if(data_type == "e sous-catégorie") {
      //Code ajax pour requêtes
      $.ajax({
        //Lien vers fichier contenant les requêtes
        url:"../modeles-controleurs/administration.get.data.php",
        //Méthode à utiliser pour les requêtes
        method:"post",
        //Déclaration de data
        data:{data_type:"sous-categorie"},
        //La fonction à apeller si la requête aboutie
        success:function(data){
          $('#data_add_data').html(data);
        },
        //La fonction à appeler si la requête n'a pas abouti
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    }

    //On fait apparaitre le modal
    $('#data_add').modal("show");
  }

  //Fonction d'affichage du modal avec données multiples
  $('.add_data').click(add_init);

  //Fonction de lancement de requête d'ajout de données
  $('.conf_add').click(function(){
    //On récupère les données de data_id et de data_type pour les mettres dans des variables
    var data_type = $(this).attr("data-type");
    var data_id = $('#select').val();

    //Données à envoyer au fichier pour suppression
    if(data_type == "e catégorie") {

      var cat_nom = $('#cat_nom').val();
      var cat_desc = $('#cat_desc').val();

      //Code ajax pour requêtes
      $.ajax({
        //Lien vers fichier contenant les requêtes
        url:"../modeles-controleurs/administration.add.data.php",
        //Méthode à utiliser pour les requêtes
        method:"post",
        //Déclaration de data
        data:{for_id:data_id, cat_nom:cat_nom, cat_desc:cat_desc},
        //La fonction à apeller si la requête aboutie
        success:function(data){
          //On fait apparaitre le modal
          $('#data_add').modal("hide");

          //$('#forum').append(data);

          //On mets à jour le conteneur
          $('#forum').load(location.href+" #forum"+">*", function(){
            $.getScript('../js/administration.js', function(){
              //Fonction d'affichage du modal avec données multiples
              $('.del_data').click(del_init);
            });
          });
        },
        //La fonction à appeler si la requête n'a pas abouti
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    } else if (data_type == "e sous-catégorie") {

      var sscat_nom = $('#sscat_nom').val();

      //Code ajax pour requêtes
      $.ajax({
        //Lien vers fichier contenant les requêtes
        url:"../modeles-controleurs/administration.add.data.php",
        //Méthode à utiliser pour les requêtes
        method:"post",
        //Déclaration de data
        data:{cat_id:data_id, sscat_nom:sscat_nom},
        //La fonction à apeller si la requête aboutie
        success:function(data){
          //On fait apparaitre le modal
          $('#data_add').modal("hide");

          //$('#forum').append(data);

          //On mets à jour le conteneur
          $('#cat_'+data_id).load(location.href+" #cat_"+data_id+">*", function(){
            $.getScript('../js/administration.js', function(){
              //Fonction d'affichage du modal avec données multiples
              $('.del_data').click(del_init);
            });
          });
        },
        //La fonction à appeler si la requête n'a pas abouti
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    }

  });

  function mod_init(){
    //On récupère les données de data-type de data-id et data pour les mettres dans des variables
    var data_type = $(this).attr("data-type");

    //On écrit les données dans le modal
    $('#data_mod_type').html(data_type);
    $('.conf_mod').attr("data-type", data_type);

    //Données à envoyer au fichier pour suppression
    if(data_type == "'utilisateur") {
      //Code ajax pour requêtes
      $.ajax({
        //Lien vers fichier contenant les requêtes
        url:"../modeles-controleurs/administration.get.data.php",
        //Méthode à utiliser pour les requêtes
        method:"post",
        //Déclaration de data
        data:{data_type:"utilisateur"},
        //La fonction à apeller si la requête aboutie
        success:function(data){
          $('#data_mod_data').html(data);
        },
        //La fonction à appeler si la requête n'a pas abouti
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    }

    //On fait apparaitre le modal
    $('#data_mod').modal("show");
  }

  //Fonction d'affichage du modal avec données multiples
  $('.mod_data').click(mod_init);

  //Fonction de lancement de requête d'ajout de données
  $('.conf_mod').click(function(){
    //On récupère les données de data_id et de data_type pour les mettres dans des variables
    var data_type = $(this).attr("data-type");

    //Données à envoyer au fichier pour modification
    if(data_type == "'utilisateur") {

      var mem_id = $('#sel_mem').val();
      var mem_admin = $('#sel_admin').val();

      //Code ajax pour requêtes
      $.ajax({
        //Lien vers fichier contenant les requêtes
        url:"../modeles-controleurs/administration.mod.data.php",
        //Méthode à utiliser pour les requêtes
        method:"post",
        //Déclaration de data
        data:{mem_id:mem_id, mem_admin:mem_admin},
        //La fonction à apeller si la requête aboutie
        success:function(data){
          //On fait apparaitre le modal
          $('#data_mod').modal("hide");

          //$('#utilisateurs').append(data);

          //On mets à jour le conteneur
          $('#utilisateurs').load(location.href+" #utilisateurs>*", function(){
            $.getScript('../js/administration.js', function(){
              //Fonction d'affichage du modal avec données multiples
              $('.del_data').click(del_init);
            });
          });
        },
        //La fonction à appeler si la requête n'a pas abouti
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    }

  });
});
