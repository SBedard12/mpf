jQuery(document).ready(function ($) {

  // Permet d'ouvrire et de fermer la navigation
  $(document).on('click', '.open-menu', function(){
    $("header").toggleClass("open");
  });

});
