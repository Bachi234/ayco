<main>
    <?= form_open('Login/validate'); ?>
        <?php if ($this->session->has_userdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->userdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="InputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label for="InputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary form-control" name="login">Login</button>
    <?= form_close(); ?>
</main>