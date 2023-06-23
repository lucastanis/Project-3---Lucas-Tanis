<!DOCTYPE html>
<html>
   <head>
      <title>Contact Pagina</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link  href="https://fonts.googleapis.com/css2?family=Pattaya&family=Poppins:wght@500&display=swap" rel="stylesheet"/>
   </head>
   <body>
      <header>
         <nav>
            <div>
            <li><a href="productpagina.php">XXL</a></li>
               <ul>
                  <li><a href="product.php">Producten</a></li>
                  <li><a href="account.php">Account</a></li>
                  <li><a href="contact.php">Contact</a></li>
                  <li><a href="./crud_product/crud_product.php">Crud Product</a></li>
               </ul>
            </div>
         </nav>
      </header>
   </body>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <form method="post" action="send.php">
      <label>Naam:</label>
      <input type="text" 
         name="name">
      <label>Bericht:</label>
      <textarea name="message"></textarea>
      <input type="submit" 
         name="btn">
   </form>
</html>