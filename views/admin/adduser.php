<div class="navbar navbar-default navbar-fixed-top">
    <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="/auth/logout">Logout</a></li>
    </ul>
    <ul class="nav navbar-nav">
        <li class=""><a href="/admin">Add mood</a></li>
        <li class="active"><a href="/admin/adduser">Add/edit user</a></li>
        <li class=""><a href="/admin/logs">logs</a></li>
    </ul>
</div>
<div class="container" style="margin-top:100px;">
    <div class="row">
        <div style="margin: 0 auto; width: 450px;">
            <div class="form-area">  

                <form id="moodForm" role="form" method="post">
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Add new user</h3>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="role">
                            <option value="2">user</option>
                            <option value="1">admin</option>
                        </select>
                    </div>
                    <button type="submit" id="submit" name="submit" value="gogo" class="btn btn-primary pull-right">Add</button>
                </form>
            </div>
            <div id="forErrors">
                <?php if($this->error):?>
                    <div class="alert alert-danger">
                        <?php foreach ($this->error as $error):?>
                            <p><?=$error?></p>
                        <?php endforeach;?>
                    </div>
                <?php endif;?>
            </div>
        </div> 
    </div>
    <hr>
    <div class="row">
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>  
                <th>Username</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($this->users as $user):?>  
              <tr>
                <td><?=$user['name'];?></td>
                <td><?=$user['username'];?></td>
                <td><?=$user['role']==1?'Admin':'User';?></td>
                
                <td><a href="/admin/edituser/<?=$user['id'];?>">Edit</a></td>
              </tr>
              <?php endforeach;?>
            </tbody>
        </table>
    </div>
    
</div>