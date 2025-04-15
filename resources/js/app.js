import $ from 'jquery';
import Alpine from 'alpinejs';
import './bootstrap';
import './renders';
import './agregarCoctel';
import './confirmationCoctel';
import './validations';
import Swal from 'sweetalert2';


window.$ = window.jQuery = $;
window.Alpine = Alpine;

Alpine.start();

console.log($)