import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// load lbiary js theme flyonui
// import '../../node_modules/flyonui/dist/js/accordion';
// import '../../node_modules/flyonui/flyonui';
