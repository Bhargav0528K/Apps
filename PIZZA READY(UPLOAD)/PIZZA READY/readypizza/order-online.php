<?php
include 'app-header.php';
$page_id="order-online";
$page_top_id="";
include 'DataAccessLayer.php';
$orderstr=$_POST["orderstr"];
if($orderstr!="")
{
  $user_id=$_SESSION["app_user_id"];
  $order_id=addOrder($user_id);
  $orders=explode("|",$orderstr);
  for($i=0;$i<count($orders)-1;$i++)
  {
    $item_name=$orders[$i++];
    $item_size=$orders[$i++];
    $item_qty=$orders[$i++];
    $item_amt=$orders[$i];
    addOrderItem($order_id,$item_name,$item_size,$item_qty,$item_amt);
  }

    header("location:my-orders.php");
    exit();

}

?>

<style>
body{
	background: url(images/pizzaback.jpg);

}
.smallp{
  font-size: 13px !important;
}
.jumbotron{
	    min-height: 420px;
    opacity: 0.8;
    padding-left: 0px !important;
    padding-right: 0px !important;
        min-height: 420px;
    text-align: center;
    padding-top: 20px !important;
}
.productimg{
      height: 250px;
    width: 250px;
}
.price{
      color: green;
    font-size: 15px !important;
}
.add{
  height: 20px;
    line-height: 14px;
}
</style>
  
<div class="container">  
 <!-- <img src="images/Administrator.png" class="col-sm-offset-1  col-sm-5">-->
 <div class="jumbotron col-sm-7 col-sm-offset-0" style="min-height:420px;text-align: center;">
 
  <p class="text-center" style="
    background: black;color: white;
">Please add items from below!</p><br>
 <h2 class="text-center">Pizza</h2>
    <?php
    
    $pizzas=getPizzas();
    for ($i=0;$i<count($pizzas);$i++)
    {
      echo "<div class='col-sm-6' style='padding:10px'>
  <p id='name" . $pizzas[$i]['pizza_id'] . "'>" . $pizzas[$i]['pizza_name'] . "</p>
    <img class='productimg' src='admin/".$pizzas[$i]['pizza_image']."'>
    <p class='price'>R:" . $pizzas[$i]['pizza_regularprice'] . " - M:" . $pizzas[$i]['pizza_mediumprice'] . " - L:" . $pizzas[$i]['pizza_largeprice'] . "</p>
    <select id='size" . $pizzas[$i]['pizza_id'] . "'>
    <option>Regular</option>
    <option>Medium</option>
    <option>Large</option>
    </select>
    <select id='qty" . $pizzas[$i]['pizza_id'] . "'>
    <option>0</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
    </select>
    <input type='hidden' id='rprice" . $pizzas[$i]['pizza_id'] . "' value='" . $pizzas[$i]['pizza_regularprice'] . "'>
    <input type='hidden' id='mprice" . $pizzas[$i]['pizza_id'] . "' value='" . $pizzas[$i]['pizza_mediumprice'] . "'>
    <input type='hidden' id='lprice" . $pizzas[$i]['pizza_id'] . "' value='" . $pizzas[$i]['pizza_largeprice'] . "'>
    <input type='button' class='add' name='add' value='Add' onclick='addPizza(" . $pizzas[$i]['pizza_id'] . ");'>
  </div>
";
           }  ?>
           <div class='col-sm-12'>
            <h2 class="text-center">Topping</h2>
            </div>
           <?php
    $toppings=getToppings();
    for ($i=0;$i<count($toppings);$i++)
    {
        echo "<div class='col-sm-6' style='padding:10px'>
        <div style='text-align: left;    font-size: 20px;' class='col-sm-6' id='tname" . $toppings[$i]['topping_id'] . "'>" . $toppings[$i]['topping_name'] . "</div>
        <div  class='col-sm-6' style='padding-top: 4px;'>
        <a class='price' id='tprice" . $toppings[$i]['topping_id'] . "'>" . $toppings[$i]['topping_price'] . "</a>
    <select id='tqty" . $toppings[$i]['topping_id'] . "'>
    <option>0</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
    </select>
    <input type='button' class='add' name='add' value='Add' onclick='addTopping(" . $toppings[$i]['topping_id']  . ");'>
    </div>
    </div>"; 
    }       
    ?>    


  

</div>
<div id="ordered" class="jumbotron col-sm-4 col-sm-offset-1" style="min-height:420px;text-align: center;">
  <p class="text-center" style="background: black;color: white;">Ordered Items</p><br>
  <div class="col-sm-7">
    <p style="text-align: left;text-decoration: underline;font-weight:bold; ">Item</p>
  </div>
  <div class="col-sm-2">
    <p style="text-align: left;text-decoration: underline;font-weight:bold; ">Qty</p>
  </div>
  <div class="col-sm-3">
    <p style="text-align: right;text-decoration: underline;font-weight:bold; ">Price</p>
  </div>
<div id="items">
  
</div>
  
  <div class="col-sm-9">
    <p style="text-align: left;text-decoration:underline;font-weight:bold; ">Total</p>
  </div>
  <div class="col-sm-3">
  <p style="text-align: right;text-decoration:underline;font-weight:bold;" id="total">0</p>
  </div>
  <button  style="width: 160px;height: 37px;font-size: 21px;" onclick="placeOrder()">Place Order</button>  

  <form id='orderform' action="order-online.php" method="POST">
  <input type="hidden" name="orderstr" id="orderstr" value="">
  
  </form>
  <div id="invalid" class="alert alert-danger fade in" style="display: none">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong id='failuremessage'>Please select items!</strong>
  </div>
</div>

<div id="payment" class="jumbotron col-sm-4 col-sm-offset-1" style="min-height:420px;text-align: center;display: none;">
  <p class="text-center" style="background: black;color: white;">Payment Details</p><br>
  <div style="text-align: right;" class="col-sm-4">Name:</div><div class="col-sm-8" style="text-align: left;" > <input type="text"  id="billingto"></div>
  <div style="text-align: right;" class="col-sm-4">Card No.: </div><div class="col-sm-8" style="text-align: left;"> <input type="text" id="cardno"></div>
  <div style="text-align: right;" class="col-sm-4">Expiry: </div><div class="col-sm-8" style="text-align: left;"> <input type="text" id="expiry"></div>
  <div style="text-align: right;" class="col-sm-4">CVV: </div><div class="col-sm-8" style="text-align: left;"> <input type="text" id="cvv"></div>
  <br>
  <button  style="width: 160px;height: 37px;font-size: 21px;" onclick="submitOrder()">Submit Order</button>  
  <div id="invalid2" class="alert alert-danger fade in" style="display: none">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong id='failuremessage2'>Please select items!</strong>
  </div>
</div>
</div>
<script type="text/javascript">
var items=[];

function addPizza(id)
{
  var itemName=document.getElementById("name"+id).innerText;
  var itemSize=document.getElementById("size"+id).value;
  var itemQty=Number(document.getElementById("qty"+id).value);
  if(itemQty<=0)
    return;
  var itemPrice=0;
  if(itemSize=='Regular')
    itemPrice=Number(document.getElementById("rprice"+id).value);
  if(itemSize=='Medium')
    itemPrice=Number(document.getElementById("mprice"+id).value);
  if(itemSize=='Large')
    itemPrice=Number(document.getElementById("lprice"+id).value);
  for(var i=0;i<items.length;i++)
    {
      if(items[i].name==itemName && items[i].size==itemSize)
      {
        items[i].qty+=itemQty;
        regenerateItems();
        return;
      }
    }
  var item={id:id,name:itemName,size:itemSize,qty:itemQty,price:itemPrice,type:'pizza'};
  items.push(item);

  console.log(items);
  regenerateItems();
}

function addTopping(id)
{
  var itemName=document.getElementById("tname"+id).innerText;
  var itemSize='';
  var itemQty=Number(document.getElementById("tqty"+id).value);
  if(itemQty<=0)
    return;
  var itemPrice=Number(document.getElementById("tprice"+id).innerText);
  for(var i=0;i<items.length;i++)
    {
      if(items[i].name==itemName && items[i].size==itemSize)
      {
        items[i].qty+=itemQty;
        regenerateItems();
        return;
      }
    }
  var item={id:id,name:itemName,size:itemSize,qty:itemQty,price:itemPrice,type:'topping'};
  items.push(item);

  console.log(items);
  regenerateItems();
}

function regenerateItems()
{
  var itemshtml="";
  var sum=0;
    for(var i=0;i<items.length;i++)
    {
      if(items[i].size=='')
        itemshtml+="<div class='col-sm-7'><p class='smallp' style='text-align: left;'>"+items[i].name+items[i].size.substring(0, 1)+"</p></div>";
      else
        itemshtml+="<div class='col-sm-7'><p class='smallp'style='text-align: left;'>"+items[i].name+"("+items[i].size.substring(0, 1)+")</p></div>"

      itemshtml+="<div class='col-sm-2'><p class='smallp' style='text-align: left;'>"+items[i].qty+"</p></div>";
      itemshtml+="<div class='col-sm-3'><p class='smallp' style='text-align: right;'>"+Math.round(items[i].price*items[i].qty * 100) / 100+"</p></div>";
      sum=sum+items[i].price*items[i].qty;
    }
    document.getElementById('items').innerHTML=itemshtml;
    document.getElementById('total').innerText=Math.round(sum * 100) / 100;
}
function placeOrder()
{
  var orderstr="";
  if(items.length==0)
  {
    document.getElementById('failuremessage').innerText='Please select items!';
    document.getElementById('invalid').style.display='block';
    return false;
  }
  var cPizza=0,cTopping=0;
   for(var i=0;i<items.length;i++)
    {
        if(items[i].type=='pizza')
          cPizza++;
        if(items[i].type=='topping')
          cTopping++;
        orderstr+=items[i].name+"|"+items[i].size+"|"+items[i].qty+"|"+(Math.round(items[i].price*items[i].qty * 100) / 100)+"|";
    }
    if(cPizza==0)
    {
    document.getElementById('failuremessage').innerText='Select at least one pizza!';
    document.getElementById('invalid').style.display='block';
    return false;
    }
    if(cTopping<=1)
    {
    document.getElementById('failuremessage').innerText='Select at least two topping!';
    document.getElementById('invalid').style.display='block';
    return false;
    }


    document.getElementById('orderstr').value=orderstr;
    document.getElementById('ordered').style.display="none";
    document.getElementById('payment').style.display="block";

    //document.getElementById('orderform').submit();
    console.log(orderstr);

}
function submitOrder()
{
  if(document.getElementById('billingto').value.length<=0)
  {
    document.getElementById('failuremessage2').innerText='Please enter name!';
    document.getElementById('invalid2').style.display='block';
    return false; 
  }
  if(document.getElementById('cardno').value.length<16)
  {
    document.getElementById('failuremessage2').innerText='Please enter 16 digit card no!';
    document.getElementById('invalid2').style.display='block';
    return false; 
  }
  if(document.getElementById('expiry').value.length<=0)
  {
    document.getElementById('failuremessage2').innerText='Please enter card expiry!';
    document.getElementById('invalid2').style.display='block';
    return false; 
  }
  if(document.getElementById('cvv').value.length<3)
  {
    document.getElementById('failuremessage2').innerText='Please enter three digit cvv!';
    document.getElementById('invalid2').style.display='block';
    return false; 
  }
  document.getElementById('orderform').submit();
}

</script>

<?php 
include 'app-footer.php';
?>