 var customSelectEle, i, j, selElmnt, divEle, divEleSelected, c;
   customSelectEle = document.querySelector(".customSelect");
   selElmnt = customSelectEle.getElementsByTagName("select")[0];
   divEle = document.createElement("DIV");
   divEle.setAttribute("class", "select-selected");
   divEle.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
   customSelectEle.appendChild(divEle);
   divEleSelected = document.createElement("DIV");
   divEleSelected.setAttribute("class", "select-items select-hide");
   Array.from(selElmnt).forEach((item, index) => {
      c = document.createElement("DIV");
      c.innerHTML = selElmnt.options[index].innerHTML;
      c.addEventListener("click", function(e) {
         var y, i, k, selEleParent, selEleSibling;
         selEleParent = this.parentNode.parentNode.getElementsByTagName( "select" )[0];
         selEleSibling = this.parentNode.previousSibling;
         for (i = 0; i < selEleParent.length; i++) {
            if (selEleParent.options[i].innerHTML == this.innerHTML) {
               selEleParent.selectedIndex = i;
               selEleSibling.innerHTML = this.innerHTML;
               y = this.parentNode.getElementsByClassName("sameSelected");
               for (k = 0; k < y.length; k++) {
                  y[k].removeAttribute("class");
               }
               this.setAttribute("class", "sameSelected");
               break;
            }
         }
         selEleSibling.click();
      });
      divEleSelected.appendChild(c);
   });
   customSelectEle.appendChild(divEleSelected);
   divEle.addEventListener("click", function(e) {
      e.stopPropagation();
      closeSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
   });
   function closeSelect(elmnt) {
      var customSelectEle,
      y,
      i,
      arrNo = [];
      customSelectEle = document.getElementsByClassName("select-items");
      y = document.getElementsByClassName("select-selected");
      for (i = 0; i < y.length; i++) {
         if (elmnt == y[i]) {
            arrNo.push(i);
         }
         else {
            y[i].classList.remove("select-arrow-active");
         }
      }
      for (i = 0; i < customSelectEle.length; i++) {
         if (arrNo.indexOf(i)) {
            customSelectEle[i].classList.add("select-hide");
         }
      }
   }
   document.addEventListener("click", closeSelect);