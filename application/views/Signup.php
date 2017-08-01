<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2>Đăng Ký</h2>
        <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'signup');
            print form_open('signup/signup', $attributes);
        ?>
            <div class="form-group">
                <div class="col-sm-12 col-md-6">
                    <input type="text" class="form-control" id="iplastname" placeholder="Họ" name="lastname" required>
                    <?php if(form_error('lastname')):?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('lastname'); ?>
                        </div>
                    <?php endif;?>
                </div>
                <div class="col-sm-12 col-md-6">
                    <input type="text" class="form-control" id="ipfirstname" placeholder="Tên"  name="firstname" required>
                    <?php if(form_error('firstname')):?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('firstname'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                    <input type="text" class="form-control" id="ipphoneormail" placeholder="Số Điện Thoại Hoặc Email" name="phoneormail"  required pattern="([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$)|((?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$)">
                    <?php if(form_error('phoneormail')):?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('phoneormail'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                    <input type="password" class="form-control" id="ippassword" placeholder="Mật Khẩu" name="password" required>
                    <?php if(form_error('password')):?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('password'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-sm-12 col-md-6">
                    <label for="drbirthday">Ngày Sinh</label>
                    <input id="ipbirthday" value="<?php print date('d-m-y');?>" readonly="readonly" type="text"  name="birthday" required>
                    <?php if(form_error('birthday')):?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('birthday'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                   <label class="radio-inline">
                        <input type="radio" name="radiogender" id="radiogenderf" value="F" required> Nữ
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="radiogender" id="radiogenderm" value="M" required > Nam
                    </label>
                    <?php if(form_error('radiogender')):?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('radiogender'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Tạo Tài Khoản</button>
                </div>
            </div>
        </from>
    </div>
</div>
