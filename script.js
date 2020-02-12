//key  4cb44547e51e4695b6a73b9e1a60c3ffbe5c4989
//exercise
//exerciseinfo
//exercisecategory
//exercisecomment
//exerciseimage
  //"exerciseinfo": "http://wger.de/api/v2/exerciseinfo/",
  //"exercise": "http://wger.de/api/v2/exercise/",
  //"exercisecategory": "http://wger.de/api/v2/exercisecategory/",
  //"exerciseimage": "http://wger.de/api/v2/exerciseimage/",
  //"exercisecomment": "http://wger.de/api/v2/exercisecomment/",

//root
//http://wger.de/api/v2/


function getApi(){
  var request = new XMLHttpRequest();

  request.onload = function () {

    // Begin accessing JSON data here
    var data = JSON.parse(this.response);
    alert(data);
    //alert(data);

    if (request.status >= 200 && request.status < 400) {
      data.forEach(results => {
        alert(data);


        const card = document.createElement('div');
        card.setAttribute('class', 'card');

        const h1 = document.createElement('h1');
        h1.textContent = results.name;

        const p = document.createElement('p');
        results.description = results.description.substring(0, 300);
        p.textContent = `${results.description}...`;

        container.appendChild(card);
        card.appendChild(h1);
        card.appendChild(p);

      });
    } else {
      const errorMessage = document.createElement('marquee');
      errorMessage.textContent = `Gah, it's not working!`;
      app.appendChild(errorMessage);
    }
  }

  request.open('GET', 'http://wger.de/api/v2/exerciseinfo/', true);
  request.setRequestHeader("Content-type", "application/json");
  request.send();
}



const app = document.getElementById('root');

const container = document.createElement('div');
container.setAttribute('class', 'container');

app.appendChild(container);



getApi();











//function UserAction() {
//    var xhttp = new XMLHttpRequest();
//    xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             alert(this.response);
//         }
//    };
//    xhttp.open("get", "http://wger.de/api/v2/exerciseinfo/?format=api&APPID=4cb44547e51e4695b6a73b9e1a60c3ffbe5c4989", true);
//    xhttp.setRequestHeader("Content-type", "application/json");
//    xhttp.send();
//}




//const app = document.getElementById('root');

//const container = document.createElement('div');
//container.setAttribute('class', 'container');

//app.appendChild(container);

//var request = new XMLHttpRequest();
//request.open('GET', 'https://ghibliapi.herokuapp.com/films', true);
//request.onload = function () {

  // Begin accessing JSON data here
//  var data = JSON.parse(this.response);
//  if (request.status >= 200 && request.status < 400) {
//    data.forEach(movie => {
//      const card = document.createElement('div');
//      card.setAttribute('class', 'card');

//      const h1 = document.createElement('h1');
//      h1.textContent = movie.title;

//      const p = document.createElement('p');
//      movie.description = movie.description.substring(0, 300);
//      p.textContent = `${movie.description}...`;

//      container.appendChild(card);
//      card.appendChild(h1);
//      card.appendChild(p);
//    });
//  } else {
//    const errorMessage = document.createElement('marquee');
//    errorMessage.textContent = `Gah, it's not working!`;
//  }
//}

//request.send();
