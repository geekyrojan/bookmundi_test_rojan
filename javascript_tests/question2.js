
for(var i = 0; i<3; i++){
    var xmlHttp = new XMLHttpRequest();   // new HttpRequest instance
    xmlHttp.open("POST", "https://reqres.in/api/users", false);
    xmlHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlHttp.send(JSON.stringify({name: "Morpheus"+i, "job":"Leader"}));
    console.log(xmlHttp.responseText);
}