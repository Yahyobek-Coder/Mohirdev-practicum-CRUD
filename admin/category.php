<?php

require_once 'header.php';
require '../sql.php';
if(isset($_GET['page'])){
    $page = $_GET['page'];
} else{
    $page = 1;
}

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location: login.php');
};

?>
<div class="container">
    <br><br>
    <a href="/admin/add.php" class="btn btn-primary">Qo'shish</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Category</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach (getCategoryList($page) as $item) {
                echo "<tr>";
                echo "<td>".$item['id']."</td>";
                echo "<td>".$item['title']."</td>";
                echo "<td><a href='/admin/update.php?id=".$item['id']."' class='btn btn-primary'>Update</a></td>";
                echo "<td><a href='/admin/delete.php?id=".$item['id']."' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($page = 1; $page <= getPagination(); $page++) { ?>
                <li class="page-item"><a class="page-link" href="/admin/category.php?page=<?=$page;?>"><?=$page?></a></li>
            <?php }?>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<?php require '../admin/footer.php' ?>