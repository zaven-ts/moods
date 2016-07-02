<div class="navbar navbar-default navbar-fixed-top">
    <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="/auth/logout">Logout</a></li>
    </ul>
    <ul class="nav navbar-nav">
        <li class=""><a href="/admin">Add mood</a></li>
        <li class=""><a href="/admin/adduser">Add/edit user</a></li>
        <li class="active"><a href="/admin/logs">logs</a></li>
    </ul>
</div>
<div class="container" style="margin-top:100px;">
    
    <hr>
    <div class="row">
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Type</th>  
                <th>Description</th>
                <th>Created at</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($this->logs as $log):?>  
              <tr>
                <td><?=$log['type'];?></td>
                <td><?=$log['description'];?></td>
                <td><?=$log['created_at'];?></td>
                
              </tr>
              <?php endforeach;?>
            </tbody>
        </table>
    </div>
    
</div>