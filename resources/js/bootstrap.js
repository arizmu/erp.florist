import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// load lbiary js theme flyonui
// import '../../node_modules/flyonui/dist/js/accordion';
// import '../../node_modules/flyonui/flyonui';


import Alpine from 'alpinejs'
import Swal from 'sweetalert2';
window.Alpine = Alpine;
window.Swal = Swal;
Alpine.start();

import AWN from "awesome-notifications"
// let globalOptions =  {
//     position :"bottom-right",
//     animationDuration : '',
// }
let notifier = new AWN();
window.notifier = notifier;


import {v4 as uuidv4} from 'uuid';
window.uuid = uuidv4;

import flatpickr from "flatpickr";
window.flatpickr = flatpickr;

import Chart from 'chart.js/auto';
import { getRelativePosition } from 'chart.js/helpers';
window.Chart = Chart;

