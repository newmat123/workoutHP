//muskel gruppen brugeren kigger på
var MuscleGroup;

//de forskellige dataset
var DataExsesice = null;
var DataImg = null;
var DataInfo = null;

//rooten af apien
const Url = 'https://wger.de/api/v2/';

//holder kategorierne
const CatHolder = document.getElementById('categories');

//finner og holder containerens plads
const Main = document.getElementById('root');
const Container = document.createElement('div');
Container.setAttribute('class', 'container');
Main.appendChild(Container);


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
  if(DataExsesice == null || DataImg == null || DataInfo == null){
    DataExsesice = await fetchApi(Url+'exercise/');
    DataImg = await fetchApi(Url+'exerciseimage/');
    DataInfo = await fetchApi(Url+'exerciseinfo/');
  }
}


//modtager info og danner kortne udfra det
function createCard(name, description, image, id) {

  var element = ['div','h1','p','div'];
  var arr = [];

  for (var i = 0; i < element.length; i++) {
    arr.push(document.createElement(element[i]));
  }

  arr[0].setAttribute('class', 'card');
  arr[0].setAttribute('onclick', 'exstendedInfo('+id+')');

  arr[1].innerHTML = name;

  description = description.substring(0, 200)
  if(description.length > 10){
    arr[2].innerHTML = `${description}`;
  }else {
    arr[2].innerHTML = '';
  }

  arr[3].setAttribute('class', 'ReadMoreB');
  arr[3].innerHTML = 'Klick to read more';

  Container.appendChild(arr[0]);
  for (var i = 1; i < arr.length; i++) {
    arr[0].appendChild(arr[i]);
  }

  if(image != null){

    for (var i = 0; i < image.length; i++) {
      const imge = document.createElement('img');
      imge.setAttribute('class', 'cardImg');
      imge.setAttribute('src', image[i]);
      arr[0].appendChild(imge);
    }
  }
  arr[0].appendChild(arr[3]);
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
      createCard(exsersice.name_original, exsersice.description, imgs, exsersice.id);
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
      var musclesgroups = null;
      var musclesgroupssecond = null;
      var curentCategory = null;
      var eqepment = null;

      //finder det tilhørende billede
      DataImg.results.forEach(image => {
        if(image.exercise == exsersice.id){
          imgs.push(image.image);
        }
      });

      DataInfo.results.forEach(infos => {
        if(infos.name == exsersice.name){

          curentCategory = infos.category.name
          musclesgroups = infos.muscles.name;
          musclesgroupssecond = infos.muscles_secondary.name;
          eqepment = infos.equipment.name;

        }
      });

      var element = ['div','h1','p','p','p','p','p','p','p'];
      var arr = [];
      for (var i = 0; i < element.length; i++) {
        arr.push(document.createElement(element[i]));
      }

      arr[0].setAttribute('class', 'card');
      arr[1].innerHTML = exsersice.name;
      arr[2].innerHTML = exsersice.description;
      arr[3].innerHTML = curentCategory;
      arr[4].innerHTML = `musclesgroups: ${musclesgroups}`;
      arr[5].innerHTML = `secondary muscles: ${musclesgroupssecond}`;
      arr[6].innerHTML = `eqepment: ${eqepment}`;
      arr[7].innerHTML = `creator: ${exsersice.license_author}`;
      arr[8].innerHTML = exsersice.creation_date;

      Container.appendChild(arr[0]);
      for (var i = 1; i < arr.length; i++) {
        arr[0].appendChild(arr[i]);
      }

      if(imgs != null){

        for (var i = 0; i < imgs.length; i++) {
          const imge = document.createElement('img');
          imge.setAttribute('class', 'cardImg');
          imge.setAttribute('src', imgs[i]);
          arr[0].appendChild(imge);
        }
      }

      arr[0].appendChild(arr[7]);
      arr[0].appendChild(arr[8]);
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
