<div class="container">
    <div class="row">
        <div class="col-6">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter name of the course"
                        value="<?= $lesson["name"] ?>">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input name="description" type="text" class="form-control" id="description"
                        placeholder="Description" value="<?= $lesson["description"] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">select learningpoints</label>
                    <select name="learningpoints[]" multiple class="form-control" id="exampleFormControlSelect2">
                        <?php if (is_array($learningpoints)):
                            foreach ($learningpoints as $point): ?>
                                <option <?php echo ($point["active"]) ? "selected" : ""; ?> value="<?= $point["id"] ?>">
                                    <?= $point["name"] ?>
                                </option>
                            <?php endforeach; endif; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Edit lesson</button>
            </form>
            <div class="form-group">
                <label for="week">week number</label>
                <input name="week" type="number" class="form-control" id="week" placeholder="week number" min="0"
                    max="7" value="<?= $lesson["lesson_week"] ?>">
            </div>
            <div class="card mt-5">
                <div class="card-header">
                    <h4>files</h4>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <form enctype="multipart/form-data"
                                action="/<?= constant('URL_SUBFOLDER') ?>/upload/<?= $lesson["id"] ?>" method="POST">
                                <input type="file" name="upload_file" class="custom-file-input" id="inputGroupFile">
                                <label class="custom-file-label" for="inputGroupFile">Choose file</label>
                            </form>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">upload file</button>
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
                                        <a target="_blank" href=""
                                            class='btn btn-primary'>download</a>
                                    </td>
                                    <td>
                                        <a href="/file/download/pdf/<?= $file["file_name"] ?>"
                                            class='btn btn-primary'>download</a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Weet je zeker dat je deze Student wilt verwijderen?')"
                                            href="/file/delete/<?= $file["id"] ?>" class='btn btn-danger'>Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; endif; ?>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>