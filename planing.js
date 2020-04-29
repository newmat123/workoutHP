async function openPlaning() {

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
  holder.innerHTML = '<div class="scheduel">Choose the date.<br><input type="date" name="dato" value="" class="DataHolder" id="t"><div id="goB" onclick="openschedual()">Continue</div></div>'


  Container.appendChild(holder);

  document.getElementById('t').value = today;
}


async function openschedual(){
  const chosenDate = document.getElementById('t').value;

  Container.innerHTML = '';

  console.log(chosenDate);

  document.getElementById('scheduelContainer').style.display = "block";

}
