<div class="container">
    <div class="row">
        <div class="col6">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter name of the course">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input name="description" type="text" class="form-control" id="description" placeholder="Description">
                </div>
                <button type="submit" class="btn btn-primary">edit template</button>
            </form>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h2>learningpoints</h2>
            <a href="/<?= constant('URL_SUBFOLDER') ?>/learningpoint/create/<?= $courseTemplate->getId() ?>">Create new learningpoint</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>name</th>
                    <th>description</th>

                </tr>
                <?php foreach ($learningpoints as $learningpoint): ?>
                    <tr>
                        <td>
                            <?= $learningpoint->getName(); ?>
                        </td>
                        <td>
                            <?= $learningpoint->getDescription(); ?>
                        </td>
                        <td>
                            <a href="/<?= constant('URL_SUBFOLDER') ?>/learningpoint/edit/<?= $learningpoint->getId() ?>"
                               class="btn btn-info">Edit</a>
                            <a onclick="return confirm('Weet je zeker dat je deze Student wilt verwijderen?')"
                               href="/<?= constant('URL_SUBFOLDER') ?>/learningpoint/delete/<?= $learningpoint->getId() ?>"
                               class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h2>lessons</h2>
            <a href="/<?= constant('URL_SUBFOLDER') ?>/lesson/create/<?= $courseTemplate->getId() ?>">Create new lesson</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>name</th>
                    <th>description</th>
                    <th>week number</th>

                </tr>
                <?php foreach ($lessons as $lesson): ?>
                    <tr>
                        <td>
                            <?= $lesson->getName(); ?>
                        </td>
                        <td>
                            <?= $lesson->getDescription(); ?>
                        </td>
                        <td>
                            <a href="/<?= constant('URL_SUBFOLDER') ?>/course/edit/<?= $lesson->getId() ?>"
                               class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>