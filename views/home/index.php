<div class="navbar navbar-default navbar-fixed-top">
    <ul class="nav navbar-nav">
        <li class=""><a href="/auth/logout">Logout</a></li>
    </ul>
</div>
<div class="container" style="margin-top:100px;">
    <div class="row">
        <div id="forErrors"></div>
        <form role="form" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <button type="submit" name="gogo" value="send" class="btn btn-default">Send</button>
        </form>   
    </div>
    <hr>
    <div class="row">
        <?php if($this->mood):?>
            <div class="alert alert-info"><?=$this->mood?></div>
        <?php endif;?>
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