       function changeclass() {
           if ($("#form-co").hasClass("dp-block") & $("#form-insc").hasClass("dp-none")) {
               var element = document.getElementById("form-co");
               element.classList.toggle("dp-none");
               element.classList.remove("dp-block");
               var element = document.getElementById("form-insc");
               element.classList.toggle("dp-block");
               element.classList.remove("dp-none");
               var element = document.getElementById("btn-co");
               element.classList.toggle("fnd-blanc");
               element.classList.remove("fnd-bleu");
               var element = document.getElementById("btn-insc");
               element.classList.toggle("fnd-bleu");
               element.classList.remove("fnd-blanc");
           }
       }

       function resetclass() {
           if ($("#form-insc").hasClass("dp-block") & $("#form-co").hasClass("dp-none")) {
               var element = document.getElementById("form-co");
               element.classList.toggle("dp-block");
               element.classList.remove("dp-none");
               var element = document.getElementById("form-insc");
               element.classList.toggle("dp-none");
               element.classList.remove("dp-block");
               var element = document.getElementById("btn-co");
               element.classList.toggle("fnd-bleu");
               element.classList.remove("fnd-blanc");
               var element = document.getElementById("btn-insc");
               element.classList.toggle("fnd-blanc");
               element.classList.remove("fnd-bleu");
           }
       }

       function mdpForgot() {
        if ($("#form-mpd").hasClass("dp-none")) {
            var element = document.getElementById("form-mdp");
            element.classList.toggle("dp-block");
            element.classList.remove("dp-none");
        } else {
            var element = document.getElementById("form-mdp");
            element.classList.toggle("dp-none");
            element.classList.remove("dp-block");
        }
    }

    function mdpForgotInsc() {
        if ($("#form-mpd-insc").hasClass("dp-none")) {
            var element = document.getElementById("form-mdp-insc");
            element.classList.toggle("dp-block");
            element.classList.remove("dp-none");
        } else {
            var element = document.getElementById("form-mdp-insc");
            element.classList.toggle("dp-none");
            element.classList.remove("dp-block");
        }
    } 