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
                        placeholder="Enter description of the course">
                </div>
                <div class="form-group">
                    <label for="date">exam date</label>
                    <input name="date" type="date" min="<?= date('Y-m-d') ?>" class="form-control" id="date"
                        placeholder="date">
                </div>
                
                <div class="form-group">
                    <label for="typeExam">type of exam.</label>
                    <select name="typeExam" class="form-control" id="typeExam">
                        <option value="0" >written</option>
                        <option value="1" >practical</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create exam</button>
            </form>
        </div>

    </div>
</div>