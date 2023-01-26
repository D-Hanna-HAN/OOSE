<div class="container">
    <div class="form-group">
        <label for="name">class name</label>
        <input name="name" type="text" class="form-control" id="name" readonly placeholder="name"
            value="<?= $class["name"] ?>">
    </div>

    <div class="form-group">
        <label for="description">start year</label>
        <input name="description" type="text" class="form-control" id="description" readonly placeholder="description"
            value="<?= $class["start_year"] ?>">
    </div>
    <div class="">
        <div class="card mt-5">
            <div class="card-header">
                <h2>All students</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>firstname</th>
                        <th>lastname</th>

                    </tr>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td>
                                <?= $student["firstname"]; ?>
                            </td>
                            <td>
                                <?= $student["lastname"]; ?>
                            </td>
                            <td>
                                <a href="/<?= constant('URL_SUBFOLDER') ?>/student/edit/<?= $student["id"]; ?>"
                                    class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</div>