{{View::make("partials.header")}}

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>TwitterClone</title>
<style>
    .left-side ,.right-side{
        height: 100vh;
        width:100%;
    }
    .left-side{
      padding-top:30%;
      padding-left: 25px;
      font-size:x-large;
      color: white;
    }
    .right-side{
      padding-top:15%;
      padding-left: 25px;
    }
</style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
          <div class="col bg-primary  no-gutters" >
                <div class="left-side ">
                    <p ><span class="glyphicon glyphicon-search"></span>&emsp;Follow your interest.</p><br>
                    <p><span class="glyphicon glyphicon-user"></span>&emsp;Hear what people are talking about.</p><br>
                    <p><span class="glyphicon glyphicon-envelope"></span>&emsp;Join the conversations.</p>
                </div>
          </div>
          <div class="col no-gutters">
            <div class="right-side">
                <div class="card border-0" style="width:90%; height: 100%; padding:20px; margin-left:50px;">
                 <img src=" https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_Twitter.svg/1245px-Logo_of_Twitter.svg.png" width="50" height="50" style="margin-left:200px;">
                    <h1>See what's happening in the world right now.</h1>
                    <br><br><br>
                    <h3>Join Twitter  today.</h3>
                    <div class="d-grid gap-3">
                  <a href="\register"> <button class="btn btn-primary" type="button" style="border-radius: 25px; width: 90%; font-size: large;">Sign Up</button></a>

                  <a href="\login"> <button class="btn btn-outline-primary border-primary" type="button"  style="font-size: large;border-radius: 25px;width: 90%;">Log In</button></a>
                      </div>
                      <h6>By signing up, you agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>, including <a href="#">Cookie Use.</a></h6>
                </div>
            </div>
          </div>
        </div>
</body>
</html>





