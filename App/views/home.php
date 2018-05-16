<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title ?></title>
        
        <link rel="stylesheet" href="<?php echo get_template_path() ?>/assets/css/justifiednav.css" media="all"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid home-container">
            <div class="masthead">
                <center><h2><?php echo $user ?></h2></center>
            </div>
            <div class="container">
                 <center>
                     <div class="logIn">
                         <form class="form-sigin" action="<?php echo get_site_path(); ?>/home/login" method="post">
                             <div class="form-group">
                                 <label for="userName">
                                     Usuario
                                 </label>
                                 <input class="form-control" type="text" name="userName" />
                             </div>
                             <div class="form-group">
                                 <label for="password">
                                     Contraseña
                                 </label>
                                 <input class="form-control" type="password" id="password" name="password" />
                             </div>
                             <?php
                                if (isset($error)) {
                                    echo '<small class="error">'.$error.'</small>';
                                }
                             ?>
                             <div class="form-group">
                                 <input type="hidden" name="passmd5" id="passmd5" />
                                 <button type="submit" class="btn btn-lg btn-primary btn-block">Ingresar</button>
                             </div>
                         </form>
                     </div>
                 </center>
             </div>
        </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>