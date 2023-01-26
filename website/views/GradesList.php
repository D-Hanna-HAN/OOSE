<div class="container">

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
                                <?= $exam["grade"]  ?>
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