

async function openPlaning() {

  var scheduel = document.createElement("div");
  scheduel.setAttribute("class", "scheduel");

  var dayOne = document.createElement("div");
  dayOne.setAttribute("class", "days");

  var titleDay = document.createElement("div");
  titleDay.setAttribute("class", "Day");
  titleDay.innerHTML = "mandag";



  var dayTo = document.createElement("div");
  dayTo.setAttribute("class", "days");

  var titleDay1 = document.createElement("div");
  titleDay1.setAttribute("class", "Day");



  var dayTre = document.createElement("div");
  dayTre.setAttribute("class", "days");

  var titleDay2 = document.createElement("div");
  titleDay2.setAttribute("class", "Day");


  Container.appendChild(scheduel);
  scheduel.appendChild(dayOne);
  dayOne.appendChild(titleDay);


  scheduel.appendChild(dayTo);
  dayTo.appendChild(titleDay1);

  scheduel.appendChild(dayTre);
  dayTre.appendChild(titleDay2);

}
