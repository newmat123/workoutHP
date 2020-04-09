//indeholder alle variabler som benyttes i programmet.

//de forskellige dataset
var DataCategorys = null;
var DataExsesice = null;
var DataImg = null;
var DataInfo = null;

//rooten af apien
const Url = 'https://wger.de/api/v2/';

//muskel gruppen brugeren kigger på
var MuscleGroup;


//holder kategorierne
const CatHolder = document.getElementById('categories');

//finner og holder containerens plads
const Main = document.getElementById('root');
const Container = document.createElement('div');
Container.setAttribute('class', 'container');
Main.appendChild(Container);
