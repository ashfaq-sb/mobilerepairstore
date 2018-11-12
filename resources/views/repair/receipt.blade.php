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
            <strong>Customer ID :</strong> {{$customer->id}}<br>
            <strong>Name :</strong> {{$customer->fname}} {{$customer->lname}}<br>
            <strong>Address :</strong> {{$customer->address}}<br>
            <strong>Phone   :</strong> {{$customer->phone}}<br>
        </p>


   
        <h2>Service Information</h2>
        <p> 
            <strong>Service ID :</strong> {{$repair->id}}<br>
            <strong>Device :</strong> {{$repair->brand}} {{$repair->model}}<br>
            <strong>Service Type :</strong> {{$repair->type}}<br>
            <strong>Discription :</strong> {{$repair->discription}}<br>
            <strong>Parts Changed :</strong> {{$repair->parts}}<br>
            <strong>Price :</strong>£{{$repair->price}}<br>          
            <strong>Service Created :</strong> {{$repair->created_at}}<br>
            <strong>Service updated :</strong> {{$repair->updated_at}}<br>

        </p>

<strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices. 
            </p>
     </div>    
  </body>
</html>