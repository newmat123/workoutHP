<script type="text/javascript">

  //bearbejder dataen og fremviser den for brugen.

  //modtager dataen og danner kortene derefter.
  function createCard(name, description, image, id) {

    //indeholder de forskellige html tags som bruges i kortene.
    var element = ['div','h1','p','div'];
    var arr = [];

    //danner alle html tags.
    for (var i = 0; i < element.length; i++) {
      arr.push(document.createElement(element[i]));
    }

    arr[0].setAttribute('class', 'card');
    arr[0].setAttribute('onclick', 'exstendedInfo('+id+')'); //klikker man på den kalder den exstendedInfo(id).

    //sætter navnet.
    arr[1].innerHTML = name;

    //sætter en grænse på længden af description.
    description = description.substring(0, 200)
    if(description.length > 10){
      arr[2].innerHTML = `${description}`;
    }

    arr[3].setAttribute('class', 'ReadMoreB');
    arr[3].innerHTML = 'Click to read more';

    //tilføjer det hele til siden.
    Container.appendChild(arr[0]);
    for (var i = 1; i < arr.length; i++) {
      arr[0].appendChild(arr[i]);
    }

    //finder den main billeder der er og tilføjer dem til siden.
    if(image != null){
      for (var i = 0; i < image.length; i++) {
        if(image[i].is_main){
          const imge = document.createElement('img');
          imge.setAttribute('class', 'cardImg');
          imge.setAttribute('src', image[i].image);
          arr[0].appendChild(imge);
        }
      }
    }

    //og til sidst tilføjer vi "Click to read more" teksten.
    arr[0].appendChild(arr[3]);
  }


  //bearbejder dataen.
  async function processApi() {

    //venter på data hvis den ikke er hentet.
    while(DataExsesice == null || DataImg == null || DataInfo == null){//------------------------nyt
      console.log("waitnig for data");
      await new Promise(r => setTimeout(r, 500));
    }

    //looper gennem alle resultaterne
    DataExsesice.results.forEach(exsersice => {

      //tjekker om der er fyld på, om det er den rigtige kategori
      if(exsersice.description != "" && exsersice.category == MuscleGroup){
        var imgs = [];

        //finder det tilhørende billeder
        DataImg.results.forEach(image => {
          if(image.exercise == exsersice.id){
            imgs.push(image);
          }
        });

        //kalder funktionen som danner kortene og videregiver dataen.
        createCard(exsersice.name_original, exsersice.description, imgs, exsersice.id);
      }
    });
  }


  //danner det kort som viser al infoen.
  function exstendedInfo(id) {

    //tommer siden og resetter MuscleGroup.
    Container.innerHTML = "";
    MuscleGroup = null;

    DataExsesice.results.forEach(exsersice => {

      //chekker om det er den specifike øvelse der er tale om.
      if(exsersice.id == id){

        var imgs = [];
        var musclesgroups = null;
        var musclesgroupssecond = null;
        var curentCategory = null;
        var eqepment = null;

        //finder de tilhørende billeder og gemmer dem.
        DataImg.results.forEach(image => {
          if(image.exercise == exsersice.id){
            imgs.push(image.image);
          }
        });

        //tjekker efter info og gemmer det der er relevant.
        DataInfo.results.forEach(infos => {
          if(infos.name == exsersice.name){

            curentCategory = infos.category.name
            musclesgroups = infos.muscles.name;
            musclesgroupssecond = infos.muscles_secondary.name;
            eqepment = infos.equipment.name;
          }
        });

        //indeholder de forskellige html tags skal bruges.
        var element = ['div','h1','p','p','p','p','p','p','p'];
        var arr = [];

        //danner alle html tags.
        for (var i = 0; i < element.length; i++) {
          arr.push(document.createElement(element[i]));
        }

        //sætter clase navn og description.
        arr[0].setAttribute('class', 'card special');
        arr[1].innerHTML = exsersice.name;
        arr[2].innerHTML = exsersice.description;

        //tjekker om der er noget data i de forskellige variabler.
        if(curentCategory != null){
          //hvis ja, viser vi det på siden.
          arr[3].innerHTML = `Category: ${curentCategory}`;
        }
        if(musclesgroups != null){
          arr[4].innerHTML = `musclesgroups: ${musclesgroups}`;
        }
        if(musclesgroupssecond != null){
          arr[5].innerHTML = `secondary muscles: ${musclesgroupssecond}`;
        }
        if(eqepment != null){
          arr[6].innerHTML = `eqepment: ${eqepment}`;
        }

        //viser hvem der har skrevet det og hvornår.
        arr[7].innerHTML = `creator: ${exsersice.license_author}`;
        arr[8].innerHTML = exsersice.creation_date;

        //tilføjer det til siden.
        Container.appendChild(arr[0]);
        for (var i = 1; i < arr.length; i++) {
          arr[0].appendChild(arr[i]);
        }

        //hvis der er billeder tilføjer vi også dem.
        if(imgs != null){

          for (var i = 0; i < imgs.length; i++) {
            const imge = document.createElement('img');
            imge.setAttribute('class', 'cardImg');
            imge.setAttribute('src', imgs[i]);
            arr[0].appendChild(imge);
          }
        }

        //så tilføjer vi personen som har skrevet det og datoen.
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

</script>
