<script type="text/javascript">

  //indeholder alle variabler som benyttes i index filen

  //de forskellige dataset
  var DataCategorys = null;
  var DataExsesice = null;
  var DataImg = null;
  var DataInfo = null;

  //rooten af apien
  const Url = 'https://wger.de/api/v2/';

  //muskel gruppen brugeren kigger på
  var MuscleGroup;


  //holder kategorierne
  const CatHolder = document.getElementById('categories');

  //finner og holder containerens plads
  const Main = document.getElementById('root');
  const Container = document.createElement('div');
  Container.setAttribute('class', 'container');
  Main.appendChild(Container);

  //bruges til at udregne hvilken dag det er.
  const MonthCode = [0,3,3,6,1,4,6,2,5,0,3,5];

  //holder styr på om man er logget ind eller ej
  var userId = <?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}else{echo "null";}; ?>;
  var userName = '<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}else{echo "null";}; ?>';

</script>
