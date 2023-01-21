

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chercher</title>
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Montserrat:500);

        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800&display=swap');

*{
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
	margin: 0;
	padding: 0;
}

body{
	min-height: 100vh;
	background-color: #2c3e50;
    color:#fff;
}

.form{
	background: #2A2A2A;
	border-radius: 10px;
	box-shadow: -5px -5px 10px rgba(255, 255, 255, 0.2), 5px 5px 15px rgba(0, 0, 0, 0.7);
	padding: 40px 40px 60px;
	position: absolute;
    top: 50%;  /* position the top  edge of the element at the middle of the parent */
    left: 50%; /* position the left edge of the element at the middle of the parent */
    transform: translate(-50%, -50%);
	text-align: center;
	width: 400px;
    
}

.form h2{
	color: #F2A622;
	font-size: 28px;
	font-weight: 800;
	letter-spacing: 5px;
	text-transform: uppercase;
}

.form .form-content{
	margin: 45px 22px;
	text-align: left;
    align-items: center;
	display: flex;
	justify-content: center;
}

.form .form-content .form-box{
	margin-top: 25px;
}

.form .form-content .form-box label{
        color: #FFFFFF;
        display: block;
        font-size: 18px;
        letter-spacing: 2px;
        margin-bottom: 5px;
}

.form .form-content .form-box input{
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
}

.form .form-content .form-box input[type="submit"]{
	box-shadow: -2px -2px 6px rgba(255, 255, 255, 0.2), 2px 2px 6px rgba(0, 0, 0, 0.8);
	font-weight: 600;
	margin-top: 20px;
}
.form .form-content .form-box input[type="submit"]:hover{
	opacity:0.6;
}

.form .form-content .form-box input[type="submit"]:active{
	box-shadow: inset -2px -2px 6px rgba(255, 255, 255, 0.2), inset 2px 2px 6px rgba(0, 0, 0, 0.8);
	color: #079D69;
	margin-top: 20px;
}

.form .form-content .form-box input::placeholder{
	color: #A2A2A2;
	font-size: 18px;
}      

table{
    position: absolute;
    top: 50%;  /* position the top  edge of the element at the middle of the parent */
    left: 50%; /* position the left edge of the element at the middle of the parent */
    transform: translate(-50%, 55%);
  border-collapse: collapse;
  margin: 0;
}
table caption {
    color: #F2A622;
	font-size: 28px;
	font-weight: 800;
	letter-spacing: 5px;
	text-transform: uppercase;
}
table tr {
  padding: .35em;
}

table th,
table td {
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

table th {
    color: #FFFFFF;
	font-size: 18px;
	letter-spacing: 2px;
	margin-bottom: 5px;
}
img{
    
  height:300px;
  width: 250px;;
}
    </style>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
require_once "nav.php";

//Implementation du code PDO:
$id = $title = $image = $msg="";
if(isset($_POST['Trouver'])){
    $hostname = "localhost";
    $dbname = "gallery";
    $username ="root";
    $password="";
    
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
    $id = $_POST['id'];
    $sqlquery = "select * from image_gallery where id =:id";
    $result = $conn->prepare($sqlquery);
    $executerecord = $result->execute(array(":id"=>$id));
    if($executerecord){
        if($result->rowCount()>0){
            foreach($result as $row){
                $id = $row['id'];
                $title = $row['title'];
                $image = $row['image'];
                $msg="<script>Swal.fire(
                    'Trouvé!',
                    'faites défiler vers le bas pour voir le résultat',
                    'success'
                  )</script>";
            }
            
        }
        else{
            $msg="<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Aucune photo de ce type',})</script>";
            $id=null;
        }
    }
    else{
        echo "Error";
    }

}
?>
<div class="form">
<h2>Rechercher</h2>
<div class="form-content">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="form-box">
        <label>Tapper id d'image: </label>
        <input type="text" name="id">
        </div>
        <div class="form-box">
        <input type="submit" value="Chercher" name="Trouver">
        </div>
                        </form>
                        </div>
</div>

        <table id="tab">
        <caption>Résultat</caption>
<tr>
    <th>ID</th>
    <th>Commentaire</th>
    <th>Image</th>
</tr>
            <tr>
                <td> <b id="set"><?php echo $id; echo $msg;?></b></td>
                <td> <b><?php echo $title;?></b></td>
                <td> <img src="./uploads/<?php echo $image;?>"></td>
            </tr>
        </table>
<!--
<script>
   let val =  document.getElementById('set').value;
   if(val==null){
    document.getElementById('tab').style.display="none";
   }
   else{
    document.getElementById('tab').style.display="block";
   }-->
</script>
</body>
</html>