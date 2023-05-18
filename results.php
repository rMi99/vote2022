<!DOCTYPE html><html lang="en"><head> <meta charset="UTF-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>ප්‍රතිඵලය</title> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css"> <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"> <link type="text/css" rel="stylesheet" href="assets/css/style.css"> <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <style>.img{background-size: cover; background-repeat: no-repeat; background-position: center center;}.table{min-width: 1000px !important; width: 100%; background: #fff; -webkit-box-shadow: 0 5px 12px -12px rgba(0, 0, 0, .29); -moz-box-shadow: 0 5px 12px -12px rgba(0, 0, 0, .29); box-shadow: 0 5px 12px -12px rgba(0, 0, 0, .29)}.table thead.thead-primary{background: #88162f;}.table thead th{border: none; padding: 12px; font-size: 13px; font-weight: 500; color: #fff}.table tbody tr{margin-bottom: 10px}.table tbody th, .table tbody td{border: none; padding: 10px; font-size: 14px; background: #fff; border-bottom: 4px solid #f8f9fd; vertical-align: middle}.table tbody td.quantity{width: 10%}.table tbody td .img{width: 100px; height: 100px}.table tbody td .email span{display: block}.table tbody td .email span:last-child{font-size: 12px; color: rgba(0, 0, 0, .3)}.table tbody td .close span{font-size: 12px; color: #dc3545}@media (max-width: 412px){.table{min-width: 18px !important;}.table tbody td .img{width: 50px; height: 50px; font-size: small;}}@media (max-width: 810px){#col{width: 100px; height: 100px;}}@media (max-width: 428px){.table{min-width: 17px !important;}.table tbody td .img{width: 40px; height: 40px; font-size: small;}}@media (max-width: 420px){.table{min-width: 17px !important;}.table tbody td .img{width: 40px; height: 40px; font-size: small;}}@media (max-width: 390px){.table{min-width: 17px !important;}.table tbody td .img{width: 40px; height: 40px; font-size: small;}}@media (max-width: 384px){.table{min-width: 17px !important;}.table tbody td .img{width: 40px; height: 40px; font-size: small;}}@media (max-width: 360px){.table{min-width: 17px !important;}.table tbody td .img{width: 40px; height: 40px; font-size: small;}}@media (max-width: 360px){.table{min-width: 17px !important;}.table tbody td .img{width: 40px; height: 40px; font-size: small;}}</style> <script type="text/javascript" src="./inc/ajax.js"></script></head><!-- <body id="top"> <div class="container"> </div></body> --><body id="top"> <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #88162f;"> <a class="navbar-brand" href="#" style="visibility:hidden">Navbar</a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> <div class="collapse navbar-collapse" id="navbarNavDropdown" style="color: #fff;"> <ul class="navbar-nav ms-auto"> <li class="nav-item active"> <a class="nav-link" href="index.php"><span style="color: #f8f9fd;"><i class="fa fa-home"></i>Home </span></a> </li><li class="nav-item"> <a class="nav-link" href="logout.php"><span style="color: #f8f9fd;"><i class="fa fa-sign-out"></i>Logout</a> </span> </li></ul> </div></nav> <div class="login-9"> <div class="container"> <div class="row login-box"> <center> <div class="col"><img src="assets/img/logos/logo-21.png" width="150px" alt=""> <div class="wrapper"> <div class="typing-demo"> <p style="font-weight:bold;"> සිතන්නට! අවසන් අවස්තාවයි..</p></div></div><h3>අපගේ ඔන්ලයින් මත විමසුමේ ප්‍රතිඵලය.</h3> </div></center> <div class="col-lg-12"> <div class="container"> <div class="table-wrap"> <table class="table"> <thead class="thead-primary"> <tr> <th style="width: 10px;">#</th> <th style="width: 10px;"> </th> <th style="width: 10px;">පක්ශය</th> <th style="width: 10px;">ප්‍රතිඵලය</th> </tr></thead> <tbody> <tr class="alert" role="alert" id="jjb"> <td> <label class="checkbox-wrap checkbox-primary"> <p>1</p></label> </td><td> <div class="img" style="background-image:url(assets/img/parties/jjb.jpg)"> </div></td><td> <div class="name"> <span>ජාතික ජන බලවේගය </span> <span>(JVP)</span> </div></td><td class="jvp-data">677</td></tr><tr class="alert" role="alert" id="jjb"> <td> <label class="checkbox-wrap checkbox-primary"> <p>2</p></label> </td><td> <div class="img" style="background-image:url(assets/img/parties/unp.jpg)"> </div></td><td> <div class="name"> <span>එක්සත් ජාතික පක්ශය</span> <span>(UNP)</span> </div></td><td class="unp-data">2571</td></tr><tr class="alert" role="alert" id="jjb"> <td> <label class="checkbox-wrap checkbox-primary"> <p>1</p></label> </td><td> <div class="img" style="background-image:url(assets/img/parties/sjb.jpg)"> </div></td><td> <div class="name"> <span>සමගි ජන බලවේගය</span> <span>(SJB)</span> </div></td><td class="sjb-data">2778</td></tr><tr class="alert" role="alert" id="slmc"> <td> <label class="checkbox-wrap checkbox-primary"> <p>3</p></label> </td><td> <div class="img" style="background-image:url(assets/img/parties/SLMC.jpg)"> </div></td><td> <div class="name"> <span>ශ්‍රී ලංකා මුස්ලිම් කොන්ග්‍රසය</span> <span>(SLMC)</span> </div></td><td class="slmc-data">12</td></tr><tr class="alert" role="alert" id="slfp"> <td> <label class="checkbox-wrap checkbox-primary"> <p>4</p></label> </td><td> <div class="img" style="background-image:url(assets/img/parties/SLFP.jpg)"> </div></td><td> <div class="name"> <span>ශ්‍රී ලංකා නිදහස් පක්ශය</span> <span>(SLFP)</span> </div></td><td class="slfp-data">1321</td></tr><tr class="alert" role="alert" id="tna"> <td> <label class="checkbox-wrap checkbox-primary"> <p>5</p></label> </td><td> <div class="img" style="background-image:url(assets/img/parties/tna.jpg)"> </div></td><td> <div class="name"> <span>දෙමළ ජාතික සන්ධානය</span> <span>(TNA)</span> </div></td><td class="tna-data">728</td></tr><tr class="alert" role="alert" id="slpp"> <td> <label class="checkbox-wrap checkbox-primary"> <p>6</p></label> </td><td> <div class="img" style="background-image:url(assets/img/parties/SLpp.jpg)"> </div></td><td> <div class="name"> <span>ශ්‍රී ලංකා පොදු ජන පක්ශය</span> <span>(SLPP)</span> </div></td><td class="slpp-data">3521</td></tr><tr class="alert" role="alert" id="tna"> <td> <label class="checkbox-wrap checkbox-primary"> <p>7</p></label> </td><td> <div class="img" style="background-image:url(assets/img/parties/other.jpg)"> </div></td><td> <div class="name"> <span>ඡන්දය ලබා නොදෙන</span> <span>(Not Voting)</span> </div></td><td class="none-data">1532</td></tr></tbody> </table> </div><div class="row row-cols-1 row-cols-sm-2 row-cols-md-4"> </div></div></div></div></div></div></div><footer class="bg-dark text-center text-lg-start"> <div class="text-center p-3" style="background-color: rgba(224, 208, 208, 0.664);color: rgb(255, 255, 255);"> © 2022 Copyright: <a class="text-dark" href="#">#GOHOMEGOTA</a> </div></footer></body></html>