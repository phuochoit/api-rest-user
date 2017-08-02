<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="title">Đăng Ký</h2>
        <p class="status-title">Luôn miễn phí</p>
        <?php if ($this->session->flashdata('errorSingup')) : ?>
            <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p><?php echo $this->session->flashdata('errorSingup'); ?></p>
            </div>
            <?php endif; ?>
        <?php
        
            $attributes = array('class' => 'form-horizontal', 'id' => 'signup');
            print form_open('signup/signup', $attributes);
        ?>
            <div class="form-group">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 form-col">
                    <input type="text" class="form-control" id="iplastname" placeholder="Họ" name="lastname" value="<?php print set_value('lastname'); ?>">
                    <p id="lastname_error" class="bg-danger error"></p>
                    <?php if (form_error('lastname')) :?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('lastname'); ?>
                        </div>
                    <?php endif;?>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 form-col">
                    <input type="text" class="form-control" id="ipfirstname" placeholder="Tên"  name="firstname" value="<?php echo set_value('firstname'); ?>">
                    <p id="firstname_error"  class="bg-danger error"></span>
                    <?php if (form_error('firstname')) :?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('firstname'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                    <input type="text" class="form-control" id="ipphoneormail" placeholder="Số Điện Thoại Hoặc Email" name="phoneormail" value="<?php echo set_value('phoneormail'); ?>" >
                    <p id="phoneormail_error"  class="bg-danger  error"></p>
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
            <div class="form-group ">
                <div class="col-sm-12 col-md-12">
                    <label for="drbirthday" class="label-birthday">Ngày Sinh</label>
                </div>
                <div class="col-sm-7 col-md-7 col-xs-12 form-col ">
                    <select class="form-control select-birthday" name="birthday_day" title="Ngày">
                         <option value="">Ngày</option>  
                        <?php for ($d=1; $d <= 31; $d++) {  ?>
                            <option value="<?php print $d?>" <?php print  set_select('birthday_day', $d); ?>><?php print $d?></option>  
                        <?php }?>
                        
                    </select>
                    <select class="form-control select-birthday" name="birthday_month" title="Tháng">
                         <option value="">Tháng</option>  
                        <?php for ($m=1; $m <= 12; $m++) {  ?>
                            <option value="<?php print $m?>" <?php print  set_select('birthday_month', $m); ?>><?php print $m?></option>  
                        <?php }?>
                    </select>
                    <select class="form-control select-birthday" name="birthday_year" title="Năm">
                        <option value="">Năm</option>  
                        <?php for ($y=1905; $y <= date('Y'); $y++) {  ?>
                            <option value="<?php print $y?>" <?php print  set_select('birthday_year', $y); ?>><?php print $y?></option>  
                        <?php }?>
                    </select>
                    <?php if (form_error('birthday_day') || form_error('birthday_month') || form_error('birthday_year')) :?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <p>The Birthday field is required.</p>
                        </div>
                    <?php endif;?>

                    <p id="birthday_error" class="bg-danger error" ></p>
                </div>
                <div class="col-sm-5 col-md-5 col-xs-12 form-col">
                    <a class="mlm _58ms" id="birthday-help" href="#" ajaxify="#" title="Nhấp chuột để biết thêm thông tin" rel="async" role="button">Tại sao tôi cần cung cấp ngày sinh của mình?</a>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                   <div class="radio-inline">
                        <input type="radio" name="radiogender" id="radiogenderf" value="F" <?php echo  set_radio('radiogender', 'F'); ?>> 
                        <label class="lable-gender" >Nữ</label>
                        
                    </div>
                    <div class="radio-inline">
                        <input type="radio" name="radiogender" id="radiogenderm" value="M" <?php echo  set_radio('radiogender', 'M'); ?>> 
                        <label class="lable-gender" >Nam</label>
                    </div>
                    <p id="radiogender_error"  class="bg-danger error"></p>
                    <?php if (form_error('radiogender')) :?>
                        <div class="alert-signup alert alert-danger alert-dismissible fade in" role="alert"> 
                            <?php print form_error('radiogender'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                    <p class="descrition">Bằng cách nhấp vào Tạo tài khoản, bạn đồng ý với <a href="#">Điều khoản</a> của chúng tôi và rằng bạn đã đọc <a href="#">Chính sách dữ liệu</a> của chúng tôi, bao gồm <a href="#">Sử dụng cookie</a>. Bạn có thể nhận được thông báo qua SMS từ Facebook và có thể bỏ chọn bất kỳ lúc nào.</p>
                </div>
            </div>
            <div class="form-group form-group-submit">
                <div class="col-sm-12 col-md-6 col-md-offset-3">
                    <button type="submit" id="signup_submit" class="btn btn-default">Tạo Tài Khoản</button>
                </div>
            </div>
        </from>
    </div>
</div>
