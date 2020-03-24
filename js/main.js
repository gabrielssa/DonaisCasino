function include(filename, onload) {
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.src = filename;
    script.type = 'text/javascript';
    script.onload = script.onreadystatechange = function() {
        if (script.readyState) {
            if (script.readyState === 'complete' || script.readyState === 'loaded') {
                script.onreadystatechange = null;                                                  
                onload();
            }
        } 
        else {
            onload();          
        }
    };
    head.appendChild(script);
}

include('https://code.jquery.com/jquery-3.4.1.min.js', function() {
    $(document).ready(function() {
        alert('the DOM is ready');
    });
});

let options = document.getElementsByClassName("option");

for (let element of options){
    element.addEventListener("mouseenter", function(){
        btn1.play();
    },false);
}

let sorte1 = document.getElementById("sorte1");

sorte1.addEventListener("click", function(){

        $personagem = prompt("Digite o nome do personagem");

        $.post("process.php", {personagem: $personagem, tipo: "sorte1"}, function(results){
            alert(results);
        });

}, false);

let sorte2 = document.getElementById("sorte2");

sorte2.addEventListener("click", function(){

        $personagem = prompt("Digite o nome do personagem");

        $.post("process.php", {personagem: $personagem, tipo: "sorte2"}, function(results){
            alert(results);
        });

}, false);

//Controladores de áudio

let audioPlay = document.getElementById("audio-play");

audioPlay.addEventListener("click", function(){
    song.play();
},false)

let audioStop = document.getElementById("audio-stop");

audioStop.addEventListener("click", function(){
    song.stop();
},false)