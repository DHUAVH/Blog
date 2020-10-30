var XMLHttp;

function GetXmlHttpObject() {
    var XMLHttp;
    
    try{
         // Firefox, Opera 8.0+, Safari
        XMLHttp = new XMLHttpRequest();
    }
    catch(e){
        // Internet Explorer
        try{
            XMLHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e){
            XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }

    return XMLHttp;
}

function stateChanged() {
    if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
        document.getElementById("result").innerHTML = xmlHttp.responseText;
    }   
}

function showHint(str) {
    if(str.length == 0){
        document.getElementById("result").innerHTML = "";
        return;
    }

    xmlHttp = GetXmlHttpObject();

    if(xmlHttp == null){
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "search.php?keyword=" + str; 
    xmlHttp.onreadystatechange = stateChanged;
    xmlHttp.open("GET",url,true);
    xmlHttp.send();
}
