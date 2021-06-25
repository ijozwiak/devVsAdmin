/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\UIComponent
 * @date        2020
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

define (
    [
        'underscore',
        'uiElement'
    ],
    function (_, Component) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'DevVsAdmin_UIComponent/home'
            },

            getData: function() {
                return _.map(this.data);
            }
        });
    }
);



