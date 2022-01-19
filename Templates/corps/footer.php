</div>
<footer style="background:#181a20" class="pt-4">

<div class="container">

 <div class="row">

   <div class="col-sm-12 col-md-5 col-lg-3">

    <div class="">

      <div class="footer-logo">

        <img src="Templates/corps/logo CryptAdvisor.png" class="img-fluid w-75">

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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
                        console.log(result)
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



