jQuery(document).ready(function ($) {

  

 	$(".nom-cat-post").each(function(){
         console.log(this.innerHTML);
         var categorie = this.innerHTML;
         $(this).parent().addClass(categorie);
  });

    $(document).on('click', '#btn_more', function(){
           var last_post_id = $(this).data("vid"); 
           $('#btn_more').html("Loading...");

           $.ajax({  
                type:"POST",
                url:"loadPostAjax.php",
                data:{last_post_id: last_post_id},  

                success:function(data)  
                {  
                     if(data != '')  
                     {  
                          $('#remove_row').remove();  
                          $('.container main').append(data); 
                          console.log("le data de la bd n'Est pas vide");
                          $(".nom-cat-post").each(function(){
                                 console.log(this.innerHTML);
                                 var categorie = this.innerHTML;
                                 $(this).parent().addClass(categorie);
                          });

                     }  
                     else  
                     {  
                          $('#btn_more').html("No Data");  
                          console.log("le data de la bd est vide");
                     }  
                }  
           });  
      });



});


