import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// load lbiary js theme flyonui
// import '../../node_modules/flyonui/dist/js/accordion';
// import '../../node_modules/flyonui/flyonui';


import Alpine from 'alpinejs'
window.Alpine = Alpine;
Alpine.start();

import AWN from "awesome-notifications"
// let globalOptions =  {
//     position :"bottom-right",
//     animationDuration : '',
// }
let notifier = new AWN();
window.notifier = notifier;

import Swal from 'sweetalert2';
window.Swal = Swal;