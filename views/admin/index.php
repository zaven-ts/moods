<div class="navbar navbar-default navbar-fixed-top">
    <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="/auth/logout">Logout</a></li>
    </ul>
    <ul class="nav navbar-nav">
        <li class="active"><a href="/admin">Add mood</a></li>
        <li class=""><a href="/admin/adduser">Add/edit user</a></li>
        <li class=""><a href="/admin/logs">logs</a></li>
    </ul>
</div>
<div class="container" style="margin-top:100px;">
    <div class="row">
        <div style="margin: 0 auto; width: 450px;">
            <div class="form-area">  

                <form id="moodForm" role="form" method="post">
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Add new mood</h3>
                    <p class="small">You can use template tag <strong>%name%</strong></p>
                    <div class="form-group">
                        <textarea rows="6" class="form-control" id="moodtext" name="moodtext" placeholder="Moodtext"></textarea>
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
    
</div>