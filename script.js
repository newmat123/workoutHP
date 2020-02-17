//http://wger.de/en/software/api

//muskel gruppen brugeren kigger på
var MuscleGroup;

//de forskellige dataset
var DataExsesice = null;
var DataImg = null;

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
h1.innerHTML = 'exsersice.name';

const p = document.createElement('p');
p.innerHTML = `exsersice.discription`;

const more = document.createElement('div');
more.setAttribute('class', 'ReadMoreB');
more.innerHTML = 'Klick read more';

const imge = document.createElement('img');
imge.setAttribute('class', 'cardImg');
imge.setAttribute('src', 'imges/Hammer-Curls.jpg');

Container.appendChild(card);
card.appendChild(h1);
card.appendChild(p);
card.appendChild(imge);
card.appendChild(more);
//card example


//henter dataen ned og retunere den
async function fetchApi(url) {
  //henter data
  const response = await fetch(url+'?limit=200000&language=2&status=2');
  const data = await response.json();
  return data;
}

//henter de forskellige kategorier
async function categorys() {

  const data = await fetchApi(Url+'exercisecategory/');

  data.results.forEach(cats => {
    const element = document.createElement('div');
    element.setAttribute('class', 'muscelgroups');
    element.setAttribute('onclick', 'defineMuscle('+cats.id+')');
    element.innerHTML = cats.name;

    CatHolder.appendChild(element);
  });
  if(DataExsesice == null || DataImg == null){
    DataExsesice = await fetchApi(Url+'exercise/');
    DataImg = await fetchApi(Url+'exerciseimage/');
  }
}


//modtager info og danner kortne udfra det
function createCard(name, description, image, id, fullcard) {

  const card = document.createElement('div');
  card.setAttribute('class', 'card');
  card.setAttribute('onclick', 'exstendedInfo('+id+')');

  const h1 = document.createElement('h1');
  h1.innerHTML = name;

  const p = document.createElement('p');
  description = description.substring(0, 200)
  if(description.length > 10){
    p.innerHTML = `${description}`;
  }else {
    p.innerHTML = '';
  }

  var more = null;

  if(fullcard == true){
    //find ekstra data
  }else{
    more = document.createElement('div');
    more.setAttribute('class', 'ReadMoreB');
    more.innerHTML = 'Klick to read more';
  }

  Container.appendChild(card);
  card.appendChild(h1);
  card.appendChild(p);

  if(image != null){

    for (var i = 0; i < image.length; i++) {
      const imge = document.createElement('img');
      imge.setAttribute('class', 'cardImg');
      imge.setAttribute('src', image[i]);
      card.appendChild(imge);
    }
  }
  if(more != null){
    card.appendChild(more);
  }
}

//lopper iggennem den givne api
async function processApi() {
  //henter data hvis den ikke allerede er hentet
  if(DataExsesice == null || DataImg == null){
    DataExsesice = await fetchApi(Url+'exercise/');
    DataImg = await fetchApi(Url+'exerciseimage/');
  }
  //looper gennem alle resultaterne
  DataExsesice.results.forEach(exsersice => {
    //tjækker om der er fyld på, om det er den rigtige kattegori og om det er på engelsk
    if(exsersice.description != "" && exsersice.category == MuscleGroup){
      var imgs = [];
      //finder det tilhørende billede
      DataImg.results.forEach(image => {
        if(image.exercise == exsersice.id){
          imgs.push(image.image);
        }
      });
      createCard(exsersice.name_original, exsersice.description, imgs, exsersice.id, false);
    }
  });
}

//danner det kort som viser det hele
function exstendedInfo(id) {

  Container.innerHTML = "";
  MuscleGroup = null;

  DataExsesice.results.forEach(exsersice => {
    //tjækker om der er fyld på, om det er den rigtige kattegori og om det er på engelsk
    if(exsersice.id == id){
      var imgs = [];
      //finder det tilhørende billede
      DataImg.results.forEach(image => {
        if(image.exercise == id){
          imgs.push(image.image);
        }
      });
      createCard(exsersice.name_original, exsersice.description, imgs, exsersice.id, true);
    }
  });
}

//kaldes når brugeren klikker på en kategori
function defineMuscle(i) {
  if(i != MuscleGroup){
    Container.innerHTML = "";
    MuscleGroup = i;
    processApi();
  }
}

//søger for at kategorierne bliver fremvist
categorys();
