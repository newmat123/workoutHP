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

var muscleGroup;

var dataSet = {};

const catHolder = document.getElementById('categories');
const main = document.getElementById('root');

const container = document.createElement('div');
container.setAttribute('class', 'container');

main.appendChild(container);



const apiUrl_exsersice = 'http://wger.de/api/v2/exercise/'
const exsersiceCategoriUrl = 'http://wger.de/api/v2/exercisecategory/'


//card example
const card = document.createElement('div');
card.setAttribute('class', 'card');

const h1 = document.createElement('h1');
h1.textContent = 'exsersice.name';

const p = document.createElement('p');
p.textContent = `tgrjyhtbgdrtyjhdgdsxnnnnnnnnnnnbbbbbbbbbbbbbtgrjyhtbgdrtyjhdgdsxnnnnnnnnnnnbbbbbbbbbbbbbtgrjyhtbgdrtyjhdgdsxnnnnnnnnnnnbbbbbbbbbbbbbtgrjyhtbgdrtyjhdgdsxnnnnnnnnnnnbbbbbbbbbbbbbtgrjyhtbgdrtyjhdgdsxnnnnnnnnnnnbbbbbbbbbbbbb...`;

const imge = document.createElement('img');
imge.setAttribute('class', 'cardImg');
imge.setAttribute('src', 'imges/Hammer-Curls.jpg');

container.appendChild(card);
card.appendChild(h1);
card.appendChild(p);
card.appendChild(imge);
//card example


async function fetchApi(url) {
  const response = await fetch(url);
  const data = await response.json();
  dataSet = dataSet+data;

  if(data.next != null){
    fetchApi(data.next);
  }else{
    console.log(dataSet);
  }
}
fetchApi(apiUrl_exsersice);

async function categorys() {
  const response = await fetch(exsersiceCategoriUrl);
  const data = await response.json();
  const {results} = data;

  results.forEach(cats => {
    const element = document.createElement('div');
    element.setAttribute('class', 'muscelgroups')
    element.setAttribute('onclick', 'defineMuscle('+cats.id+')');
    element.innerHTML = cats.name;

    catHolder.appendChild(element);

  });
}



async function processApi(url) {
  const response = await fetch(url);
  const data = await response.json();
  const {results} = data;

  results.forEach(exsersice => {
    if(exsersice.name_original != "" && exsersice.description != "" && exsersice.category == muscleGroup && exsersice.language == 2){
      const card = document.createElement('div');
      card.setAttribute('class', 'card');

      const h1 = document.createElement('h1');
      h1.innerHTML = exsersice.name_original;

      const p = document.createElement('p');
      p.innerHTML = `${exsersice.description}`;

      const imge = document.createElement('img');
      imge.setAttribute('class', 'cardImg');
      imge.setAttribute('src', 'imges/Hammer-Curls.jpg');

      container.appendChild(card);
      card.appendChild(h1);
      card.appendChild(p);
      card.appendChild(imge);
    }
  });
  if(data.next != null){
    processApi(data.next);
  }
}


function defineMuscle(i) {
  if(i != muscleGroup){
    container.innerHTML = "";
    muscleGroup = i;
    processApi(apiUrl_exsersice);

  }
}


categorys();
