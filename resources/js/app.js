require('./bootstrap');
import {$,jQuery} from 'jquery';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.$ = $;
window.jQuery = jQuery;
Alpine.start();
