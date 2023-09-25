
<?php wp_head(); ?>
<body style="background-color: black;"> <!-- Add this style attribute -->
<div style="text-align:center;">
<div class="cont_principal">
<div class="cont_error">
  
<h1>Oops</h1>  
  <p>Página não Encontrada.</p>
  <p>Visite nossa <a href="<?php echo esc_url(home_url('/')); ?>" style="color:white!important; text-decoration:none!important;">HOME</a></p>

  </div>
<div class="cont_aura_1"></div>
<div class="cont_aura_2"></div>
</div>
</div>
<script>
window.onload = function(){
document.querySelector('.cont_principal').className= "cont_principal cont_error_active";  
  
}
</script>