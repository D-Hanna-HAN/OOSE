<div class="container">
    <div class="row">
        <div class="col-6">
            <form method="POST" action="">
                
                <div class="form-group">
                    <label for="exampleFormControlSelect2">select course template</label>
                    <select name="courseTemplateId" class="form-control" id="exampleFormControlSelect2">
                        <?php if(is_array($courses)): foreach($courses AS $course): ?>
                        <option value="<?= $course["id"] ?>" ><?= $course["name"] ?></option>
                        <?php endforeach; endif;?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="class">select class</label>
                    <select name="classId" class="form-control" id="class">
                        <?php if(is_array($classes)): foreach($classes AS $class): ?>
                        <option value="<?= $class["id"] ?>" ><?= $class["name"] ?></option>
                        <?php endforeach; endif;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="start_date">start date</label>
                    <input name="startDate" type="date" class="form-control" id="start_date"
                        placeholder="start date" min="<?= date("Y-m-d") ?>">
                </div>
                <button type="submit" class="btn btn-primary">Create lesson</button>
            </form>
        </div>

    </div>
</div>