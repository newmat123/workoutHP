//http://wger.de/en/software/api

//muskel gruppen brugeren kigger på
var MuscleGroup;

//rooten af apien
const Url = 'https://wger.de/api/v2/';

//holder kategorierne
const CatHolder = document.getElementById('categories');

//finner og holder containerens plads
const Main = document.getElementById('root');
const Container = document.createElement('div');
Container.setAttribute('class', 'container');
Main.appendChild(Container);







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

Container.appendChild(card);
card.appendChild(h1);
card.appendChild(p);
card.appendChild(imge);
//card example






//henter de forskellige kategorier
async function categorys() {

  const response = await fetch(Url + 'exercisecategory/');
  const data = await response.json();

  data.results.forEach(cats => {
    const element = document.createElement('div');
    element.setAttribute('class', 'muscelgroups');
    element.setAttribute('onclick', 'defineMuscle('+cats.id+')');
    element.innerHTML = cats.name;

    CatHolder.appendChild(element);

  });
}


//lopper iggennem den givne api og danner kortne
async function processApi(url) {
  //henter data
  const response = await fetch(url);
  const data = await response.json();

  //looper gennem alle resultaterne
  data.results.forEach(exsersice => {
    //tjækker om der er fyld på, om det er den rigtige kattegori og om det er på engelsk
    if(exsersice.name_original != "" && exsersice.description != "" && exsersice.category == MuscleGroup && exsersice.language == 2){
      const card = document.createElement('div');
      card.setAttribute('class', 'card');

      const h1 = document.createElement('h1');
      h1.innerHTML = exsersice.name_original;

      const p = document.createElement('p');
      p.innerHTML = `${exsersice.description}`;

      Container.appendChild(card);
      card.appendChild(h1);
      card.appendChild(p);

      //finder det tilhørende billede
      async function getImg(url){
        const response = await fetch(url);
        const data = await response.json();

        data.results.forEach(image => {
          if(image.exercise == exsersice.id){
            const imge = document.createElement('img');
            imge.setAttribute('class', 'cardImg');
            imge.setAttribute('src', image.image);

            card.appendChild(imge);
          }
        });
        //søger for at vi tjækker alle
        if(data.next != null){
          getImg(data.next);
        }
      }
      getImg(Url+'exerciseimage/');
    }
  });
  //søger for at vi får alle øvelserne med
  if(data.next != null){
    processApi(data.next);
  }
}


//kaldes når brugeren klikker på en kategori
function defineMuscle(i) {
  if(i != MuscleGroup){
    Container.innerHTML = "";
    MuscleGroup = i;
    processApi(Url+'exercise/');
  }
}

//søger for at kategorierne bliver fremvist
categorys();
