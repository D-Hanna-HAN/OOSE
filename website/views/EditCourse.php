<div class="container">
    <div class="row">
        <div class="col-6">

            <div class="form-group">
                <label for="name">name</label>
                <input name="name" type="text" class="form-control" id="name" readonly placeholder="name"
                    value="<?= $template["name"] ?>">
            </div>

            <div class="form-group">
                <label for="description">description</label>
                <input name="description" type="text" class="form-control" id="description" readonly
                    placeholder="description" value="<?= $template["description"] ?>">
            </div>
            <div class="form-group">
                <label for="start_date">start date</label>
                <input name="startDate" type="text" class="form-control" id="start_date" readonly
                    placeholder="start date" value="<?= $course["start_date"] ?>">
            </div>
        </div>

    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h2>learningpoints</h2>
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
                                <a href="/<?= constant('URL_SUBFOLDER') ?>/lesson/view/<?= $lesson["id"] ?>"
                                    class="btn btn-info">View</a>
                                
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
            <h2>exams</h2>
            <a href="/<?= constant('URL_SUBFOLDER') ?>/exam/create/<?= $course["id"] ?>">Create new exam</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>name</th>
                    <th>description</th>
                    <th>date</th>
                    <th>type exam</th>

                </tr>
                <?php
                if (is_array($exams)): foreach ($exams as $exam):
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
                        </tr>
                        <?php
                    endforeach;
                endif;
                ?>
            </table>
        </div>
    </div>
</div>