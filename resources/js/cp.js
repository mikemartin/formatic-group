/**
 * When extending the control panel, be sure to uncomment the necessary code for your build process:
 * https://statamic.dev/extending/control-panel
 */


import YesNoFieldtype from './components/fieldtypes/YesNoFieldtype.vue';

Statamic.booting(() => {
    Statamic.$components.register('yes_no-fieldtype', YesNoFieldtype);
});

