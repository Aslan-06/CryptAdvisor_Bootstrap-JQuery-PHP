</div>
<footer style="background:#181a20" class="pt-4">

<div class="container">

 <div class="row">

   <div class="col-sm-12 col-md-5 col-lg-3">

    <div class="">

      <div class="footer-logo">

        <img src="./img/logo CryptAdvisor.png" class="img-fluid w-75">

      </div>

      <div class="socials d-flex justify-content-evenly mt-3">

        <a href="#" class="text-reset "><i class="text-light fs-4 fa-brands fa-facebook"></i></a>

        <a href="#" class="text-reset "><i class="text-light fs-4 fa-brands fa-twitter"></i></a>

        <a href="#" class="text-reset "><i class="text-light fs-4 fa-brands fa-instagram"></i></a>

      </div>

   </div>

   </div>

   <div class="col-sm-12 col-md-7 col-lg-9 row">

   <div class="col-sm-12 col-md-6 col-lg-4">

     <h6 class=" fw-bolder fs-6 text-light">Website plan</h6>

     <ul class="list-unstyled">

       <li class="text-light"><a href="#" class="text-decoration-none text-reset text-light">Cours</a></li>

       

       <li class="text-light"><a href="#" class="text-decoration-none text-reset text-light">Formations</a></li>

       

       <li class="text-light"><a href="#" class="text-decoration-none text-reset text-light">Forums</a></li>

       

       <li class="text-light"><a href="#" class="text-decoration-none text-reset text-light">Articles</a></li>


     </ul>

   </div>


   <div class="col-sm-12 col-md-6 col-lg-4">

    <h6 class=" fw-bolder fs-6 text-light">Website Informations</h6>

    <ul class="list-unstyled">

      <li class="text-light"><a href="#" class="text-decoration-none text-reset text-light">Terms and conditions</a></li>

      <li class="text-light"><a href="#" class="text-decoration-none text-reset text-light">Privacy policy</a></li> 

      <li class="text-light"><a href="#" class="text-decoration-none text-reset text-light">FAQ</a></li>

    </ul>

   </div>

   <div class="col-sm-12 col-md-6 col-lg-4">

    <h6 class=" fw-bolder fs-6 text-light">Support & contact</h6>

    <ul class="list-unstyled">

      <li class="text-light"><a href="#" class="text-decoration-none text-reset text-light">Support us</a></li>

      <li class="text-light"><a href="#" class="text-decoration-none text-reset text-light">About us</a></li> 

    </ul>

   </div>

   </div>

 </div>

</div>

<div class="container text-center text-light mt-4">&copy; CryptAdvisor - Since 2022 - All rights reserved </div>

</footer>

</div>
<script>
$(document).ready(function(){
    $('#tag').keyup(function(){

        $('#search-results').html("")
            const search = $('#tag').val()

            if(search !=""){
                $.ajax({
                    url:"index.php?module=Accueil&action=search",
                    type:"POST",
                    data:{
                        tag:search
                    },
                        dataType: 'html',
                    success:function(result){
                        console.log(result+123)
                        $('#search-results').html(result)
                    }
                }) 
            } else{
                $('#search-results').html("")
            }
    })
})
</script>
</body>
</html>



