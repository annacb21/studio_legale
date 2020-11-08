// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "1.5em 2em";
    document.getElementById("logo").style.width = "35px";
  } else {
    document.getElementById("navbar").style.padding = "3em 2em";
    document.getElementById("logo").style.width = "50px";
  }
}