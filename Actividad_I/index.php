<?php require_once('./includes/header.php');

    $query = "SELECT * FROM libros";

    $stmt = $dataBase->prepare($query);

    $result = $stmt->execute();

    $books = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<header class="head">
    <h1>Libros añadidos</h1>
    <a href="crear.php">Añadir nuevo libro</a>
</header>
<main>
    <?php if(isset($_GET['message'])){?>
        <div class="modal">
            <p class="message"><?php echo $_GET['message']?></p>
            <button id="close">Cerrar</button>
        </div>
        <?php } ?>

 
    <section class="booksView">
        <?php if(isset($books)){?>

                <?php foreach($books as $book){?>
                    <article class="bookCard">
                        <div class="article-div">
                            <h3><?php  echo $book->nombre; ?></h3>
                            <p class="comment">
                                <?php echo $book->comentario; ?>
                            </p>
                            <div class="links">
                                <a href="modificar.php?name=<?php echo $book->nombre?>">Modificar</a>
                                <a href="eliminar.php?name=<?php echo $book->nombre?>">Eliminar</a>
                            </div>
                        </div>
                    </article>

                 <?php } ?>
            <?php }?>   
    </section>    
</main>
<?php require_once('./includes/footer.php')?>