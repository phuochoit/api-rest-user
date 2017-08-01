<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="title">Đăng Nhập</h2>
        <?php
        $attributes = array('class' => 'form-horizontal', 'id' => 'login');
        print form_open('login', $attributes);
?>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                    <input type="text" class="form-control" id="ipphoneormail" placeholder="Số Điện Thoại Hoặc Email" name="phoneormail"  required pattern="([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$)|((?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$)">
                    <?php if (form_error('phoneormail')) :?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('phoneormail'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                    <input type="password" class="form-control" id="ippassword" placeholder="Mật Khẩu" name="password" required>
                    <?php if (form_error('password')) :?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('password'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-default btn-login">Đăng Nhập</button>
                </div>
            </div>
        </from>
    </div>
</div>
