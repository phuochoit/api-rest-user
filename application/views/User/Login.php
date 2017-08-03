
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="title">Đăng Nhập</h2>
        <div class="col-sm-12 col-md-6 container-btn-login login-facebook">
            <?php
                if(isset($FBdata) && !empty($FBdata['authUrl'])) {
                    echo '<a href="'.htmlspecialchars($FBdata['authUrl']).'" class="btn btn-primary btn-primary">Login By Facebook</a>';
                }else{
                     echo '<a href="'.htmlspecialchars($FBdata['logoutUrl']).'" class="btn btn-primary btn-primary">Logout By Facebook</a>';
                }
            ?>
        </div>
        <div class="col-sm-12 col-md-6 container-btn-login login-google">
            <?php
                if(isset($GGdata) && !empty($GGdata['authUrl'])) {
                     echo '<a href="'.htmlspecialchars($GGdata['authUrl']).'" class="btn btn-primary btn-primary">Login By Google</a>';
                }else{
                     echo '<a href="'.htmlspecialchars($GGdata['logoutUrl']).'" class="btn btn-primary btn-primary">Logout By Google</a>';
                }
            ?>
        </div>
        <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'login');
            print form_open('user', $attributes);
        ?>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                    <input type="text" class="form-control" id="ipphoneormail" placeholder="Số Điện Thoại Hoặc Email" name="phoneormail" value="<?php echo set_value('phoneormail'); ?>">
                    <p id="phoneormail_error" class="bg-danger  error"></p>
                    <?php if (form_error('phoneormail')) :?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('phoneormail'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                    <input type="password" class="form-control" id="ippassword" placeholder="Mật Khẩu" name="password" value="<?php echo set_value('password'); ?>">
                    <p id="password_error" class="bg-danger error" ></p>
                    <?php if (form_error('password')) :?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('password'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group form-group-submit">
                <div class="col-sm-12 col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-default btn-login">Đăng Nhập</button>
                </div>
            </div>
        </from>
    </div>
</div>
