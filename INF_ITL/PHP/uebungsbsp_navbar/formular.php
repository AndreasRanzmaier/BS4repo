
<?php
if(isset($_POST['doit']))
{
  echo 'geklickt';
} else
{
  ?>
<h1>Registrierung</h1>
<form method="post">
  <input type="submit" name="doit" value="klick">
</form>
<?php
}