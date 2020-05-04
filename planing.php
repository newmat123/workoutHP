<script type="text/javascript">


  function openPlaning() {

    if(userId  != null){
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
