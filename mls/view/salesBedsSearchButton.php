      
      <div class="col-md-3 col-sm-6  text-center">
          
            <? if ($this->model->getBeds() != 4) { ?>
              <p><?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?> Bedrooms</p>
            <? } else { ?>
              <p><?= $this->model->getBeds() ?>+ Bedrooms</p>
            <? } ?>
            
          <div class="btn-group">  
              <a href="/fl/<?= $this->model->getCityName() ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/75000-100000" target="_blank" class="btn btn-material-brown">$75k-$100k [<?= $this->model->getTierCount("tier1") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/100000-125000" target="_blank" class="btn btn-material-brown">$100k-$125k [<?= $this->model->getTierCount("tier2") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/125000-150000" target="_blank" class="btn btn-material-brown">$125k-$150k [<?= $this->model->getTierCount("tier3") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/150000-175000" target="_blank" class="btn btn-material-brown">$150k-$175k [<?= $this->model->getTierCount("tier4") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/175000-200000" target="_blank" class="btn btn-material-brown">$175k-$200k [<?= $this->model->getTierCount("tier5") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/200000-225000" target="_blank" class="btn btn-material-brown">$200k-$225k [<?= $this->model->getTierCount("tier6") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= $this->model->getCityName() ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/225000-250000" target="_blank" class="btn btn-material-brown">$225k-$250k [<?= $this->model->getTierCount("tier7") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/250000-275000" target="_blank" class="btn btn-material-brown">$250k-$275k [<?= $this->model->getTierCount("tier8") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/275000-300000" target="_blank" class="btn btn-material-brown">$275k-$300k [<?= $this->model->getTierCount("tier9") ?>]</a>
          </div>           
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/300000-350000" target="_blank" class="btn btn-material-brown">$300k-$350k [<?= $this->model->getTierCount("tier10") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/350000-400000" target="_blank" class="btn btn-material-brown">$350k-$400k [<?= $this->model->getTierCount("tier11") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/400000-450000" target="_blank" class="btn btn-material-brown">$400k-$450k [<?= $this->model->getTierCount("tier12") ?>]</a>
          </div>  
          <div class="btn-group">  
              <a href="/fl/<?= $this->model->getCityName() ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/450000-500000" target="_blank" class="btn btn-material-brown">$450k-$500k [<?= $this->model->getTierCount("tier13") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/500000-600000" target="_blank" class="btn btn-material-brown">$500k-$600k [<?= $this->model->getTierCount("tier14") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/600000-750000" target="_blank" class="btn btn-material-brown">$600k-$750k [<?= $this->model->getTierCount("tier15") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/750000-1000000" target="_blank" class="btn btn-material-brown">$750k-$1M+ [<?= $this->model->getTierCount("tier16") ?>]</a>
          </div> 
          <div class="btn-group">  
              <a href="/fl/<?= ($this->model->getCityName()) ?>/residential/pricebybeds/<?= $this->model->getBeds() ?>-<?= $this->model->getBeds()+1?>/1000000-15000000" target="_blank" class="btn btn-material-brown">$1M+ [<?= $this->model->getTierCount("tier17") ?>]</a>
          </div>       
        </div>