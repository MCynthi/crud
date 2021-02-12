<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

     <div class="container">      
          <div class="row">
            <div class="col-md-12 mt-5">
               <h1 class="text-center">ENREGISTREMENT </h1>
               <hr style="background-color: black; color: black; height: 1px;">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
               <a href="<?php echo base_url(); ?>"class="btn btn-info btn-sm">Ajouter </a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8  mt-2 mx-auto">

              <?php if ($msg= $this->session->flashdata('Success')) {?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php } ?>

              <?php if ($msg= $this->session->flashdata('Error')) {?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php } ?>

              <?php
                if($posts)
                {
                  foreach($posts as $post){ ?>
                  <div class="card mb-2">
                      <div class="card-header">
                        <?php echo $post->titre; ?>
                      </div>
                      <div class="card-body">
                        <?php echo $post->description; ?>
                      </div>
                      <div class="card-footer">
                        <div class="text-right">
                          <a href="<?php echo base_url(); ?>delete/<?php echo $post->id; ?>">Supprimer</a>
                          <a href="<?php echo base_url(); ?>edit/<?php echo $post->id; ?>">Modifier</a>
                        </div>
                      </div>
                </div>
              <?php }
                }
              ?>
            </div>
          </div>

     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>