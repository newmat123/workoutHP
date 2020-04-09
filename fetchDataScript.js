//henter al dataen fra apien og gemmer dataen.

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
