<?php
    $path = '';

    if (str_contains(current_url(), 'edit_user')) {
        $path = 'Profile/update_user/' . $user->id;
    } 

    if (str_contains(current_url(), 'add_user')) {
        $path = 'Profile/insert_user';
    }
?>

<main>
    <a href="<?= site_url('Profile') ?>" class="text-primary" name="back">
        Back
    </a>
    <?= form_open_multipart($path); ?>
        <div class="mb-3">
            <label for="FirstNameField" class="form-label">First Name</label>
            <input type="text" class="form-control" value="<?= str_contains(current_url(), 'edit_user') ? $user->first_name : '' ?>" name="first_name">
            <span class="text-danger"><?= form_error('first_name') ?></span>
        </div>
        <div class="mb-3">
            <label for="LastNameField" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?= str_contains(current_url(), 'edit_user') ? $user->last_name : '' ?>" name="last_name">
            <span class="text-danger"><?= form_error('last_name') ?></span>
        </div>
        <div class="mb-3">
            <label for="UsernameField" class="form-label">Username</label>
            <input type="text" class="form-control" value="<?= str_contains(current_url(), 'edit_user') ? $user->username : '' ?>" name="username">
            <span class="text-danger"><?= form_error('username') ?></span>
        </div>
        <div class="mb-3">
            <label for="PasswordField" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            <span class="text-danger"><?= form_error('password') ?></span>
        </div>
        <?php if (str_contains(current_url(), 'add_user') or str_contains(current_url(), 'insert_user')): ?>
            <div class="mb-3">
                <label for="UserAvatar" class="form-label">User Avatar</label>
                <input class="form-control" type="file" name="avatar">
                <span class="text-danger"><?= form_error('avatar') ?></span>
            </div>
        <?php endif; ?>
    <?= form_close(); ?>
</main>