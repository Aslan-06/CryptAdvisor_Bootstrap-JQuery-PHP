</div>
<footer class="mt-auto">
  <div class="container d-flex align-items-center justify-content-between flex-wrap">

    <div>
    <span class="d-block">
        <a href="index.php"><img src="Templates/corps/logo CryptAdvisor.png" alt="" class="w-50 h-auto"></a>
        </span>
        <span class="d-block mt-3 ">
        <a  href="index.php" class="text-reset fs-4 me-4 "> 
          <i class="fa-brands fa-facebook text-primary"></i>
        </a>

        <a href="index.php" class="text-reset fs-4 me-4"> 
          <i class="fa-brands fa-twitter"></i>
        </a>

        <a  href="index.php" class="text-reset fs-4 "> 
          <i class="fa-brands fa-instagram"></i>
        </a>
        </span>
    </div>
    <div>
    <h6>Site navigation</h6>
          <ul class="list-unstyled">
            <li class="ps-2"><a href="" class="text-reset">Formations</a> </li>
            <li class="ps-2"><a href="" class="text-reset">Cours</a> </li>
            <li class="ps-2"><a href="" class="text-reset">Forums</a> </li>
            <li class="ps-2"><a href="" class="text-reset">Articles</a> </li>
          </ul>
    </div>

    <div>
    <h6>Site information</h6>
           <ul class="list-unstyled">
            <li class="ps-2"><a href="" class="text-reset">Terms and conditions</a> </li>
            <li class="ps-2"><a href="" class="text-reset">Privacy policy</a> </li>
            <li class="ps-2"><a href="" class="text-reset">FAQ</a> </li>
          </ul>
    </div>
    <div>
    <h6>Support and contact</h6>
          <ul class="list-unstyled">
            <li class="ps-2"><a href="" class="text-reset">Nous supporter</a> </li>
            <li class="ps-2"><a href="" class="text-reset">A propos</a> </li>
          </ul>
    </div>
    
  </div>
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
<!-- 
<footer class="pt-3 mt-auto  w-100 ">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-3">
        <span class="d-block">
        <a href="index.php"><img src="Templates/corps/logo CryptAdvisor.png" alt="" class="w-75 h-auto"></a>
        </span>
        <span class="d-block text-center">
        <a id="lienLogoFooter" href="index.php"> 
            <img class="logo_social" src="Templates/corps/logo_facebook.png" alt="Logo Facebook" class="w-25 h-auto logo_social"/>  
          </a>

          <a id="lienLogoFooter" href="index.php"> 
            <img class="logo_social" src="Templates/corps/logo_twitter.png" alt="Logo Facebook" class="w-25 h-auto logo_social"/>  
          </a>

          <a id="lienLogoFooter" href="index.php"> 
            <img class="logo_social" src="Templates/corps/logo_instagram.png" alt="Logo Facebook" class="w-25 h-auto logo_social"/>  
          </a>
        </span>

      </div>
      <div class="col-sm-12 col-md-6 col-lg-3">
          
      </div>

      <div class="col-sm-12 col-md-6 col-lg-3">
          
      </div>

      <div class="col-sm-12 col-md-6 col-lg-3">

      </div>
    </div>
  </div>
</footer> -->




