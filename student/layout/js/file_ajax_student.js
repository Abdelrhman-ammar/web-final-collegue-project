 $(document).ready(function(){
                
       
     $.ajax({
          type: "GET",
          url: "dashbord.php",
          data: { },
          success: function(data){
               $('#using_ajax').html(data);
          }
     });
     
     
});
function destination(going_to) {
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             document.getElementById("using_ajax").innerHTML = this.responseText;
         }
     };

     xhttp.open("GET", going_to, true);
     xhttp.send();
 }