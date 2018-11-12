<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
 
  <body>
   <div class="container-fluid">


        <h2>Camden Mobile Services</h2>
 
        <p> 
            <strong>Address :</strong> Camden<br>
            <strong>Email   :</strong> info@camdenmobiles.co.uk<br>
            <strong>Phone   :</strong> 0208123456<br>
        </p>
      

    
        <h2>Customer Information</h2>
          <p> 
            <strong>Customer ID :</strong> {{$repair->customer->id}}<br>
            <strong>Name :</strong> {{$repair->customer->fname}} {{$repair->customer->lname}}<br>
            <strong>Address :</strong> {{$repair->customer->address}}<br>
            <strong>Phone   :</strong> {{$repair->customer->phone}}<br>
        </p>


   
        <h2>Service Information</h2>
        <p> 
            <strong>Agent Name :</strong> {{Auth::user()->name}}<br> 
            <strong>Service ID :</strong> {{$repair->id}}<br>
            <strong>Device :</strong> {{$repair->brand}} {{$repair->model}}<br>
            <strong>Service Type :</strong> {{$repair->type}}<br>
            <strong>Discription :</strong> {{$repair->discription}}<br>
            <strong>Parts Changed :</strong> {{$repair->parts}}<br>
            <strong>Price :</strong>£{{$repair->price}}<br>          
            <strong>Service Created :</strong> {{$repair->created_at}}<br>
            <strong>Service updated :</strong> {{$repair->updated_at}}<br>

        </p>
<p>
<strong>Legal Note!</strong><br>  
Camden Mobile Service will not be responsible for any demage<br> caused to the above durring the service.<br>
By Aquaring our service you are consenting to this note.

            </p>
     </div> 
  </body>
</html>