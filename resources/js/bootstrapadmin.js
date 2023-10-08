// import '../plugins/jquery/jquery.min';
// import '../plugins/bootstrap/js/bootstrap.bundle.js';
// import './admin/adminlte.js';
import 'laravel-datatables-vite';

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

