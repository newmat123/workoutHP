<script type="text/javascript">

  //henter al dataen fra api'en og gemmer dataen.

  async function fetchApi(url) {
    //henter data
    //sørger for at vi får så meget data som muligt, at det hele er på engelsk og at dataen er godkendt. ellers ville en del af resultaterne være tests.
    const response = await fetch(url+'?limit=20000000&language=2&status=2');
    const data = await response.json(); //sørger for at det er json.
    return data;
  }


  async function getData() {
    //sørger for at det er den rigtige url.
    DataCategorys = await fetchApi(Url+'exercisecategory/');
    DataExsesice = await fetchApi(Url+'exercise/');
    DataImg = await fetchApi(Url+'exerciseimage/');
    DataInfo = await fetchApi(Url+'exerciseinfo/');
  }

</script>
