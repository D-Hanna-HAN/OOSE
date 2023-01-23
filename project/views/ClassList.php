<div class="container">

    <div class="">
        <div class="card mt-5">
            <div class="card-header">
                <h2>All classes</h2>
                <a href="/<?= constant('URL_SUBFOLDER') ?>/class/create/">Create new class</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>name</th>
                        <th>schoolyear</th>

                    </tr>
                    <?php foreach ($classes as $class): ?>
                        <tr>
                            <td>
                                <?= $class["name"]; ?>
                            </td>
                            <td>
                                <?= $class["start_year"]; ?>
                            </td>
                            <td>
                                <a href="/<?= constant('URL_SUBFOLDER') ?>/class/edit/<?= $class["id"]; ?>"
                                    class="btn btn-info">Edit</a>
                                <a href="/<?= constant('URL_SUBFOLDER') ?>/class/view/<?= $class["id"]; ?>"
                                    class="btn btn-info">view</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</div>