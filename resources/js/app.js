import $ from 'jquery';
import Alpine from 'alpinejs';
import './bootstrap';
import './buttonGuardado';


window.$ = window.jQuery = $;
window.Alpine = Alpine;

Alpine.start();

console.log($)