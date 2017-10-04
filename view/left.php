     
        <div class="col-sm-3 col-md-3 col-lg-3 main-sidebar animated bounceInLeft">
          <div class="user-info">
            <div class="infobar">
              <div class="avatar size36" id="leftpic" style="background-image:url(<?php echo $pic;?>);"></div>
              <div class="info-content">
                <div class="name"><?php echo $_SESSION['user'];?></div>
                <div class="description">
                  <a href="#">50MB/<?php echo $anim->getSize($user);?>MB</a>
                </div>
              </div>
            </div>
            <div class="list-group user-nav">
              <a href="upload.php" class="list-group-item withripple"  data-gta="event" data-label="your posts">
                <span class="glyphicon glyphicon-cloud-upload"></span>
                上传
              </a>
              <a href="uprecord.php" class="list-group-item withripple" data-gta="event" data-label="my reply">
                <span class="glyphicon glyphicon-upload"></span>
                上传记录
                <span class="pull-right"><?php echo $anim->getNum($user);?></span>
              </a>
              <a href="collect.php" class="list-group-item withripple" data-gta="event" data-label="notification">
                <span class="glyphicon glyphicon-heart"></span>
                我的收藏
                <span class="pull-right"><?php echo $anim->getNumByCollect($user);?></span>
              </a>
              <a href="user.php" class="list-group-item withripple" data-gta="event" data-label="settings">
                <span class="glyphicon glyphicon-cog"></span>
                设置
              </a>
            </div>
          </div>
          <div class="contact text-center">
            <p class="muted">
              <marquee behavior="left" direction="50"><span style="color:#34A853;">你有<?php echo $anim->getNum($user);?>条插件审核通过</span></marquee>
              <marquee behavior="left" direction="50"><br><span style="color:#EB574C;"><?php echo $anim->getNumUncheck($user);?>条插件审核未通过或是正在审核</span></p></marquee>
            <p class="contact-info">
              联系我们
              <br>1654206898@qq.com</p>
          </div>
        </div>
