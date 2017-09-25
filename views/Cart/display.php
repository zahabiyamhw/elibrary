<div>
    <table id="cartdata">
      
    </table>
      <p align="right">
            <label>
                total :
            </label>
            <value id="total"></value> 
        </p>
    
    <button class="btn btn-warning">Buy now</button>
    
</div>

<script>
    $(document).ready(function(){
        var user = getuser();
        var valuesobj;
        var total;
        if(user!="-1"){
        $.ajax({
            type:'post',
            url:'http://localhost:8080/Nathan-MVC-master/cart/getCartDetails/'+user,
            success:function(response){
                if(response!="failed"){
                    total=0;
                    var k = JSON.parse(response);
                    valuesobj = response;
                    document.getElementById("cartdata").innerHTML +="<tr class='row'><th class='col-sm-2'>DELETE</th><th class='col-sm-1'>BOOK ID:</th><th class='col-sm-4'>NAME :</th><th class='col-sm-2'>COUNT :</th><th class='col-sm-2'>COST :</th></tr>";
                    for(i=0;i<k.length;i++){
                           
                            document.getElementById("cartdata").innerHTML += "<tr class='row'>"
                                                                            +"<td class='col-sm-2' id='"+k[i].id+"' onclick='delclick("+k[i].id+"/"+i+")'><i class='fa fa-times'></i></td>"+
                                                                            "<td class='col-sm-1'>"+k[i].book_id+"</td>"
                                                                            +"<td class='col-sm-4'>"+k[i].name+"</td>"
                                                                            +"<td class='col-sm-2'>"+k[i].count+"</td>"
                                                                            +"<td class='col-sm-2'>"+k[i].amount+"</td></tr>";
                            total += parseInt(k[i].count)*parseInt(k[i].amount);                                        
                    }
                    document.getElementById("total").innerHTML = total;
                }
                else{
                    document.getElementById("cartdata").innerHTML = "no elements in your cart";
                
                }
    }
        });
        }
        else{
                    document.getElementById("cartdata").innerHTML = "Please login to continue";
        }
});


function delclick(x){
    var j = x.split("/");
    console.log(x + " was clicked");
    $.ajax({
            type:'post',
            url:'http://localhost:8080/Nathan-MVC-master/cart/delCart/'+user,
            data:{
                'cartid' : j[0]
            },
            success:function(response){
                if(response!="failed"){
                   document.getElementById(x).parentNode.removeChild(j[1]);
                }
            }
        });
    
}
    
</script>