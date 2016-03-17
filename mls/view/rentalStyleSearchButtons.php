           
          <div class="col-md-4 col-sm-6  text-center">
            <p><?= $this->model->getStyle() ?> </p>
          <div class="btn-group">  
              <a href="/fl/<?= $this->model->getCityName() ?>/rental/style/<?= $this->model->getStyle() ?>/800-1300" class="btn btn-material-brown">&nbsp;$800&nbsp;-&nbsp;$1,300&nbsp; [<?= $this->model->getTierCount("tier1") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/rental/style/<?= $this->model->getStyle() ?>/1300-1700" class="btn btn-material-brown">&nbsp;$1,300&nbsp;-&nbsp;$1,700 &nbsp;[<?= $this->model->getTierCount("tier2") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/rental/style/<?= $this->model->getStyle() ?>/1700-2500" class="btn btn-material-brown">&nbsp;$1,700&nbsp;-&nbsp;$2,500&nbsp; [<?= $this->model->getTierCount("tier3") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/rental/style/<?= $this->model->getStyle() ?>/2500-3500" class="btn btn-material-brown">&nbsp;$2,500&nbsp;-&nbsp;$3,500&nbsp; [<?= $this->model->getTierCount("tier4") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/rental/style/<?= $this->model->getStyle() ?>/3500-5000" class="btn btn-material-brown">&nbsp;$3,500&nbsp;-&nbsp;$5,000 &nbsp;[<?= $this->model->getTierCount("tier5") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/rental/style/<?= $this->model->getStyle() ?>/5000-50000" class="btn btn-material-brown">&nbsp;$5,000 and Up&nbsp;[<?= $this->model->getTierCount("tier6") ?>]</a>
          </div> 
        </div>