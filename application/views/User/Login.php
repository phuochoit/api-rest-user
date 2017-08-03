<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="title">Đăng Nhập</h2>

        <?php
            if(!empty($FBdata['authUrl'])) {
                echo '<a href="'.htmlspecialchars($FBdata['authUrl']).'"><img src="'.base_url('assets/image/facebook-login.png').'" alt=""/></a>';
            }else{
                echo '<a href="'.htmlspecialchars($FBdata['logoutUrl']).'"><img src="'.base_url('assets/image/facebook-login.png').'" alt=""/></a>';
            }
        ?>

        <?php
        $attributes = array('class' => 'form-horizontal', 'id' => 'login');
        print form_open('login', $attributes);
?>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                    <input type="text" class="form-control" id="ipphoneormail" placeholder="Số Điện Thoại Hoặc Email" name="phoneormail" >
                    <?php if (form_error('phoneormail')) :?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('phoneormail'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                    <input type="password" class="form-control" id="ippassword" placeholder="Mật Khẩu" name="password" >
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
