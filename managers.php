<!DOCTYPE html>
<html lang="en">
<?php
require('inc/config.php');
require('inc/functions.php');
if (!isset($_SESSION['UserData'])) 
    exit(header("location:index.php"));

    include('admin_header.php'); //get all header files together and inherit in each page
    include('admin_sidebar.php');
?>

  

 
 <!-- Main View-->
<div id="content-wrapper">

    <div class="container-fluid">
    <div id="particle"></div>

    <div class="card mb-3" style="background: rgba(221, 221, 181, 0.1);">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Table Example
                <div class="fas" style = "float:right;">
                <button type="button" id="addMan" class="btn btn-primary">Add</button>
                </div>
                </div>
            <div class="card-body" style="background: rgba(221, 221, 181, 0.3);">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Admin</th>
                                <th>Email</th>
                                <th>Category</th>
                                
                            </tr>
                        </thead>
                        <tfoot class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Admin</th>
                                <th>Email</th>
                                <th>Category</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                            $x = get_managers($con);
                            if($x!="No Managers")
                            foreach($x as $it)
                            {
                                echo '<tr>';
                                echo '<td>'.$it['Name'].'</td>';
                                echo '<td>'.$it['Surname'].'</td>';
                                echo '<td>'.$it['Admin'].'</td>';
                                echo '<td>'.$it['Email'].'</td>';
                                echo '<td>'.$it['Category'].'</td>';
                                echo '</tr>';
                            }
                            else
                            echo '<p> No Managers </p>';
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="display_error_add_manager" class="alert alert-danger fade in"></div><!-- Display Error Container -->


        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Sticky Footer -->
    <footer class="sticky-footer" style="background-color: #faf2ad;">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © GAU E-Participation 2019</span>
            </div>
        </div>
    </footer>
