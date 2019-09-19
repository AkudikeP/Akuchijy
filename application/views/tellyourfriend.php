
<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8" />

        <title>Mobile Darzi</title>

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style-tellfriend.css" type="text/css" />
        <script src="<?php echo base_url(); ?>js/jq.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/tellyourfriend.js" type="text/javascript"></script>


        <style type="text/css">
.header
{display: none;}
.footer
{display: none;}
#mainContent {
    width: 100% !important;
    clear: both;
}
        </style>
        <?php $fcats=$this->db->get_where("tellyourfriend",array('id'=>1))->row(); ?>
         <img id="imgBG" width="100%" src="<?php echo base_url(); ?>assets/images/<?php echo $fcats->image; ?>" alt=""/>
        <div class="wrapper">
            <header class="mainHeader">
               <div><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/md-logo.png" title="mobiledarzi" /></a></div>
                <h1>TELL YOUR FRIEND</h1>
            </header>
            <div id="mainContent" class="mainContent">
                <div class="form">
                    <form id="frmSubmit" action="<?php echo base_url(); ?>Welcome/tellyourfriendform" method="post">
                        <input type="hidden" name="countryName" value="India">
                        <div class="emailTopic">ENTER YOUR FRIEND’S EMAIL ADDRESS</div>
                        <div><input id="emailFriend" type="text" name="emailFriend" class="emailNormal"></div>
                        <div class="remark friend"><?php echo $fcats->h1; ?></div>
                        <div class="emailOwn">
                            <div class="emailTopic">ENTER YOUR OWN EMAIL ADDRESS</div>
                            <div><input id="emailOwn" type="text" name="emailOwn" class="emailNormal" value="<?php echo $user_email; ?>" readonly></div>
                            <div class="remark">
                                <div><input id="btnSubmit" class="btn btn-default" type="submit" name="btnSubmit"></div>
                                <p class="own"><?php echo $fcats->h2; ?></p>
                                <p class="ownAfter"><?php echo $fcats->h3; ?></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="summaryContent" class="summaryContentHide">
                <div id="duplicateEmail" class="summaryDesc">
                    <p>Your firend's email has already been registered!</p>
                    <p>Kindly enter a different email address for your friend.</p>
                    <div><button type="button" class="back">BACK</button></div>
                </div>
                <div id="completeEmail" class="summaryDesc completeHide">
                    <p>Thank you for recommending iTailor to your friend</p>
                    <p>and your continued support for us!!! 10% To Friend</p>
                    <div><button type="button" class="back">BACK</button></div>
                </div>
            </div>
        </div>
    </body>
</html>
