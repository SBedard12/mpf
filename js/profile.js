jQuery(document).ready(function ($) {

  // Function pour faire ouvrir le pop-up pour la modification d'un article.
  $(document).on('click', '.mpf-pencil', function(){

      var parent =   $(this).parents("div.recent-post");
      parent.addClass("open");
      $(".open .modifer-post").show();

      var catHidden = $(".open #cat-hidden").val();
      console.log(catHidden);
       $(".open .modifer-post #catSelect").val(catHidden);


  });


  // Function pour fermer le pop-up
  $(document).on('click', '.closePopup', function(){
    $('.modifer-post').hide();
    $('div.recent-post').removeClass("open");
  });

  // Function pour faire la supression d'un article en Ajax
  $(document).on('click', '.mpf-trash', function(){
         var last_post_id = $(this).data("vid");
         $(this).parents(".recent-post").addClass("deletPost");
         $.ajax({
              type:"POST",
              url:"deletePostAjax.php",
              data:{last_post_id: last_post_id},
              success:function(data)
              {

              }
         });
    });

    // Function pour faire la modification d'un article en Ajax
    $(document).on('click', '.update-post', function(){

          var id_post = $(this).data("vid");
          var description_post =$(".open .modifer-post textarea#description_post").val();
          var titre_post = $(".open .modifer-post input[name='titre']").val();
          var categorie_post = $( ".open .modifer-post #catSelect" ).val();
           $.ajax({
                type:"POST",
                url:"updatePostAjax.php",
                data:{
                  id_post: id_post,
                  description_post: description_post,
                  titre_post: titre_post,
                  categorie_post: categorie_post
                },
                success:function(data)
                {
                  console.log(data)
                  window.location.reload();
                }
           });
      });
});
