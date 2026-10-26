/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

/* eslint-disable camelcase */

(function ($) {
  'use strict'

  function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1)
  }
  var $sidebar = $('.control-sidebar')
  var $container = $('<div />', {
    class: 'p-3 control-sidebar-content'
  })
  $sidebar.append($container)
  // Checkboxes
  $container.append(
    '<h5><a href="javascript:void(0);" id="log_out">Logout</a></h5><hr class="mb-2"/>'
  )
})(jQuery)
