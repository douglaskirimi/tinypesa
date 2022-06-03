<?php 

?>

<!DOCTYPE html>
<html>
<head>
	<title>TinyPesa API</title>  
   <script type="text/javascript" src="js/jquery-3.6.0.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</head>
<body>
<section class="vh-100 my-5">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="img/lipa_na_mpesa_bulk_payments.jpg" class="img-fluid"
          alt="Lipa na Mpesa">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form class="border border-success py-4 px-5" action="make_payment.php" method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-2 me-6 text-success">Online Transactions Made Easy</p>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-success py-2 px-4 text-white">Lipa na <b class="text-default">Mpesa</b></p>
          </div>

          <!-- Phone number input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Phone Number</label>
            <input type="text" name="p-number" id="phone" class="form-control form-control-lg" placeholder="Enter a valid phone number e.g 254758319193" required="required" />
            <span id="phone_check"></span>
          </div>

          <!-- Amount -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control form-control-lg" placeholder="Amount to pay e.g 10"  required />
          </div>

          <div class="d-flex justify-content-between align-items-center">
            
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="make_payment" class="btn btn-success btn-lg col-12"
              style="padding-left: 3.5rem; padding-right: 3.5rem;">Make Payment</button>
          </div>

        </form>
      </div>
    </div>
  </div>

 <script src="js/app.js" type="text/javascript"></script>
</section>

</body>
</html>