<div class="login-module">
    <?php if (Core::user()->id > 0) { ?>
        <div class="logged-in-user">
            <div class="login-header <?php echo (strlen(Core::user()->params->header_pattern) > 0 ? Core::user()->params->header_pattern : "topography"); ?>">
                <div class="login-avatar">
                    <a href="<?php echo Core::route("index.php?component=user&controller=profile&id=". Core::user()->id); ?>"><img src="<?php echo Core::user()->avatar; ?>" /></a>
                </div>
                <div class="login-username">
                    <a href="<?php echo Core::route("index.php?component=user&controller=profile&id=". Core::user()->id); ?>"><?php echo Core::user()->username; ?></a>
                </div>
            </div>
            <ul class="login-options">
                <li><a href="<?php echo Core::route("index.php?component=user&controller=profile&id=". Core::user()->id); ?>">My Profile</a></li>
                <li><a href="<?php echo Core::route("index.php?component=user&controller=settings"); ?>">Settings</a></li>
                <?php if (Core::user()->usergroup->is_admin == 1) { ?>
                    <li><a href="<?php echo BASE_URL; ?>admin" target="_blank">Admin Panel</a></li>
                <?php } ?>
                <li><a href="<?php echo Core::route("index.php?component=user&controller=user&task=logout"); ?>">Logout</a></li>
            </ul>
        </div>
    <?php } else { ?>
        <form action="<?php echo $this->route("index.php?component=user&controller=user&task=login"); ?>" method="post">
            <div class="form-group">
                <label class="col-form-label"><strong>Username:</strong></label>
                <input type="text" name="username" class="form-control" />
            </div>
            <div class="form-group">
                <label class="col-form-label"><strong>Password:</strong></label>
                <input type="password" name="password" class="form-control" />
            </div>
            <div class="form-group form-check" style="margin-bottom: 40px;">
                <input type="checkbox" class="form-check-input" name="remember" style="margin-top: .2rem;">
                <label class="form-check-label">Remember me</label>
            </div>
            <p style="text-align: right;">
                <a href="<?php echo Core::route("index.php?component=user&controller=requestreset"); ?>">Forgotten password?</a>
            </p>
            <button type="submit" class="button pull-right"><i class="fa fa-key"></i> Login</button> <a href="<?php echo $this->route("index.php?component=user&controller=register"); ?>" class="button hollow pull-right">Don't have an account?</a>
            <div class="clearfix"></div>
        </form>
    <?php } ?>
</div>