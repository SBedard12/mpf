jQuery(document).ready(function ($) {

  // Ajout de la bonne classe pour chaque catégorie
 	$(".nom-cat-post").each(function(){
         var categorie = this.innerHTML;
         $(this).parent().addClass(categorie);
  });

  // Requête Ajax pour aller chercher plus d'article, le Voir plus
  $(document).on('click', '#btn_more', function(){
           var last_post_id = $(this).data("vid");
           $('#btn_more').html("Chargement...");

           $.ajax({
            type:"POST",
            url:"loadPostAjax.php",
            data:{last_post_id: last_post_id},

            // Si la requête a bien functionné
            success:function(data)
            {
               if(data != '')
               {
                    $('#remove_row').remove();
                    $('.container main').append(data);
                    $(".nom-cat-post").each(function(){
                           var categorie = this.innerHTML;
                           $(this).parent().addClass(categorie);
                    });

               }
               else
               {
                    $('#btn_more').html("Aucun article");
               }
            }
           });
      });

        // Function pour le classement par catégorie
        $(document).on('click', '.btn-menu-open', function(){
          console.log("sdwklnfwjf");
          var defaultTranslate = 80;

          if($( ".classement-post ul li" ).hasClass("is-opened")){
            $( ".classement-post ul li" ).each(function() {
              $(this).removeClass("is-opened");
              $(this).css("top", "0px");
            });
          }else{

                $( ".classement-post ul li" ).each(function() {
                  $(this).addClass("is-opened")
                  $(this).css("top", "-"+ defaultTranslate + "px");
                  defaultTranslate = defaultTranslate + 80;

                });
          }

        });

        // Sur le click d'une des catégories
        $(document).on('click', '.classement-post ul li ', function(){
            var id_post_categorie = $(this).data("vid");
            document.location.href = 'postclassement.php?categorie='+id_post_categorie+'';
        });




});
