<div class="container">
    <div class="row">
        <div class="col-6">
                <div class="form-group">
                    <label for="name">name</label>
                    <input name="name" readonly type="text" class="form-control" id="name" placeholder="Enter name of the course"
                        value="<?= $lesson["name"] ?>">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input name="description" readonly type="text" class="form-control" id="description"
                        placeholder="Description" value="<?= $lesson["description"] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">learningpoints</label>
                    <select name="learningpoints[]" readonly multiple class="form-control" id="exampleFormControlSelect2">
                        <?php if (is_array($learningpoints)):
                            foreach ($learningpoints as $point): ?>
                                <option>
                                    <?= $point["name"] ?>
                                </option>
                            <?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week">week number</label>
                    <input name="week" readonly type="number" class="form-control" id="week" placeholder="week number" min="0"
                        max="7" value="<?= $lesson["lesson_week"] ?>">
                </div>
            <div class="card mt-5">
                <div class="card-header">
                    <h4>files</h4>

                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>filename</th>
                            <th>download original</th>
                            <th>download pdf</th>

                        </tr>
                        <?php
                        if (is_array($files)): foreach ($files as $file):
                                ?>
                                <tr>
                                    <td>
                                        <?= $file["file_name"]; ?>
                                    </td>
                                    <td>
                                        <a target="" href="/<?= constant('URL_SUBFOLDER') ?>/download/<?= $lesson["id"] . "/" . $file["file_name"] ?>/false" class='btn btn-primary'>download</a>
                                    </td>
                                    <td>
                                        <a href="/<?= constant('URL_SUBFOLDER') ?>/download/<?= $lesson["id"] . "/" .  $file["file_name"] ?>/pdf"
                                            class='btn btn-primary'>download</a>
                                    </td>
                                </tr>
                            <?php endforeach; endif; ?>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>