var domElement = function(selector) {
    this.selector = selector || null;
    this.element = null;
};

//Initialize Element from Query Selector
domElement.prototype.init = function() {
    this.element = document.querySelector(this.selector);
};


//Get & Set Values
domElement.prototype.val = function(value){
    if(this.element.type == "text"){
        return (value !== undefined ? this.element.value = value : this.element.value);
    }
    else if(this.element.type == "checkbox"){
        return document.querySelector(this.selector+":checked").value;
    }
    else if(this.element.nodeName == "SELECT"){
        return (value !== undefined ? this.element.value = value : this.element.value);
    }
    else{
         return false;
    }
}

//Set Prop for Checked
domElement.prototype.prop = function(attr,value){
    if(attr == 'checked'){
        this.element.checked = value;
    }
}

//Change Class
domElement.prototype.changeClass = function(className){
    this.element.className = className;
}

//Access Data Set
domElement.prototype.data = function(name){
    return this.element.dataset[name];
}

//Insert Element After current element
domElement.prototype.insertElementAfter = function(elementName, html){
    var newElement = document.createElement(elementName);
    newElement.innerHTML = html;
    this.element.parentNode.insertBefore(newElement, this.element.nextSibling);
}

//Insert Element Before Current Element
domElement.prototype.insertElementBefore = function(elementName, html){
    var newElement = document.createElement(elementName);
    newElement.innerHTML = html;
    this.element.parentNode.insertBefore(newElement, this.element);
}

//GET Request
domElement.prototype.get = function(url){
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET",url,false);
    xmlHttp.send(null);
    return xmlHttp.responseText;
}

//POST Request
domElement.prototype.post = function(data){
    var xmlHttp = new XMLHttpRequest();   // new HttpRequest instance
    xmlHttp.open("POST", data.url, false);
    xmlHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlHttp.send(JSON.stringify(data.data));
    return xmlHttp.responseText;
}

//Update InnerHTML
domElement.prototype.html = function (html){
    this.element.innerHTML = html;
}


//Make Functions accessible using $ just like jquery
$ = function(selector) {
    var el = new domElement(selector);
    el.init();
    return el;
}