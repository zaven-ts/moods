<div class="container">
    <div style="margin: 0 auto; width: 450px;">
        <div class="form-area">  
            
            <form id="loginForm" role="form" method="post">
                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">MoodMaster login</h3>
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                
                <button type="submit" id="submit" name="submit" value="gogo" class="btn btn-primary pull-right">Login</button>
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