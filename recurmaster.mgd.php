<?php
/*--------------------------------------------------------------------+
 | CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2017                                |
+--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +-------------------------------------------------------------------*/

/**
 * The record will be automatically inserted, updated, or deleted from the
 * database as appropriate. For more details, see "hook_civicrm_managed" at:
 * http://wiki.civicrm.org/confluence/display/CRMDOC/Hook+Reference
 */
return array(
  0 => array(
    'name' => 'recurmaster_slave',
    'entity' => 'payment_processor_type',
    'params' => array(
      'version' => 3,
      'title' => 'Master Recurring (Slave Payment)',
      'name' => 'recurmaster_slave',
      'description' => 'Payment processor for generating recurring contributions that can be linked to Master recurring contributions',
      'user_name_label' => 'Username (ignored)',
      'password_label' => 'Password (ignored)',
      'class_name' => 'Payment_RecurmasterSlave',
      'url_site_default' => 'https://example.org',
      'url_site_test_default' => 'https://example.org',
      'url_recur_default' => 'https://example.org',
      'billing_mode' => 1, // 1=form
      'payment_type' => 1, // 1=Credit Card
      'is_recur' => 1,
    ),
  ),
  1 => array (
    'name' => 'Cron:Job.process_recurmaster',
    'entity' => 'Job',
    'params' => array (
      'version' => 3,
      'name' => 'Process master recurring contributions',
      'description' => 'Calculate amounts for all master recurring contributions.',
      'run_frequency' => 'Daily',
      'api_entity' => 'Job',
      'api_action' => 'process_recurmaster',
      'parameters' => '',
    ),
  ),
);
