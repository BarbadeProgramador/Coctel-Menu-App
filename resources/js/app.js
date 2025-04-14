import $ from 'jquery';
import Alpine from 'alpinejs';
import './bootstrap';
import './renders';
import './agregarCoctel'
import './confirmationCoctel'
import './validations'

window.$ = window.jQuery = $;
window.Alpine = Alpine;

Alpine.start();

console.log($)