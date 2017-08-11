<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2>Form Upload </h2>
        <?php if(isset($error) && !empty($error)) :  ?>
            <div class="alert alert-danger alert-dismissible" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <p><?php echo $error;?></p>
            </div>
        <?php endif;?>
        <?php if(isset($upload_data) && !empty($upload_data)):?>
            <ul>
                <?php foreach ($upload_data as $item => $value):?>
                    <li><?php echo $item;?>: <?php echo $value;?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif;?>
        <?php 
            $attributes = array('class' => 'form-horizontal', 'id' => 'upload');
            echo form_open_multipart('upload/save',$attributes); ?>
            <div class="form-group col-lg-12">
                <label for="InputFile">File input</label>
                <input type="file" id="userfile" name="userfile" size="20" >
                <p class="help-block">Please upload image.</p>
            </div>
            <!-- <input type="submit" value="upload" /> -->
            <div class="form-group col-lg-12">
                <button type="submit" name="uploadFile" class="btn btn-default">Submit</button>
            </div>
        </form>
    </div>
</div>