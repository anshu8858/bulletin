<div class="register-container">
    <h1 class="component-title">Register an account</h1>
    <form action="<?php echo $this->route("index.php?component=user&controller=user&task=register"); ?>" method="post">
        <div class="frame">
            <div class="frame-3">
                <strong>Username:</strong>
            </div>
            <div class="frame-9">
                <input type="text" name="username" required />
            </div>
        </div>
        <div class="frame">
            <div class="frame-3">
                <strong>Real Name:</strong>
            </div>
            <div class="frame-9">
                <input type="text" name="real_name" required />
            </div>
        </div>
        <div class="frame">
            <div class="frame-3">
                <strong>Password:</strong>
            </div>
            <div class="frame-9">
                <input type="password" name="password" required />
            </div>
        </div>
        <div class="frame">
            <div class="frame-3">
                <strong>Password (again):</strong>
            </div>
            <div class="frame-9">
                <input type="password" name="password_again" required />
            </div>
        </div>
        <div class="frame">
            <div class="frame-3">
                <strong>Email Address:</strong>
            </div>
            <div class="frame-9">
                <input type="email" name="email" required />
            </div>
        </div>
        <button type="submit" class="button"><i class="fa fa-users"></i> Register</button>
    </form>
</div>