<!DOCTYPE html>
<html>
<head>
  <title>Checkout cancel</title>
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: black;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    position: relative;
    color: white;
    margin: 20px;
    display: flex;
    flex-direction: row;
}
  a{
    text-decoration: none;
    color: purple;
  }

  #L{
    width: 40%;
  }

  #R{
    width: 60%;
    height: 800px;
    background-image: linear-gradient(to left, transparent, black),
    url('../../img/tnximg.jpg');
  }

</style>
<body>
  <div id="L">
    <h1>pasūtījums atcelts!</h1>
    <h3>Kļūdas dēļ Jūsu pasūtijums netika apstrādāts. Droši variet doties atpakaļ uz <a href="../../shop.php">veikala lapu</a>, lai veiktu savu pasūtījumu no jauna!</h3>
  </div>
  <div id="R">
  </div>
</body>
</html>