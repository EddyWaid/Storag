
nam = [];
a = 0;
dir = [];

function back(){
  if(!document.getElementById('back').classList.contains('disabled')){
    carica('b');
  }
}
function forward(){
  if(!document.getElementById('forward').classList.contains('disabled')){
    carica('f');
  }
}
function empty(){
  let c = 1;
  while (dir[a+c]) {
    dir[a+c] = undefined;
    c++;
  }
}

// SHOW/HIDE vignette
function ShowVignette() {
  document.getElementById("vignette").style.display = "block";
}
function hideVignette(){
  document.getElementById("vignette").style.display = "none";
  document.getElementById('vignette').style.height = '100';
  document.getElementById('rightPoint').style.top = '48%';
  document.getElementById('vignetteFile').style.display = '';
  document.getElementById('vignetteFolder').style.display = '';
  document.getElementById('dropArea').style.display= 'none';
}

//DIRECTORY ON TOP
function changeDirectory(x){
  if(x){
    nam[a] = x;
    document.getElementById('dirName').innerHTML = nam[a];
  }
  else {
    if(a==0){
      document.getElementById('dirName').innerHTML = 'HOME';
    }
    else {
      document.getElementById('dirName').innerHTML = nam[a];
    }
  }
}



// SHOW new folder icon
function ShowNewFolder(){
  document.getElementById("NewFolderDiv").style.display = "block";
  window.setTimeout(() => document.getElementById("FolderText").focus(), 0);
}

// SHOW new file area
function showDrop()
{
  document.getElementById('dropArea').style.display= 'block';
  document.getElementById('vignette').style.height = '200';
  document.getElementById('rightPoint').style.top = '74%';
  document.getElementById('vignetteFile').style.display = 'none';
  document.getElementById('vignetteFolder').style.display = 'none';
}


// BUTTON delete START shake
function SelectShake(){
  var x = document.getElementsByClassName("shake");
  var y = document.getElementsByClassName("minus");

  var i;
  for (i = 0; i < x.length; i++){
    x[i].classList.add("shakeon");
    y[i].style.display = "block";
  }

  var z = document.getElementsByClassName("downButt");
  for (i = 0; i < z.length; i++){
    z[i].style.display = "none";
  }

  document.getElementById("StopShake").style.display = "block";

  var list = document.getElementsByTagName("A");
  for (i = 0; i < list.length; i++){
    list[i].style.pointerEvents = "none";
  }
}



// BUTTON v STOP shake
function StopShake(){
  var x = document.getElementsByClassName("shake");
  var y = document.getElementsByClassName("minus");

  var i;
  for (i = 0; i < x.length; i++){
    x[i].classList.remove("shakeon");
    y[i].style.display = "none";
  }

  var z = document.getElementsByClassName("downButt");
  for (i = 0; i < z.length; i++){
    z[i].style.display = "block";
  }
  document.getElementById("StopShake").style.display = "none";

  var list = document.getElementsByTagName("A");
  for (i = 0; i < list.length; i++){
    list[i].style.removeProperty("pointer-events");
  }
}




/* MOSTRA MODAL*/
function ShowModal(p){
  document.getElementById("modal").style.display = "block";
  minus=  p;
}


/*HIDE FROM CLICK*/
window.onclick = function(event){
  if (event.target == document.getElementById("Body")){
    StopShake();
    if(document.getElementById("vignette").style.display == 'block'){
      hideVignette();
    }
    if(document.getElementById("NewFolderDiv").style.display == "block"){
      sendFolderPhp();
    }
  }
  if (event.target == document.getElementById("modal")){
  document.getElementById("modal").style.display = "none";
  }
}

/* HIDE MODAL */
function hideModal(){
    document.getElementById("modal").style.display = "none";
}



/* HIDE/SHOW MENU BOTTOM LEFT */
function hideMenu(){
  document.getElementById('menu').style.display = 'none';
  document.cookie = "menu=; expires= Thu, 01 Jan 1970 00:00:00 GMT;path=/";
}
function showMenu(){
  document.getElementById('menu').style.display = 'block';
  setCookie('menu','c',7);
}




/* COOKIES */
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function checkCookie(cname){
  let name = getCookie(cname);
  if(name != "")
  {
    return name;
  }
  else
  {
    return 'no';
  }
}
