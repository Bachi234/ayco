<main>
    <a href="<?= site_url('Login/logout') ?>" class="btn btn-outline-primary">
        Logout
    </a>
    <a href="<?= current_url() . '/add_user' ?>" class="btn btn-success">
        Add User
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr class="align-middle">
                    <td><?= $user->id ?></td>
                    <td><?= $user->first_name ?></td>
                    <td><?= $user->last_name ?></td>
                    <td><?= $user->username ?></td>
                    <td><?= $user->password ?></td>
                    <td>
                        <a href="<?= current_url() . '/edit_user/' . $user->id ?>" class="btn btn-outline-secondary" name="edit-user">
                            Edit
                        </a>
                        <a href="<?= current_url() . '/delete_user/' . $user->id ?>" class="btn btn-outline-danger" name="delete-user">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?= $this->pagination->create_links() ?>
</main>