//de forskellige dataset
var DataCategorys = null;
var DataExsesice = null;
var DataImg = null;
var DataInfo = null;

//rooten af apien
const Url = 'https://wger.de/api/v2/';

//var i = new FileReader()
//i.readAsText(fil, "UTF-16")

//var reader = new FileReader();
//reader.onload = function(event) {
//    var contents = event.target.result;
//    console.log("File contents: " + contents);
//};  https://humanwhocodes.com/blog/2012/05/15/working-with-files-in-javascript-part-2/

//reader.onerror = function(event) {
//    console.error("File could not be read! Code " + event.target.error.code);
//};

//reader.readAsText(file);

var i = new FileReader()
i.readAsText(fil, "UTF-16")

async function fetchApi(url) {
  //henter data
  const response = await fetch(url+'?limit=20000000&language=2&status=2');
  const data = await response.json();
  return data;
}

async function getData() {
  DataCategorys = await fetchApi(Url+'exercisecategory/');
  DataExsesice = await fetchApi(Url+'exercise/');
  DataImg = await fetchApi(Url+'exerciseimage/');
  DataInfo = await fetchApi(Url+'exerciseinfo/');
}


getData();

//hent dataen her og gem i en ny fil
