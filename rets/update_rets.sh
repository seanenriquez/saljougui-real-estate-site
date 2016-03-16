#!/bin/bash

/usr/bin/php rets_update.php
#/usr/bin/php rets_update_closed.php

/usr/bin/php rets_update_images_mrtu.php
/usr/bin/php create_thumbs_mrtu.php

/usr/bin/php process_all_counts_mrtu.php
#/usr/bin/php process_closed_counts.php

/usr/bin/php update_mrt.php