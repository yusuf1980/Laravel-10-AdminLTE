import '../plugins/jquery/jquery.min';
import '../plugins/bootstrap/js/bootstrap.bundle.min.js';
import './admin/adminlte.min.js';
import 'laravel-datatables-vite';

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

