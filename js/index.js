var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

var close = document.getElementsByClassName("closebtn");
var a;

for (a = 0; a < close.length; a++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}


  $('#display_advance').click(function() {
    $("span", this).toggleClass("glyphicon glyphicon-eye-open glyphicon glyphicon-eye-close");
});

function time() {
   var today = new Date();
   var weekday=new Array(7);
   weekday[0]="Sunday";
   weekday[1]="Monday";
   weekday[2]="Tuesday";
   weekday[3]="Wednesday";
   weekday[4]="Thursday";
   weekday[5]="Friday";
   weekday[6]="Saturday";
   var day = weekday[today.getDay()];
   var dd = today.getDate();
   var mm = today.getMonth()+1; //January is 0!
   var yyyy = today.getFullYear();
   var h=today.getHours();
   var m=today.getMinutes();
   var s=today.getSeconds();
   m=checkTime(m);
   s=checkTime(s);
   nowTime = h+":"+m+":"+s;
   if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day+', '+ dd+'/'+mm+'/'+yyyy;

   tmp='<span class="date">'+today+' | '+nowTime+'</span>';

   document.getElementById("clock").innerHTML=tmp;

   clocktime=setTimeout("time()","1000","JavaScript");
   function checkTime(i)
   {
      if(i<10){
     i="0" + i;
      }
      return i;
   }
}
