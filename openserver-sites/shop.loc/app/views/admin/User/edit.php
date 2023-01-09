<!-- Default box -->
<div class="card">

    <div class="card-body">

        <form action="" method="post" class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label class="required" for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?= h($user['email']) ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="required" for="name">Имя</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= h($user['name']) ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="required" for="address">Адрес</label>
                    <input type="text" name="address" class="form-control" id="address" value="<?= h($user['address']) ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="required" for="role">Роль</label>
                    <select name="role" id="role" class="form-control">
                        <option value="user" <?php if ($user['role'] == 'user') echo 'selected' ?>>Пользователь</option>
                        <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected' ?>>Администратор</option>
                    </select>
                </div>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>

        </form>

    </div>


</div>
<!-- /.card -->
