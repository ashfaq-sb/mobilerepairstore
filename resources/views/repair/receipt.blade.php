<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    
 
  <body>
   <div >


        <h2>Camden Mobile Services</h2>
 
        <p> 
            <strong>Address : 167-169 Kentish Town Rd, NW1 8PD</strong><br>
            <strong>Email   : info@camdenmobiles.co.uk</strong><br>
            <strong>Phone   : 02078130978<br>
        </p>
      

    
        <h2>Customer Information</h2>
          <p> 
            <strong>Customer ID : {{$repair->customer->id}}</strong><br>
            <strong>Name : {{$repair->customer->fname}} {{$repair->customer->lname}}</strong><br>
            <strong>Address : {{$repair->customer->address}}</strong><br>
            <strong>Phone   :{{$repair->customer->phone}}</strong><br>
        </p>


   
        <h2>Service Information</h2>
        <p> 
            <strong>Agent Name : {{Auth::user()->name}}</strong><br> 
            <strong>Service ID : {{$repair->id}}</strong><br>
            <strong>Device : {{$repair->brand}} {{$repair->model}}</strong><br>
            <strong>Service Type : {{$repair->type}}</strong><br>
            <strong>Discription : {{$repair->discription}}</strong><br>
            <strong>Parts Changed : {{$repair->parts}}</strong><br>
            <strong>Price : £{{$repair->price}}</strong><br>          
            <strong>Service Created : {{$repair->created_at}}</strong><br>
            <strong>Service updated : {{$repair->updated_at}}</strong><br>

        </p>
<p>
<strong>Legal Note!</strong><br>  
Camden Mobile Service will not be responsible for any demage<br> caused to the above durring the service.<br>
By Aquaring our service you are consenting to this note.

            </p>
     </div> 
  </body>
</html>