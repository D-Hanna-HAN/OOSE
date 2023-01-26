<div class="container">
    <div class="row">
        <div class="col6">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="firstname">firstname</label>
                    <input name="firstname" type="text" class="form-control" id="firstname"
                        value="<?= $student["firstname"] ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">lastname</label>
                    <input name="lastname" type="text" class="form-control" id="lastname"
                        value="<?= $student["lastname"] ?>">
                </div>
                <div class="form-group">
                    <label for="class">current class</label>
                    <input name="class" type="text" class="form-control" id="class" readonly placeholder="class"
                        value="<?= $student["name"] ?>">
                </div>
                <button type="submit" class="btn btn-primary">edit student</button>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header">
            <h2>grades</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>exam name</th>
                    <th>description</th>
                    <th>exam date</th>
                    <th>grade</th>

                </tr>
                <?php
                if (is_array($exams)):
                    foreach ($exams as $exam):
                        ?>
                        <tr>
                            <td>
                                <?= $exam["name"] ?>
                            </td>
                            <td>
                                <?= $exam["description"] ?>
                            </td>
                            <td>
                                <?= $exam["date"] ?>
                            </td>
                            <td>
                                <form method="post">

                                    <div class="form-group">
                                        <input name="grade" type="number" class="form-control" id="class" placeholder="0"
                                            value="<?= $exam["grade"] ?>">
                                        <input name="examId" type="hidden" class="form-control" id="class" placeholder="0"
                                            value="<?= $exam["id"] ?>">
                                        <input name="gradeId" type="hidden" class="form-control" id="class" placeholder="0"
                                            value="<?= $exam["gradeId"] ?>">
                                        <button class="btn-primary" type="submit">
                                            save
                                        </button>
                                    </div>
                                </form>
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