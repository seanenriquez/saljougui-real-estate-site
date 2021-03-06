CREATE TABLE `master_rets_table_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sysid` varchar(20) NOT NULL,
  `agent_id` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `rets_system` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `rets_key` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `listing_id` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `property_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `property_sub_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_area` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `listing_price` int(11) DEFAULT NULL,
  `listing_date` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `listing_entry_timestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `listing_office_name` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_email` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_fax` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_url` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `listing_office_address` text CHARACTER SET latin1 NOT NULL,
  `listing_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `street_number` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `street_name` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `street_dir` varchar(4) CHARACTER SET latin1 DEFAULT NULL,
  `street_suffix` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `state_province` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `postal_code` varchar(9) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `additional_rooms` text CHARACTER SET latin1,
  `bathrooms` int(11) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `county` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `construction` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `dwelling_view` varchar(50) DEFAULT NULL,
  `equipment_appliances` text CHARACTER SET latin1,
  `expenses` int(11) DEFAULT NULL,
  `exterior_features` text CHARACTER SET latin1,
  `exterior_finish` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `fireplace` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `fireplace_type` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `floor` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `furnishing` text CHARACTER SET latin1,
  `gated_community` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `hoa` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `hoa_dues` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `hoa_dues_term` text CHARACTER SET latin1,
  `home_style` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `home_view` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `home_warranty` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `interior_features` text CHARACTER SET latin1,
  `interior_improvements` text CHARACTER SET latin1,
  `latitude` text CHARACTER SET latin1,
  `longitude` text CHARACTER SET latin1,
  `lot_acres` int(11) DEFAULT '0',
  `over_55` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `parking` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `past_photo_count` int(11) DEFAULT NULL,
  `pool` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `pool_features` text CHARACTER SET latin1,
  `photo_update` int(11) NOT NULL DEFAULT '0',
  `photo_count` int(11) DEFAULT NULL,
  `photo_timestamp` datetime DEFAULT NULL,
  `property_status` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `remarks` text CHARACTER SET latin1,
  `roof_type` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `split_yn` varchar(4) DEFAULT NULL,
  `subdivision` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `square_footage` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `tax_amount` int(11) DEFAULT NULL,
  `tax_year` int(11) DEFAULT NULL,
  `total_floors` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `utilities` text CHARACTER SET latin1,
  `virtual_tour` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `waterfront` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `water_type` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `year_built` int(11) DEFAULT NULL,
  `short_sale` varchar(4) DEFAULT NULL,
  `garage` varchar(100) DEFAULT NULL,
  `halfbaths` varchar(45) DEFAULT NULL,
  `amenities` varchar(100) DEFAULT NULL,
  `dining_area` varchar(100) DEFAULT NULL,
  `security` varchar(100) DEFAULT NULL,
  `cooling` varchar(25) DEFAULT NULL,
  `heating` varchar(100) DEFAULT NULL,
  `water_footage` varchar(20) DEFAULT NULL,
  `design` varchar(100) DEFAULT NULL,
  `avail` varchar(100) DEFAULT NULL,
  `terms` varchar(100) DEFAULT NULL,
  `pets` varchar(100) DEFAULT NULL,
  `furn_ann_rent` varchar(10) NOT NULL,
  `furn_sea_rent` varchar(10) NOT NULL,
  `furn_offsea_rent` varchar(10) NOT NULL,
  `unfurn_ann_rent` varchar(10) NOT NULL,
  `unfurn_sea_rent` varchar(10) NOT NULL,
  `unfurn_offsea_rent` varchar(10) NOT NULL,
  `1st_deposit` varchar(10) NOT NULL,
  `last_deposit` varchar(10) NOT NULL,
  `pet_fee` varchar(10) NOT NULL,
  `tenant_pays` varchar(40) NOT NULL,
  `rent_date_avail` date NOT NULL,
  `app_fee` varchar(10) NOT NULL,
  `subdivision_amenities` varchar(100) NOT NULL,
  `rent_restrict` varchar(60) NOT NULL,
  `elem_school` varchar(50) NOT NULL,
  `middle_school` varchar(50) NOT NULL,
  `high_school` varchar(50) NOT NULL,
  `zoning` varchar(30) NOT NULL,
  `bank_owned` varchar(5) NOT NULL,
  `development` varchar(60) NOT NULL,
  `frontage` varchar(20) NOT NULL,
  `develop_status` varchar(50) NOT NULL,
  `tot_units` smallint(6) NOT NULL,
  `improvements` varchar(30) NOT NULL,
  `loc` varchar(40) NOT NULL,
  `loc_desc` varchar(50) NOT NULL,
  `master_bedbath` varchar(100) NOT NULL,
  `dock_boat_info` varchar(100) NOT NULL,
  `prop_misc` varchar(100) NOT NULL,
  `ada_info` varchar(50) NOT NULL,
  `index_photo` smallint(1) DEFAULT NULL,
  `ada_comp` varchar(50) NOT NULL,
  `boat_services` varchar(50) NOT NULL,
  `lot_desc` varchar(50) NOT NULL,
  `maint_fee_inc` varchar(50) NOT NULL,
  `restrictions` varchar(50) NOT NULL,
  `membership` varchar(80) NOT NULL,
  `rooms` varchar(80) NOT NULL,
  `special_info` varchar(128) NOT NULL,
  `tax_places` varchar(128) NOT NULL,
  `terms_considered` varchar(128) NOT NULL,
  `unit_desc` varchar(128) NOT NULL,
  `private_pool` varchar(5) NOT NULL,
  PRIMARY KEY (`id`,`listing_entry_timestamp`,`postal_code`,`sysid`),
  KEY `listing_id` (`listing_id`) USING BTREE,
  KEY `city` (`city`),
  FULLTEXT KEY `property_type` (`property_type`),
  FULLTEXT KEY `subdivision` (`subdivision`),
  FULLTEXT KEY `listing_area` (`listing_area`),
  FULLTEXT KEY `property_sub_type` (`property_sub_type`)
) ENGINE=MyISAM AUTO_INCREMENT=178439 DEFAULT CHARSET=utf8;

