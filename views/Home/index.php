<div class="wrapper"></br>
    </br>
  <div class='centalign' align='center'>
    <div id="myCarousel"  class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img id='slide1' src="" alt="Chania">
        <div class="carousel-caption">
        
        <h3 id='slide1caption'> </h3>
      </div>
      </div>

      <div class="item">
        <img id ='slide2' src="" alt="slide1" >
        <div class="carousel-caption">
        
        <h3 id='slide2caption'> </h3>
      </div>
        
      </div>
    
      <div class="item">
        <img id='slide3' src="" alt="slide2">
        <div class="carousel-caption">
        
        <h3 id='slide3caption'> </h3>
      </div>
      </div>

      <div class="item">
        <img id='slide4' src="" alt="slide3">
        <div class="carousel-caption">
        
        <h3 id='slide4caption'> </h3>
      </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>    
    
    <h2 style="text-align: center;">Recommendations</h2>
    
    <div id="recommendations" >
        
    </div>
</div>

    
<script>
var cooki = document.cookie;
var final ="";
if(cooki===''){
    final = "-1";
}
else{
    
    var vals = cooki.split(";");
    var usercooki = vals[0].split("=");
       if(usercooki[1]==''){
           final ="-1";
       }
       else{
        final = usercooki[1];
        }
}

console.log(usercooki);
var z="";


  
$.ajax({
                
                type:"post",
                url:"http://localhost:8080/Nathan-MVC-master/user/behaviour",
                data:{
                    'user' : final
                },
                success:function(response){
                    console.log("response is "+response);
                    if(response !== "failed"){
                        var f;
                        console.log(response);
                        k = JSON.parse(response);
                        if(k.length%3==0 || k.lenght<3){
                            f = k.length;
                        }
                        else{
                            f = k.length-1;
                        }
                        // var j=0;
                      
                        for(j=0;j<k.length-1;j+=3){
                                    z+= "<div class='row'>";
                                    z += "<div class='col-sm-3 recommend height'><div class='row'><img src='http://localhost:8080/images/("+k[j].id+").jpg' width='300' height='200' /></div><div class='row>'<p class='recommend-link'><a  href='http://localhost:8080/Nathan-MVC-master/book/display/"+k[j].id+"'>"+k[j].name+"</a><p>Price :"+k[j].price+"₹</p><p>Category: "+k[j].category+"</p></div></div>";
                                    z +="<div class='col-sm-1'></div>";
                                    z += "<div class='col-sm-3 recommend height'><div class='row'><img src='http://localhost:8080/images/("+k[j+1].id+").jpg' width='300' height='200' /></div><div class='row>'<p class='recommend-link'><a  href='http://localhost:8080/Nathan-MVC-master/book/display/"+k[j+1].id+"'>"+k[j+1].name+"</a><p>Price :"+k[j+1].price+"₹</p><p>Category: "+k[j+1].category+"</p></p></div></div>";
                                    z +="<div class='col-sm-1'></div>";
                                    z += "<div class='col-sm-3 recommend height'><div class='row'><img src='http://localhost:8080/images/("+k[j+2].id+").jpg' width='300' height='200' /></div><div class='row>'<p class='recommend-link'><a  href='http://localhost:8080/Nathan-MVC-master/book/display/"+k[j+2].id+"'>"+k[j+2].name+"</a><p>Price :"+k[j+2].price+"₹</p><p>Category: "+k[j+2].category+"</p></p></div></div>";
                                    z+= "</div>";
                                    z+="</br></br></br></br></br></br>";
                         }
                      document.getElementById("recommendations").innerHTML =z;  
                      for(i=1;i<=4;i++){
                          document.getElementById("slide"+i).src="http://localhost:8080/images/("+k[i].id+").jpg";
                          document.getElementById("slide"+i+"caption").innerHTML ="<a href='http://localhost:8080/Nathan-MVC-master/book/display"+k[i].id+"'>"+k[i].name+"</br>Price:&nbsp;"+k[i].price+"₹</a>";
                      }
                     
                    }
                    
       }
   });
   
</script>

