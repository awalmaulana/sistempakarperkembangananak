<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

//Only super admin is allowed to access this page
if ($_SESSION['admin_type'] !== 'super') {
    // show permission denied message
    header('HTTP/1.1 401 Unauthorized', true, 401);
    
    exit("401 Unauthorized");
}
//Get data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$del_id = filter_input(INPUT_GET, 'del_id');

$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');
$page = filter_input(INPUT_GET, 'page');
$pagelimit = 20;
if ($page == "") {
    $page = 1;
}
// If filter types are not selected we show latest added data first
if ($filter_col == "") {
    $filter_col = "id_artikel";
}
if ($order_by == "") {
    $order_by = "desc";
}

//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('id_artikel', 'judul', 'isi', 'foto', 'tgl', 'penerbit');

// If user searches 
if ($search_string) {
    $db->where('judul', '%' . $search_string . '%', 'like');
}


if ($order_by) {
    $db->orderBy($filter_col, $order_by);
}

$db->pageLimit = $pagelimit;
$result = $db->arraybuilder()->paginate("artikel", $page, $select);
$total_pages = $db->totalPages;


// get columns for order filter
foreach ($result as $value) {
    foreach ($value as $col_name => $col_value) {
        $filter_options[$col_name] = $col_name;
    }
    //execute only once
    break;
}


include_once './includes/header.php';
?>

<div id="page-wrapper">
<div class="row">
     <div class="col-lg-6">
            <h1 class="page-header">Artikel</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
            <a href="add_artikel.php"> <button class="btn btn-success">Add new</button></a>
            </div>
        </div>
</div>
 <?php include('./includes/flash_messages.php') ?>

    <?php
    if (isset($del_stat) && $del_stat == 1) {
        echo '<div class="alert alert-info">Successfully deleted</div>';
    }
    ?>
    
    <!--    Begin filter section-->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search" >Search</label>
            <input type="text" class="form-control" id="input_search"  name="search_string" value="<?php echo htmlspecialchars($search_string, ENT_QUOTES, 'UTF-8'); ?>">
            <label for ="input_order">Order By</label>
            <select name="filter_col" class="form-control">

                <?php
                foreach ($filter_options as $option) {
                    ($filter_col === $option) ? $selected = "selected" : $selected = "";
                    echo ' <option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
                }
                ?>

            </select>

            <select name="order_by" class="form-control" id="input_order">

                <option value="Asc" <?php
                if ($order_by == 'Asc') {
                    echo "selected";
                }
                ?> >Asc</option>
                <option value="Desc" <?php
                if ($order_by == 'Desc') {
                    echo "selected";
                }
                ?>>Desc</option>
            </select>
            <input type="submit" value="Go" class="btn btn-primary">

        </form>
    </div>
    <!--   Filter section end-->
    <hr>
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header">#</th>
                <th>Judul</th>
                <th>konten</th>
                <th>Tanggal</th>
                <th>Penerbit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($result as $row) : ?>
                
            <tr>
                <td><?php echo $row['id_artikel'] ?></td>
                <td><?php echo htmlspecialchars($row['judul']) ?></td>
                <td><?php echo htmlspecialchars($row['isi']) ?></td>
                <td><?php echo htmlspecialchars($row['tgl']) ?></td>
                <td><?php echo htmlspecialchars($row['penerbit']) ?></td>


                <td>
                    <a href="edit_artikel.php?id_artikel=<?php echo $row['id_artikel']?>&operation=edit" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>

                    <a href=""  class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['id_artikel'] ?>" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span>
                    
                </td>
            </tr>
                <!-- Delete Confirmation Modal-->
                     <div class="modal fade" id="confirm-delete-<?php echo $row['id_artikel'] ?>" role="dialog">
                        <div class="modal-dialog">
                          <form action="delete_artikel.php" method="POST">
                          <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Confirm</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['id_artikel'] ?>">
                                    <p>Are you sure you want to delete this user?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default pull-left">Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                              </div>
                          </form>
                          
                        </div>
                    </div>
            <?php endforeach; ?>   
        </tbody>
    </table>
    <!--    Pagination links-->
    <div class="text-center">

        <?php
        if (!empty($_GET)) {
            //we must unset $_GET[page] if built by http_build_query function
            unset($_GET['page']);
            $http_query = "?" . http_build_query($_GET);
        } else {
            $http_query = "?";
        }
        if ($total_pages > 1) {
            echo '<ul class="pagination text-center">';
            for ($i = 1; $i <= $total_pages; $i++) {
                ($page == $i) ? $li_class = ' class="active"' : $li_class = "";
                echo '<li' . $li_class . '><a href="index.php' . $http_query . '&page=' . $i . '">' . $i . '</a></li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>
