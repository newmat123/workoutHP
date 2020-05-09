<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
  //oven over tilføjes jQuery og ajax.


  function openPlaning() {

    //tjekker om man er logget ind.
    if(userId  != null){

      //-------------------------------finder den gældende dato
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
      //---------------------------------------------hertil.

      //danner det html, som holder dato menuen.
      const holder = document.createElement('div');
      holder.setAttribute("class", "container");
      holder.setAttribute("id", "dateContainer");
      holder.innerHTML = '<div class="scheduel">Choose the date.<br><input type="date" name="dato" value="" class="DataHolder" id="date"><div class="goB" onclick="openschedual()">Continue</div></div>'

      //tilføjer det til siden.
      Container.appendChild(holder);

      //sætter den dag vi har nu ind.
      document.getElementById('date').value = today;
    }else {

      //er man ikke det bliver man smidt til login siden.
      openlogin();
    }
  }



  function getYearCode(date) {

    //i det her tilfælde  (2021-05-05) er yy 21.
    var yy = date.slice(2, 4)

    //beregner code med formlen.
    var code = (yy+(yy / 4)) % 7;

    //returner code
    return code;
  }

  function getMothCode(date) {

    //beregner monthCode
    var month = date.slice(5, 7);
    var num = Number(month-1);
    var code = MonthCode[num];

    return code;
  }

  //beregner dag og fremviser derefter skema.
  async function openschedual(){
    //indsamler den dato der er tastet ind.
    const chosenDate = document.getElementById('date').value;

    //ryder siden.
    Container.innerHTML = '';

    //får fat på yearCode og monthCode.
    var yearCode = getYearCode(chosenDate);
    var monthCode = getMothCode(chosenDate);

    var centuryCode = 6;
    var dateNumber = chosenDate.slice(8, 10);
    //matematikken er taget herfra.
    //https://artofmemory.com/blog/how-to-calculate-the-day-of-the-week-4203.html


    var day = (yearCode + monthCode + centuryCode + dateNumber) % 7;
    $.post('datapush.php', { data: day, data1: chosenDate}, function(data){ //se datapush.php.
      //console.log(data);
    });

    //viser hele skemaet.
    document.getElementById('scheduelContainer').style.display = "block";

    switch (day) {
      case 1:
        //viser mandags skemaet.
        document.getElementById('mandag').style.display = 'block';
        document.getElementById('onsdag').style.display = 'none';
        document.getElementById('fredag').style.display = 'none';
        break;


      case 3:
        //viser onsdags skemaet.
        document.getElementById('mandag').style.display = 'none';
        document.getElementById('onsdag').style.display = 'block';
        document.getElementById('fredag').style.display = 'none';
        break;


      case 5:
        //viser fredagens skema.
        document.getElementById('mandag').style.display = 'none';
        document.getElementById('onsdag').style.display = 'none';
        document.getElementById('fredag').style.display = 'block';
        break;


      default:
        //er det ingen af de dage. gemmer vi hele skemaet og fortæller brugerne
        //at han/hun ikke skal lave noget den givne dag.
        document.getElementById('scheduelContainer').style.display = "none";
        alert('nothing is on your schedual, you got a rest day');
        Home();//viderestiller tilbage til forsiden.
        break;
    }
  }
</script>
