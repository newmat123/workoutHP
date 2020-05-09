<script type="text/javascript">

  //de forskelliger funktioner som brugeren kan benytte sig af,
  //for at komme frem og tilbage på siden.

  function openlogin() {
    window.location.href = 'login.php';
  }

  function logout() {
    window.location.href = 'logout.php';
  }

  function openUserPage() {
    window.location.href = 'userPage.php';
  }

  function Planing() {

    //fjerner alt fra siden og viderestiller.
    CatHolder.innerHTML="";
    Container.innerHTML="";
    document.getElementById('scheduelContainer').style.display = "none";
    document.getElementById('Home').style.display = "none";
    openPlaning(); //se planing.php.

  }

  //viser de forskellige kategorier.
  async function showCategorys() {

    //fjerner alt fra siden.
    CatHolder.innerHTML="";
    Container.innerHTML="";
    document.getElementById('scheduelContainer').style.display = "none";
    document.getElementById('Home').style.display = "none";

    //finder alle categorier og opstiller dem.
    DataCategorys.results.forEach(cats => {
      const element = document.createElement('div');
      element.setAttribute('class', 'muscelgroups');
      element.setAttribute('onclick', 'defineMuscle('+cats.id+')');//klikker man på den kalder den defineMuscle(id) se procesData.php.
      element.innerHTML = cats.name;

      //tilføjer det til siden.
      CatHolder.appendChild(element);
    });
  }


  async function Home() {

    //fjerner alt fra siden.
    CatHolder.innerHTML="";
    Container.innerHTML="";
    document.getElementById('scheduelContainer').style.display = "none";
    document.getElementById('Home').style.display = "block"; //viser startsiden.

    //er man logget ind, vises en navn.
    if(userId != null){
      var loginDiv = document.getElementById('login');
      loginDiv.setAttribute('onclick', 'openUserPage()');//klikker man på den viderestilles man til brugersiden.
      loginDiv.innerHTML = '<img src="imges/login_img.png" alt="" id="img">'+userName;
    }
    getData();//se fetchDataScript.php
  }

  Home();

</script>
