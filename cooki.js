var cookies = document.cookie;

function getuser(){
    var userval="";
   if(cookies!==''){
        var vals = cookies.split(";");
        
        if(vals.length>0){

            for(i=0;i<vals.length;i++){
                   var secsplit= vals[i].split("=");
                   console.log(secsplit);
                   if(secsplit[0]==="user" && secsplit[1]!=''){
                       userval = secsplit[1];
                       break;
                   }
                   else{
                       userval = "-1";

                   }
            }


        }
    }
    else{
        userval="-1";
    }
    console.log(userval);
    return userval;
}



function getname(){
    var vals = cookies.splie(";");
    var userval="";
    if(vals.length>0){

        for(i=0;i<vals.length;i++){
               var secsplit= vals[i].split("=");
               if(secsplit[0]==="name" && secsplit[1]!=''){
                   userval = secsplit[1];
                   break;
               }
               else{
                   userval = "-1";
                   
               }
        }
        
    }
    
    return userval;
}
