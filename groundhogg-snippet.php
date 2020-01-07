<?php
/*
 * Plugin Name: Groundhogg - snippet
 * Plugin URI:  https://www.groundhogg.io/?utm_source=wp-plugins&utm_campaign=plugin-uri&utm_medium=wp-dash
 * Description: The description of your extension.
 * Version: 2.0
 * Author: Groundhogg Inc.
 * Author URI: https://www.groundhogg.io/?utm_source=wp-plugins&utm_campaign=author-uri&utm_medium=wp-dash
 * Text Domain: groundhogg
 * Domain Path: /languages
 *
 * Groundhogg is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Groundhogg is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

//wp_die();

use function Groundhogg\get_contactdata;

/**
 * @param $args array
 * @param $calendar \GroundhoggBookingCalendar\Classes\Calendar
 * @return mixed array
 */
function custom_appointment($args , $calendar)
{
    $contact = get_contactdata(absint($args['contact_id'] ));
    $args['name'] = $calendar->get_name().'-' .$contact->get_first_name(). ' ' .$contact->get_last_name();
    $args['status'] = 'approved';

    return $args;
}

add_filter('groundhogg/calendar/schedule_appointment' , 'custom_appointment' ,10 , 2 );