jQuery(document).ready(function ($) {

  /*---------------------------------------------
   Alternative entre la connexion et l'inscrition
   ---------------------------------------------*/
   var inscription = $(".cont-inscription-wrapper");
   var connexion = $(".cont-connexion-wrapper");

   //Afficher par défaut la section de connexion
   connexion.hide();
   inscription.show();
    $(".inscription").addClass('active');
    
   //Alternative pour changer de section
   $(".inscription").click(function(){
     connexion.hide();
     inscription.show();
     $(".inscription").addClass('active');
     $(".connexion").removeClass('active');
     $('.cont-Header-wrapper ul').removeClass('changed');
   });

   $(".connexion").click(function(){

     connexion.show();
     inscription.hide();
     $(".connexion").addClass('active');
     $(".inscription").removeClass('active');
     $('.cont-Header-wrapper ul').addClass('changed');

   });
});
