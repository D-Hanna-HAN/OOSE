<div class="container">
    <div class="row">
        <div class="col6">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter name of the course"
                        value="<?= $courseTemplate["name"] ?>">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input name="description" type="text" class="form-control" id="description"
                        placeholder="Description" value="<?= $courseTemplate["description"] ?>">
                </div>
                <button type="submit" class="btn btn-primary">edit template</button>
            </form>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h2>learningpoints</h2>
            <a href="/<?= constant('URL_SUBFOLDER') ?>/learningpoint/create/<?= $courseTemplate['id'] ?>">Create new
                learningpoint</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>name</th>
                    <th>description</th>

                </tr>
                <?php
                if (is_array($learningpoints)):
                    foreach ($learningpoints as $learningpoint):
                        ?>
                        <tr>
                            <td>
                                <?= $learningpoint["name"] ?>
                            </td>
                            <td>
                                <?= $learningpoint["description"] ?>
                            </td>
                            <td>
                                <a href="/<?= constant('URL_SUBFOLDER') ?>/learningpoint/edit/<?= $learningpoint["id"] ?>"
                                    class="btn btn-info">Edit</a>
                                <a onclick="return confirm('Weet je zeker dat je deze learningpoint wilt verwijderen?')"
                                    href="/<?= constant('URL_SUBFOLDER') ?>/learningpoint/delete/<?= $courseTemplate["id"] ?>/<?= $learningpoint["id"] ?>"
                                    class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                endif;
                ?>
            </table>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h2>lessons</h2>
            <a href="/<?= constant('URL_SUBFOLDER') ?>/lesson/create/<?= $courseTemplate["id"] ?>">Create new lesson</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>name</th>
                    <th>description</th>
                    <th>week number</th>

                </tr>
                <?php
                if (is_array($lessons)): foreach ($lessons as $lesson):
                        ?>
                        <tr>
                            <td>
                                <?= $lesson["name"] ?>
                            </td>
                            <td>
                                <?= $lesson["description"] ?>
                            </td>
                            <td>
                                <?= $lesson["lesson_week"] ?>
                            </td>
                            <td>
                                <a href="/<?= constant('URL_SUBFOLDER') ?>/lesson/edit/<?= $lesson["id"] ?>"
                                    class="btn btn-info">Edit</a>
                                <a onclick="return confirm('Weet je zeker dat je deze learningpoint wilt verwijderen?')"
                                    href="/<?= constant('URL_SUBFOLDER') ?>/lesson/delete/<?= $courseTemplate["id"] ?>/<?= $lesson["id"] ?>"
                                    class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                endif;
                ?>
            </table>
        </div>
    </div>
</div>