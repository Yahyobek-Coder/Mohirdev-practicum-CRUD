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
        <a href="/admin/add_post.php" class="btn btn-primary">Qo'shish</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th scope="col">author</th>
                <th scope="col">created_at</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (getPostList($page) as $item) {
                $author = getAuthor($item['author_id']);
                echo "<tr>";
                echo "<td>".$item['id']."</td>";
                echo "<td>".$item['title']."</td>";
                echo "<td>".$item['content']."</td>";
                echo "<td>".$item['author_id']."</td>";
                echo "<td>".$item['created_at']."</td>";
                echo "<td><a href='/admin/update_post.php?id=".$item['id']."' class='btn btn-primary'>Update</a></td>";
                echo "<td><a href='/admin/delete_post.php?id=".$item['id']."' class='btn btn-danger'>Delete</a></td>";
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
                <?php for ($page = 1; $page <= getPagination2(); $page++) { ?>
                    <li class="page-item"><a class="page-link" href="/admin/news.php?page=<?=$page;?>"><?=$page?></a></li>
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