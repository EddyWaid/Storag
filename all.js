
          }

         function SelectShake() {
            var x = document.getElementsByClassName("shake");
            var y = document.getElementsByClassName("minus");

            var i;
            for (i = 0; i < x.length; i++) {
                x[i].classList.add("shakeon");
                y[i].style.display = "block";
            }

            var z = document.getElementsByClassName("field");
            z[0].style.display = "none";
            z[1].style.display = "none";

            document.getElementById("StopShake").style.display = "block";
            }

          function StopShake() {
            var x = document.getElementsByClassName("shake");
            var y = document.getElementsByClassName("minus");

            var i;
            for (i = 0; i < x.length; i++) {
                x[i].classList.remove("shakeon");
                y[i].style.display = "none";
            }

            var z = document.getElementsByClassName("field");
            z[0].style.display = "block";
            z[1].style.display = "block";

            document.getElementById("StopShake").style.display = "none";
            }



          function ShowVignette() {
                document.getElementById("vignette").style.display = "block";
          }
          function HideVignette(){
              document.getElementById("vignette").style.display = "none";
          }
          function ShowNewFolder(){
              document.getElementById("NewFolderDiv").style.display = "block";
              window.setTimeout(() => document.getElementById("FolderText").focus(), 0);
          }

          //Test ajax aggiungi Cartella

          document.getElementById('NewFolderForm').addEventListener('submit', SendFolderPhp, false);
          function SendFolderPhp(e){
            e.preventDefault();

            var name = document.getElementById('FolderText').value;
            var params = "name="+name;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'php/NewCartella.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function(){

              document.getElementById('NewFolderDiv').classList.add('shake');
              document.getElementById('NewFolderDiv').innerHTML = '<a href="stor.php?n='+name+'">'
                                                                  +'<img src="css/imag/fol1.png" height="70" style="position:relative; z-index: 100;">'
                                                                  +'<header style="width: 61; position:absolute; color:white; z-index:100;">'+name+'</header>'
                                                                  +'<img class="minus" src="css/imag/minus.png" style=" display:none; top: -80px;right: -52px;height: 24px;position:relative; z-index: 100;">'
                                                                  +'</a>';
              document.getElementById('NewFolderDiv').removeAttribute('id');

              document.getElementById('Body').innerHTML += '<div id="NewFolderDiv" style="display:none;" >'
                                                          +'<form  id="NewFolderForm" >'
                                                          +'<img src="css/imag/fol1.png" height="70" style="position:relative; z-index: 100;">'
                                                          +'<img src="css/imag/plus.png"  style="top: 7; right: 45; height: 18;position:relative; z-index: 100;">'
                                                          +'<br>'
                                                          +'<input name="NewFolderName" id="FolderText" type="text" style="  width: 85; z-index: 100; position: relative; color: white; border: none;background: rgba(255,255,255,0);"></input>'
                                                          +'</form>'
                                                          +'</div>'
            }

            xhr.send(params);
          }
