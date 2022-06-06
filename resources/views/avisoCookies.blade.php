<?php 
if(!isset($_COOKIE['aceptaCookies'])) {
?>
<div class="avisoCookies">
Utilizamos as cookies para mellorar a navegación en PLAYDISK
<form action="/cookies" method="post">
    @csrf
    <button type="submit" name="botonCookies" class="botonCookies">Aceptar</button>
</form>
</div>
<?php
} 
?>