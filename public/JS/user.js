       function showInfoOne() {
           if ($("#order-one").hasClass("dp-none")) {
               var element = document.getElementById("order-one");
               element.classList.toggle("dp-flex");
               element.classList.remove("dp-none");
               var element = document.getElementById("footer");
               element.classList.toggle("footer-absolute");
           } else {
               var element = document.getElementById("order-one");
               element.classList.toggle("dp-none");
               element.classList.remove("dp-flex");
               var element = document.getElementById("footer");
               element.classList.remove("footer-absolute");
           }
       }

       function showInfoTwo() {
           if ($("#order-two").hasClass("dp-none")) {
               var element = document.getElementById("order-two");
               element.classList.toggle("dp-flex");
               element.classList.remove("dp-none");
               var element = document.getElementById("footer");
               element.classList.toggle("footer-absolute");
           } else {
               var element = document.getElementById("order-two");
               element.classList.toggle("dp-none");
               element.classList.remove("dp-flex");
               var element = document.getElementById("footer");
               element.classList.remove("footer-absolute");
           }
       }

        function showInfoThree() {
           if ($("#order-three").hasClass("dp-none")) {
               var element = document.getElementById("order-three");
               element.classList.toggle("dp-flex");
               element.classList.remove("dp-none");
               var element = document.getElementById("footer");
               element.classList.toggle("footer-absolute");
           } else {
               var element = document.getElementById("order-three");
               element.classList.toggle("dp-none");
               element.classList.remove("dp-flex");
               var element = document.getElementById("footer");
               element.classList.remove("footer-absolute");
           }
       }