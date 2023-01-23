<div class="container">
    <div class="row">
        <div class="col-6">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">name</label>
                    <input name="name" type="text" class="form-control" id="name"
                        placeholder="Enter name of the course">
                </div>
                <div class="form-group">
                    <label for="startyear">startyear</label>
                    <input name="startyear" type="number" min="2000" max="3000" class="form-control" id="startyear"
                        placeholder="startyear">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">select students</label>
                    <select name="students[]" multiple class="form-control" id="exampleFormControlSelect2">
                        <?php if (is_array($students)):
                            foreach ($students as $student): ?>
                                <option value="<?= $student["id"] ?>"><?= $student["firstname"] . " " . $student["lastname"] ?>
                                </option>
                            <?php endforeach; endif; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create class</button>
            </form>
        </div>

    </div>
</div>