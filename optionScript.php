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


  //viser de forskellige kategorier
  async function showCategorys() {
    CatHolder.innerHTML="";
    Container.innerHTML="";
    document.getElementById('scheduelContainer').style.display = "none";
    document.getElementById('Home').style.display = "none";

    DataCategorys.results.forEach(cats => {
      const element = document.createElement('div');
      element.setAttribute('class', 'muscelgroups');
      element.setAttribute('onclick', 'defineMuscle('+cats.id+')');
      element.innerHTML = cats.name;

      CatHolder.appendChild(element);
    });
  }


  async function Planing() {

    CatHolder.innerHTML="";
    Container.innerHTML="";
    document.getElementById('scheduelContainer').style.display = "none";
    document.getElementById('Home').style.display = "none";
    openPlaning();
  }

  async function Home() {

    CatHolder.innerHTML="";
    Container.innerHTML="";
    document.getElementById('scheduelContainer').style.display = "none";
    document.getElementById('Home').style.display = "block";

    if(userId != null){
      var loginDiv = document.getElementById('login');
      loginDiv.setAttribute('onclick', 'openUserPage()');
      loginDiv.innerHTML = '<img src="imges/login_img.png" alt="" id="img">'+userName;
    }
    getData();
  }

  Home();

</script>
