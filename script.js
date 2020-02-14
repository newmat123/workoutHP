//http://wger.de/en/software/api

var muscleGroup;


const catHolder = document.getElementById('categories');
const main = document.getElementById('root');

const container = document.createElement('div');
container.setAttribute('class', 'container');

main.appendChild(container);


const apiUrl_exsersice = 'http://wger.de/api/v2/exercise/';
const apiUrl_img = 'http://wger.de/api/v2/exerciseimage/';
const exsersiceCategoriUrl = 'http://wger.de/api/v2/exercisecategory/';


//card example
const card = document.createElement('div');
card.setAttribute('class', 'card');

const h1 = document.createElement('h1');
h1.textContent = 'exsersice.name';

const p = document.createElement('p');
p.textContent = `tgrjy htbgdrty jhdgdsx nnnnnn nnn nnbbbb bbbb bbbbbtgrj yhtbgd rtyjhdg dsxnnnnnnn nnnnbbbb bbbbbbbbbtgr jyhtbgdrty jhdgdsx nnnnnnn nnnnbbbbbb bbbbbbbtg rjyh tbgdrtyj hdgdsxnn nnnnnnnnnbb bbbb bbbbbbb tgrjyhtbg drtyjhdg dsxnn nnnnnnn nnbb bbbbb bbbbbb...`;

const imge = document.createElement('img');
imge.setAttribute('class', 'cardImg');
imge.setAttribute('src', 'imges/Hammer-Curls.jpg');

container.appendChild(card);
card.appendChild(h1);
card.appendChild(p);
card.appendChild(imge);
//card example



async function categorys() {
  const response = await fetch(exsersiceCategoriUrl);
  const data = await response.json();
  const {results} = data;

  results.forEach(cats => {
    const element = document.createElement('div');
    element.setAttribute('class', 'muscelgroups');
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

      container.appendChild(card);
      card.appendChild(h1);
      card.appendChild(p);

      async function getImg(url){
        const response = await fetch(url);
        const data = await response.json();
        const {results} = data;
        results.forEach(image => {
          if(image.exercise == exsersice.id){
            const imge = document.createElement('img');
            imge.setAttribute('class', 'cardImg');
            imge.setAttribute('src', image.image);

            card.appendChild(imge);
          }
        });
        if(data.next != null){
          getImg(data.next);
        }
      }
      getImg(apiUrl_img);
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
