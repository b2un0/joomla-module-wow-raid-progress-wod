window.wow = window.wow || {};

window.wow.mod_wow_raid_progress_wod = function () {
    jQuery('.mod_wow_raid_progress_wod .header').click(function () {
        if (jQuery(this).next('li').is(':visible')) {
            jQuery(this).next('li').slideUp('slow');
        } else {
            jQuery('.mod_wow_raid_progress_wod .npcs').slideUp('slow');
            jQuery(this).next('li').slideToggle('slow');
        }
    });
}

if (typeof jQuery != 'undefined') {
    jQuery(document).ready(window.wow.mod_wow_raid_progress_wod);
}