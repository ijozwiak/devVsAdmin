/**
 * @author      Iwona Jóźwiak <advertcenter@gmail.com>
 * @package     DevVsAdmin\UIComponent
 * @date        2020
 * @copyright   Copyright (C) 2021 Advert Center
 * @license     See LICENSE_ADVERT_CENTER.txt for license details.
 */

define([
    'jquery',
    'Magento_Ui/js/modal/modal'
], function ($) {
    'use strict';

    var modal = function (config, element) {
        var $el = $(element);
        var openButton = $el.find('[data-role="openModal"]');
        var jsLayoutModal = $el.find('[data-role="jsLayoutModal"]');
        var buttons = [];

        buttons.push({
            text: config.buttons.button.text,
            class: config.buttons.button.class,
            click: function () {
                this.closeModal();
            }
        });

        // setup modal
        jsLayoutModal.modal({
            autoOpen: config.autoOpen,
            buttons: buttons,
            closeText: config.closeText,
            clickableOverlay: config.clickableOverlay,
            focus: config.focus,
            innerScroll: config.innerScroll,
            modalClass: config.modalClass,
            modalLeftMargin: config.modalLeftMargin,
            responsive: config.responsive,
            title: config.title,
            type: config.type,
        });

        // setup trigger
        $(openButton).on('click', function () {
            jsLayoutModal.modal('openModal');
        });
    };

    return modal;
});



