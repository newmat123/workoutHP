//de forskelliger funktioner som brugeren kan benytte sig af,
//for at komme frem og tilbage på siden.

//viser de forskellige kategorier
async function showCategorys() {

  CatHolder.innerHTML="";
  Container.innerHTML="";

  DataCategorys.results.forEach(cats => {
    const element = document.createElement('div');
    element.setAttribute('class', 'muscelgroups');
    element.setAttribute('onclick', 'defineMuscle('+cats.id+')');
    element.innerHTML = cats.name;

    CatHolder.appendChild(element);
  });
}

async function Planing() {

  CatHolder.innerHTML="";
  Container.innerHTML="";

}

async function Home() {

  CatHolder.innerHTML="";
  Container.innerHTML="";

}

Home();
