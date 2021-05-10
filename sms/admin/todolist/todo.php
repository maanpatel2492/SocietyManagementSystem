<?php
require 'db_todo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TO-Do List</title>
<link rel="stylesheet" href="todo.css">
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style="background-color: lightskyblue;">




        <div class="main">
<div class="additems">
<div class="form">
<form action="add.php" method="POST" autocomplete="off" >
    <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
        <input type="text" name="title" placeholder="This field is required" style="border-color:#ff6666" ></br>
    <button type="submit">ADD &nbsp;<span>&#43;</span></button>

        <?php }else{ ?>
    <input type="text" name="title" ></br>
    <button type="submit">ADD &nbsp;<span>&#43;</span></button>
<?php } ?>
</form>
</div> 
</div>
<?php 
$todos = $conn->query("SELECT * FROM todolist.todos ORDER BY id DESC"); 
?>
<div class="displayitems">

<?php if($todos->rowCount() === 0){ ?>
    <div class="item">
<div class="empty">
    <img src="img.jpeg" width="80%">
   
</div>
    </div>
<?php } ?>






<?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) {?>

    <div class="items">
        <span id="<?php echo $todo['id']; ?>" class="removetodo">x</span>
            <?php if($todo['checked']){ ?>
                <input type="checkbox" todo_dataid ="<?php echo $todo['id']; ?>" class="check-box" checked />
                <h2 class="checked"><?php echo $todo['title'] ?></h2>  
                                      <?php  }  

                  else{ ?>
                       <input type="checkbox" todo_dataid ="<?php echo $todo['id']; ?>" class="check-box" />
                       <h2><?php echo  $todo['title']?></h2>
                       <?php }  ?>


            <br>
            <small>Created: <?php echo $todo['date']?></small>
            </div><?php 
} ?>
</div>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.removetodo').click(function(){
        const id= $(this).attr('id');
        $.post("remove.php",
                {
                    id:id
                },
                (data) => {
                    if(data)
                    {
                        $(this).parent().hide(600);
                    }
                });
            });

                $(".check-box").click(function(e){
                    const id = $(this).attr('todo_dataid');
                    $.post('check.php',{
                        id:id
                    },
                    (data) => {
                        if(data != 'error'){
                            const h2 = $(this).next();
                            if(data === '1'){
                                h2.removeClass('checked');
                            }
                            else{
                                h2.addClass('checked');
                            }
                        }
                    });
                });
    
});
</script>
<script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/chart-area-demo.js"></script>
    <script src="../../js/demo/chart-pie-demo.js"></script>
</body>
</html>