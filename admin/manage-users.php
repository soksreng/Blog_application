<?php
include 'partial/header.php';
?>

<section class="dashboard">
    <div class="container dashboard_container">

        <button class="sidebar_toggle" id="show_sidebar-btn">                
            <i class="fa-solid fa-right-long"></i>
        </button>
        <button class="sidebar_toggle" id="hide_sidebar-btn">                
            <i class="fa-solid fa-left-long"></i>
        </button>
        <aside>
            <ul>
                <li><a href="add-post.html"><i class="fa-solid fa-pen-nib"></i><h5>Add Post</h5></a></li>
                <li><a href="dashboard.html"><i class="fa-solid fa-pen-to-square"></i><h5>Manage Post</h5></a></li>
                <li><a href="add-user.html"><i class="fa-solid fa-user"></i><h5>Add User</h5></a></li>
                <li><a href="edit-user.html" class ="active"><i class="fa-solid fa-user-pen"></i><h5>Manage User</h5></a></li>
                <li><a href="add-category.html"><i class="fa-regular fa-pen-to-square"></i><h5>Add Category</h5></a></li>
                <li><a href="manage-categories.html" ><i class="fa-solid fa-list"></i><h5>Manage Categories</h5></a></li>
            </ul>
        </aside>

        <main>
            <h2>Manage Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jackkie</td>
                        <td>jackkie</td>
                        <td><a href="edit-user.html" class= "btn sm">Edit</a></td>
                        <td><a href="delete-category.html" class= "btn sm delete">Delete</a></td>
                        <td>YES</td>
                        
                    </tr>
                    <tr>
                        <td>Reaksa</td>
                        <td>iwin</td>
                        <td><a href="edit-user.html" class= "btn sm">Edit</a></td>
                        <td><a href="delete-category.html" class= "btn sm delete ">Delete</a></td>
                        <td>No</td>
                        
                    </tr>
                    <tr>
                        <td>Lyly</td>
                        <td>kter</td>
                        <td><a href="edit-user.html" class= "btn sm">Edit</a></td>
                        <td><a href="delete-category.html" class= "btn sm delete">Delete</a></td>
                        <td>No</td>
                        
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</section>

<?php
include '../partial/footer.php';
?>