<script type="text/javascript">

  function changeLogin() {
    var login = document.getElementById('login');

    switch (isLoggedin) {
      case true:
        login. setAttribute('onclick', 'logout()')
        login.innerHTML = '<img src="imges/login_img.png" alt="" id="img">Logout'
        break;
      case false:
        login. setAttribute('onclick', 'openlogin()')
        login.innerHTML = '<img src="imges/login_img.png" alt="" id="img">Login'
        break;
    }
  }

  function logout() {
    isLoggedin = false;
    changeLogin();
  }

  function registre() {
    var name = document.getElementById('un').value;
    var password = document.getElementById('pw').value;
    var password2 = document.getElementById('cpw').value;
    var istaken = false;

    if(password == password2){

      for (var i = 0; i < names.length; i++) {
        if(name == names[i]){
          alert('username taken');
          istaken = true;
        }
      }
      if(!istaken){
        names.push(name);
        passwords.push(password);
        isLoggedin = true;
        changeLogin();
        Home();
      }
    }else{
      alert('Password is incorect');
    }
  }

  function register(){
    Container.innerHTML = "";

    const loginHolder = document.createElement('div');
    loginHolder.setAttribute('class', 'loginHolder');
    loginHolder.innerHTML = '<input type="username" name="username" id= "un" value="" placeholder="User name" class="DataHolder"><br><input type="password" name="password" id = "pw" value="" placeholder="Password" class="DataHolder"><input type="password" name="confirmPassword" id = "cpw" value="" placeholder="Confirm password" class="DataHolder"><div id="loginB" onclick="registre()" class="goB">Cuntinue</div><div id="loginB" onclick="openlogin()" class="goB">Login</div>';


    Container.appendChild(loginHolder);
  }

  function login() {
    var username = document.getElementById('un').value;
    var password = document.getElementById('pw').value;

    for (var i = 0; i < names.length; i++) {
      if(username == names[i] && password == passwords[i]){
        isLoggedin = true;
        changeLogin()
        Home();
      }
    }
    if(!isLoggedin){
      alert('Password or username is incorect');
    }
  }


  function openlogin() {
    document.getElementById('Home').style.display = "none";
    document.getElementById('scheduelContainer').style.display = "none";
    CatHolder.innerHTML = "";
    Container.innerHTML = "";

    const loginHolder = document.createElement('div');
    loginHolder.setAttribute('class', 'loginHolder');
    loginHolder.innerHTML = '<input type="username" name="username" id= "un" value="" placeholder="User name" class="DataHolder"><br><input type="password" name="password" id = "pw" value="" placeholder="Password" class="DataHolder"><div id="loginB" onclick="login()" class="goB">Cuntinue</div><div id="loginB" onclick="register()" class="goB">Register</div>';


    Container.appendChild(loginHolder);
  }



  function openPlaning() {

    if(isLoggedin){
      var date = new Date;

      var day = date.getDate(),
        month = date.getMonth() + 1,
        year = date.getFullYear(),
        hour = date.getHours(),
        min  = date.getMinutes();

      month = (month < 10 ? "0" : "") + month;
      day = (day < 10 ? "0" : "") + day;
      hour = (hour < 10 ? "0" : "") + hour;
      min = (min < 10 ? "0" : "") + min;

      var today = year + "-" + month + "-" + day;

      const holder = document.createElement('div');
      holder.setAttribute("class", "container");
      holder.setAttribute("id", "dateContainer");
      holder.innerHTML = '<div class="scheduel">Choose the date.<br><input type="date" name="dato" value="" class="DataHolder" id="t"><div class="goB" onclick="openschedual()">Continue</div></div>'


      Container.appendChild(holder);

      document.getElementById('t').value = today;
    }else {
      openlogin();
      alert("You must login first");
    }
  }



  function getYearCode(date) {

    var yy = date.slice(2, 4)

    var code = (yy+(yy / 4)) % 7;

    return code;
  }

  function getMothCode(date) {
    var month = date.slice(5, 7);
    var num = Number(month-1);
    var code = MonthCode[num];

    return code;
  }


  async function openschedual(){
    const chosenDate = document.getElementById('t').value;

    Container.innerHTML = '';

    var yearCode = getYearCode(chosenDate);
    var monthCode = getMothCode(chosenDate);

    var centuryCode = 6;
    var dateNumber = chosenDate.slice(8, 10);

    //mattematikken er taget herfra
    //https://artofmemory.com/blog/how-to-calculate-the-day-of-the-week-4203.html

    var day = (yearCode + monthCode + centuryCode + dateNumber) % 7;

    //console.log(day);

    document.getElementById('scheduelContainer').style.display = "block";

    switch (day) {
      case 1:
        document.getElementById('mandag').style.display = 'block';
        document.getElementById('onsdag').style.display = 'none';
        document.getElementById('fredag').style.display = 'none';
        break;


      case 3:
        document.getElementById('mandag').style.display = 'none';
        document.getElementById('onsdag').style.display = 'block';
        document.getElementById('fredag').style.display = 'none';
        break;


      case 5:
        document.getElementById('mandag').style.display = 'none';
        document.getElementById('onsdag').style.display = 'none';
        document.getElementById('fredag').style.display = 'block';
        break;


      default:
        document.getElementById('scheduelContainer').style.display = "none";
        break;
    }
  }
</script>
