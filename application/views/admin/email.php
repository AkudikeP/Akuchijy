
                  <div class="panel-heading no-title"> </div>
                  <!-- vd_panel-heading -->
                  
                  <div class="panel-body">
                    <h2 class="mgtp--10"><i class="icon-feather mgr-10 vd_green"></i> Compose New Email </h2>
                    <br/>
                    <?php echo form_open_multipart("Product/send_message/",array("class"=>"form-horizontal"));?>
                      <div class="form-group clearfix">
                        <label class="col-sm-2 control-label">To</label>
                        <div class="col-sm-10 controls">
                          <input id="email-input" type="text" class="input-border-btm" placeholder="someone@example.com" name="to_email" >
                        </div>
                      </div>
                      <div class="form-group  clearfix">
                        <label class="col-sm-2 control-label">Subject</label>
                        <div class="col-sm-10 controls">
                          <input type="text" id="subject-input" class="input-border-btm" placeholder="Subject Title" name="subject">
                        </div>
                      </div>
                      <br/>
                      <div class="form-group  clearfix">
                        <label class="col-sm-12 control-label sr-only">Message</label>
                        <div class="col-sm-12 controls">
                          <textarea id="message" class="width-100 form-control"  rows="15" placeholder="Write your message here" name="message"></textarea>
                        </div>
                      </div>
                      <div class="form-group form-actions">
                        <div class="col-sm-12">
                          <button type="submit" class="btn vd_btn vd_bg-green vd_white"><i class="fa fa-envelope append-icon"></i> SEND</button>           
                        </div>
                      </div>
                    <?php echo form_close();?>

                  </div>
                  <!-- panel-body  -->
                  
                </div>