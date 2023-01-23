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
                    <label for="description">description</label>
                    <input name="description" type="text" class="form-control" id="description"
                        placeholder="Description">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">select learningpoints</label>
                    <select name="learningpoints[]" multiple class="form-control" id="exampleFormControlSelect2">
                        <?php if(is_array($learningpoints)): foreach($learningpoints AS $point): ?>
                        <option value="<?= $point["id"] ?>" ><?= $point["name"] ?></option>
                        <?php endforeach; endif;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="week">week number</label>
                    <input name="week" type="number" class="form-control" id="week"
                        placeholder="week number" min="0" max="7">
                </div>
                <button type="submit" class="btn btn-primary">Create lesson</button>
            </form>
        </div>

    </div>
</div>