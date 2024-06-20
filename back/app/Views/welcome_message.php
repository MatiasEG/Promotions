<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Documnet</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>

    <body>
        <div class="container">
            <!-- TITLE -->
            <div class="row">
                <div class="h2">PROMOS</div>
            </div>

            <!-- FORM -->
            <div class="mb-5">
                <?php echo form_open_multipart('welcome_message/addPromo', ['id' => 'form-promo']); ?>
                <!--form action=""-->
                    <div class="row">
                        <div id="form-subtitle" class="h4">Create new promo here</div>
                        <div class="form-group col-sm-4">
                            <label for="">Promo title</label>
                            <input type="text" name="promo_title" id="promo_title" class="form-control" placeholder="Title for the new promo" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Promo start date</label>
                            <input type="date" name="promo_start_date" id="promo_start_date" class="form-control" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Promo end date</label>
                            <input type="date" name="promo_end_date" id="promo_end_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="">Promo image file</label>
                            <input type="file" name="promo_image" id="promo_image" class="form-control-file btn" accept="image/*"></div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="">Promo description</label>
                            <textarea type="text" name="promo_description" id="promo_description" class="form-control" placeholder="Description for the new promo" required></textarea>
                        </div>
                    </div>
                    <button id="save-button" type="submit" class="btn mt-3 btn-primary btn-block">Save new promo</button>
                    <button id="cancel-button" type="button" class="btn mt-3 btn-secondary" style="display: none;" onclick="cancelEdit()">Cancel</button>
                <!--/form-->
                <?php echo form_close(); ?>
            </div>

            <!-- DATA TABLE -->
             <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="h4">Registered promos in database</div>
                    </div>
                    <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Img</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 0;
                                foreach ($promos as $promo){
                                    echo '
                                        <tr>
                                            <td>'.$promo->id.'</td>
                                            <td>'.$promo->title.'</td>
                                            <td>'.$promo->description.'</td>
                                            <td><img src="'.$promo->img.'" alt="Promo Image" style="width: 100px; height: auto;"></td>
                                            <td>'.$promo->promo_start_date.'</td>
                                            <td>'.$promo->promo_end_date.'</td>
                                            <td><button onclick="editMode('.$promo->id.',`'.$promo->title.'`,`'.$promo->img.'`,`'.$promo->description.'`,`'.$promo->promo_start_date.'`,`'.$promo->promo_end_date.'`)" type="button" class="btn btn-warning">Edit</button></td>
                                            <td><a href="'.base_url('welcome_message/deletePromo/'.$promo->id).'" type="button" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
             </div>
        </div>
        <script>
            let url = "<?php echo base_url('welcome_message/editPromo') ?>";
            const editMode = (id, title, image, description, promo_start_date, promo_end_date) => {
                let path = url+"/"+id;
                document.getElementById('form-promo').setAttribute('action', path);
                document.getElementById('promo_title').value = title;
                document.getElementById('promo_image').value = image;
                document.getElementById('promo_description').value = description;
                document.getElementById('promo_start_date').value = promo_start_date;
                document.getElementById('promo_end_date').value = promo_end_date;

                document.getElementById('form-subtitle').innerText = "Edit promo here";
                document.getElementById('save-button').innerText = "Update promo";
                document.getElementById('cancel-button').style.display = "inline-block";
            }
            const cancelEdit = () => {
                document.getElementById('form-promo').setAttribute('action', '<?php echo base_url('welcome_message/addPromo'); ?>');
                document.getElementById('promo_title').value = '';
                document.getElementById('promo_description').value = '';
                document.getElementById('promo_start_date').value = '';
                document.getElementById('promo_end_date').value = '';
                document.getElementById('form-subtitle').innerText = "Create new promo here";
                document.getElementById('save-button').innerText = "Save new promo";
                document.getElementById('cancel-button').style.display = "none";
            }
        </script>
    </body>
</html>