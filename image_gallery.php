<?php
session_start();
require_once "nav.php";
?>
<!DOCTYPE html>
<html>

<head>
<?php
spl_autoload_register(function ($program) {
    include $program . '.php';
});?>
    <title><?php echo program::$Title;?></title>
    <link rel="icon" type="image/x-icon" href="gallery_image\logo.ico">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Montserrat:500);
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800&display=swap');

        :root {
	/* Base font size */
	font-size: 10px;
	font-family: "Montserrat", Arial, sans-serif;

}

*,
*::before,
*::after {
	box-sizing: border-box;
}

body {
	min-height: 100vh;
	background-color: #2c3e50;
    color:#fff;
}
        .container {
    color:#fff;
	max-width: 100rem;
	padding: 0 2rem 2rem;
}
.heading {
	color: #F2A622;
	font-size: 4rem;
	font-weight: 500;
	line-height: 1.5;
	text-align: center;
	padding: 3.5rem 0;
}
.gallery {
            display: inline-block;
            margin-top: 20px;
            }
.gallery-item {
	margin: 1rem;
    background: #2A2A2A;
	border: none;
	border-radius: 10px;
	box-shadow: inset -2px -2px 6px rgba(255, 255, 255, 0.2), inset 2px 2px 6px rgba(0, 0, 0, 0.8);
	color: #22F2AA;
	outline: none;
}
.gallery-image{
    display: block;
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: transform 400ms ease-out;
}
.gallery-image:hover {
	transform: scale(1.15);
}

input::placeholder{
	color: #A2A2A2;
	font-size: 18px;
}    
        .close-icon {
            border-radius: 50%;
            position: absolute;
            right: 5px;
            top: -10px;
            padding: 5px 8px;
        }

        .form-image-upload {
            padding: 15px;
        }

        .carousel-inner>.item>a>img,
        .carousel-inner>.item>img,
        .img-responsive,
        .thumbnail a>img,
        .thumbnail>img {
            width: 300px !important;
            height: 160px !important;
        }

.butto {
  min-width: 80px;
  padding: 10px 5px;
  margin: 5px;
  background: rgb(214, 214, 214);
  border: none;
  border-radius: 25px;
  color: rgb(50, 207, 207);
  font-size: 15px;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: .5px;
  box-shadow: -7px -7px 20px 0 rgba(255, 255, 255, 0.7),
    7px 7px 20px 0 rgba(0, 0, 0, 0.2);
}

.butto:hover {
  box-shadow: inset -7px -7px 20px 0 rgba(255, 255, 255, 0.7),
    inset 7px 7px 20px 0 rgba(0, 0, 0, 0.2);
}

.check{
    background: #2A2A2A;
	border: none;
	border-radius: 10px;
	box-shadow: inset -2px -2px 6px rgba(255, 255, 255, 0.2), inset 2px 2px 6px rgba(0, 0, 0, 0.8);
	color: #22F2AA;
	font-size: 18px;
	height: 50px;
	outline: none;
	padding: 5px 15px;
	width: 100%;
    text-align:center;
}

.ajtheader{
    text-align:center;
    padding:15px;
}

    </style>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="container">
    <h1 class="heading"><?php echo program::$Header;?></h1>
    
    <form action="./imageUpload.php" class="form-image-upload" method="POST" enctype="multipart/form-data" style="border-radius:15px; background-color: #fff; color:#000;" >

            <!-- code to show error message -->
            <?php if (!empty($_SESSION['error'])) { ?>
                <div class="alert alert-danger alert-dismissible show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                    <strong>Erreur</strong> Il y a eu quelques problèmes avec votre saisie.<br><br>
                    <ul>
                        <li><?php echo $_SESSION['error']; ?></li>
                    </ul>
             
                </div>
            <?php unset($_SESSION['error']);
            } ?>

            <!-- code to show success message  -->
            <?php if (!empty($_SESSION['success'])) { ?>
                <div class="alert alert-success alert-block alert-dismissible show">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php echo $_SESSION['success']; ?></strong>
                </div>
            <?php unset($_SESSION['success']);
            } ?>

            <div class="row">
                <h2 class="ajtheader">Ajouter Image</h2>
                <div class="col-md-5">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control check">
                    
                </div>
                <div class="col-md-5">
                    <strong>Commentaire:</strong>
                    <textarea name="title" class="form-control check" cols="30" rows="5" placeholder="Commentaire"></textarea>
                </div>
                <div class="col-md-2" style="display:flex; flex-direction:column;">
                    <br />
                    <button type="submit" class="butto"  title="Ajouter image">Upload</button>
                    <br>
                    <input type="reset" class="butto" value="reset">
                    
                </div>
                
            </div>
            
        </form>
        <div class="rads">
        <input type="radio" value ="Disparaître" name="Lang" onclick="hideShowDiv(1)">Disparaître Gallerie
            <input type="radio" value ="Afficher" name="Lang" onclick="hideShowDiv(2)" checked>Afficher Gallerie
            </div>
        <div class="row" id="toggle">
      
            <div class='list-group gallery' style="width:100%;">
            
                <?php
                require('config_db.php');
 
                $images = $conn->query(program::$sql);

                while ($image = $images->fetch_assoc()) {

                ?>
                    <div class='col-sm-3 gallery-item' style="float: left;" data-aos="fade-down-right">

                        <a class="thumbnail fancybox gallery-image" rel="ligthbox" href="./uploads/<?php echo $image['image'] ?>" >
                        
                        
                            <img alt="" src="./uploads/<?php echo $image['image'] ?>" />
                            <div class='text-center'>
                                
                            <small class='text-muted'><?php echo "Number ". $image['id'] ." : ". $image['title'] ?></small>
                            <a href="./uploads/<?php echo $image['image'] ?>" style="text-decoration:none;" download="<?php echo $image['id'] ?>">Télécharger</a>
                           &nbsp|&nbsp<a href="./remplacer.php?id=<?php echo $image['id']; ?>">Remplacer</a>
                        </div> <!-- text-center / end -->
                        </a>

                        <!-- form to delete image -->
                        <form action="./imageDelete.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $image['id'] ?>">
                            <button type="submit" title="delete" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                        </form>

                    </div> <!-- col-6 / end -->
                <?php } ?>

            </div> <!-- list-group / end -->
        </div> <!-- row / end -->
    </div> <!-- container / end -->
    <script>
        function hideShowDiv(val){
            if(val==1){
                document.getElementById('toggle').style.display="none";
            }
            if(val==2){
                document.getElementById('toggle').style.display="block";
            }
        }
    </script>
</body>
</html>




<script>
  AOS.init();
</script>
