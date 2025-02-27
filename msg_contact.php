<!DOCTYPE html>
<html>
<head>
    <title>Contact form using Bootstrap 3.3.4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/animate.css">
 
</head>
<body>"
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
    <h3>Send me a message</h3>
    <!-- Formulaire de contact -->
    <form role="form" id="contactForm">
     
        <div class="row">
                <div class="form-group col-sm-6">
                    <label for="name" class="h4">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="email" class="h4">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="h4 ">Message</label>
                <textarea id="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
            </div>
            <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
        <div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>


    </form>
</div>
</div>
</body>
<script  type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/form-scripts.js"></script>
</html>