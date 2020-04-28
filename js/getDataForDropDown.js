function getData(selectID, dataArr){
    let list=document.getElementById(selectID);

    list.options.length=0;

    list.options[0] = new Option('--Select--', '');
    //list.options[1] = new Option('All','All');   

    for(let x =0;x<dataArr.length;x++){

        option = document.createElement("option");
        option.value = dataArr[x];
        option.text = dataArr[x];
        list.add(option);
    }

}

function getDataNoAll(selectID, dataArr){
    let list=document.getElementById(selectID);

    list.options.length=0;

    list.options[0] = new Option('--Select--', ''); 

    for(let x =0;x<dataArr.length;x++){
        option = document.createElement("option");
        option.value = dataArr[x];
        option.text = dataArr[x];
        list.add(option);
    }

}