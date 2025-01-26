<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<style>
 .sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}


  
</style>
</head>
<body>
  <!-- header -->

<div class="row">
<div class="col-md-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-primary text-warning" href="#"><h2>Ango Academy</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item">
        <a class="nav-link active text-primary" href="#"><h4>Contact</h4></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link active text-primary" href="#"><h4>About</h4></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-primary" href="#"><h4>Services</h4></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
   
  </div>
</nav>
</div>
</div>

    <div class="row">
         <div class="col-md-3">
                <div class="sidebar">
                    <a href="{{ url('#') }}">Home</a>
                    <a href="{{ url('/students') }}">Student</a>
                    <a href="{{ url('/courses') }}">Course</a>
                    <a href="{{ url('/batches') }}">Batch</a>  
                    <a href="{{ url('/enrollments') }}">Enrollment</a>
                    <a href="{{ url('/payments') }}">Payment</a>
                </div>
         </div>
         <div class="col md 9">
             
              @yield('content')
             
         </div>    
    </div>

  

</body>
</html>