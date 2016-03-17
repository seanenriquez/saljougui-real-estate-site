           
          <div class="col-md-3 col-sm-6  text-center">
          
            <? if ($this->model->getBeds() != 4) { ?>
              <p><?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?> Bedrooms</p>
            <? } else { ?>
              <p><?= $this->model->getBeds() ?>+ Bedrooms</p>
            <? } ?>
            
          <div class="btn-group">  
              <a href="/fl/<?= $this->model->getCityName() ?>/rental/pets/unfurnished/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/800-1300" target="_blank" class="btn btn-material-brown">$800-$1,300 [<?= $this->model->getTierCount("tier1") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/rental/pets/unfurnished/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/1300-1700" target="_blank" class="btn btn-material-brown">$1,300-$1,700 [<?= $this->model->getTierCount("tier2") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/rental/pets/unfurnished/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/1700-2500" target="_blank" class="btn btn-material-brown">$1,700-$2,500 [<?= $this->model->getTierCount("tier3") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/rental/pets/unfurnished/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/2500-3500" target="_blank" class="btn btn-material-brown">$2,500-$3,500 [<?= $this->model->getTierCount("tier4") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/rental/pets/unfurnished/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/3500-5000" target="_blank" class="btn btn-material-brown">$3,500-$5,000 [<?= $this->model->getTierCount("tier5") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/rental/pets/unfurnished/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/5000-50000" target="_blank" class="btn btn-material-brown">$5,000+ [<?= $this->model->getTierCount("tier6") ?>]</a>
          </div> 
        </div>