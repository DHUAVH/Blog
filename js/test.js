var XMLHTTP;

//创建XMLHttpRequest对象的函数
function GetXmlHttpBbject(){
    var XMLHTTP = null;
    try{
        // Firefox, Opera 8.0+, Safari
        XMLHTTP = new XMLHttpRequest();   //使用window.XMLHttpRequest对象创建XMLHttpRequest对象
    }
    catch(e){
         // Internet Explorer
        try{
            //使用微软最新版本的 "Msxml2.XMLHTTP"创建对象
            XMLHTTP = new ActiveXObject("Msxml2.HTTP");  
        }
        catch{
            //使用"Microsoft.HTTP"创建对象
            XMLHTTP = new ActiveXObject("Microsoft.HTTP");
        }      
    }
    return XMLHTTP;
}

//响应HTTP状态改变的函数
function StateChanged(){
    if(XMLHTTP.readystate == 4 || XMLHTTP.readystate == "complete"){
        //TODO
    }
}

XMLHTTP = GetXmlHttpBbject();      //创建XMLHttpRequest对象
XMLHTTP.onreadystetechange = stateChanged();    //调用响应HTTP状态改变的函数
XMLHTTP.open("GET",url,true);     //通过GET方法用给定的URL打开创建的XMLHttpRequest对象
XMLHTTP.send();     //向服务器发送HTTP请求