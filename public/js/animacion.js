var TxtRotate = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
  };
  
  TxtRotate.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];
  
    if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }
  
    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';
  
    var that = this;
    var delta = 300 - Math.random() * 100;
  
    if (this.isDeleting) { delta /= 2; }
  
    if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
      this.isDeleting = false;
      this.loopNum++;
      delta = 500;
    }
  
    setTimeout(function() {
      that.tick();
    }, delta);
  };
  
  window.onload = function() {
    var elements = document.getElementsByClassName('txt-rotate');
    for (var i=0; i<elements.length; i++) {
      var toRotate = elements[i].getAttribute('data-rotate');
      var period = elements[i].getAttribute('data-period');
      if (toRotate) {
        new TxtRotate(elements[i], JSON.parse(toRotate), period);
      }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".txt-rotate > .wrap { border-right: 0.04em solid black }";
    document.body.appendChild(css);
  };

function verlistas(cancionid) {
  event.stopPropagation();
  document.getElementById("scriptlistas").classList.toggle('show');
  document.getElementById("menutrack" + cancionid).classList.toggle('click');
  document.getElementById("idcancion").value = cancionid;
}

function vincularlista(listaid) {
  let cancionid = document.getElementById("idcancion").value;
  window.location.href = "/vincular/" + cancionid + "/" + listaid;
  document.getElementById("idcancion").value = "";
}

function closeSideBar() {
  document.getElementById("sideBar").classList.remove('show');
}

function linkNodo(id) {
    window.location.href = "/nodo/ver/" + id;
}

function play(id) {
  document.getElementById('numCancion' + id).classList.remove('show');
  document.getElementById('simPlay' + id).classList.toggle('show');
  }

  function dontplay(id) {
  document.getElementById('simPlay' + id).classList.remove('show');
  document.getElementById('numCancion' + id).classList.toggle('show');
  }
  
function link(seccion, id) {
    window.location.href = "/" + seccion + "/" + id;
}

function eliminarcomentario(id) {
  document.getElementById('eliminarcomentario'+id).classList.remove('notshow');
}

function outeliminarcomentario(id) {
  document.getElementById('eliminarcomentario'+id).classList.toggle('notshow');
}

function reproducir(espazo,idEspazo,id) {
  var playing = document.getElementById('playing' + id);
  if (playing.value == 'false') {
    var data={"id":id};
    $.ajax({
        type: "GET",
        url: "/reproducir",
        data: data,
        success: function (data) {
            document.getElementById('espazoreproductor').innerHTML = data;
            document.getElementById('cancion' + id).classList.toggle("play");
            playing.value = 'play';
            document.getElementById("pepaxina").style.paddingBottom = "70px";
            document.getElementById("pepaxina").style.height = "120px";
            $("#espazo").val(espazo);
            $("#idEspazo").val(idEspazo);
            $("#idCancion").val(id);
        }
    });
  } else if (playing.value == 'play') {
      document.getElementById('reproduccion' + id).pause();
      playing.value = 'pause';
      document.getElementById('cancion' + id).classList.remove("play");
  } else if (playing.value == 'pause') {
    document.getElementById('reproduccion' + id).play();
    document.getElementById('cancion' + id).classList.toggle("play");
    playing.value = 'play';
  }
}

function closereproductor(id){
  document.getElementById('espazoreproductor').innerHTML = "";
  document.getElementById('playing' + id).value = 'false';
  document.getElementById('cancion' + id).classList.remove("play");
  document.getElementById("pepaxina").style.paddingBottom = "0";
  document.getElementById("pepaxina").style.height = "50px";
}



$('#reproduccion2').on('ended', function() {
  alert('hola')
   // enable button/link
});

/*audio.on("ended", () => {
    alert('hola')
    var espazo = $("#espazo").val();
    var idEspazo = $("#idEspazo").val();
    var idCancion = $("#idCancion").val();
    var data = {"espazo":espazo,"idEspazo":idEspazo,"idCancion":idCancion};
    $.ajax({
        type: "GET",
        url: "/reproducirSeguinte",
        data: data,
        success: function (data) {
            document.getElementById('espazoreproductor').innerHTML = data;
            $("#idCancion").val(id);
        }
    });
}); */

    

