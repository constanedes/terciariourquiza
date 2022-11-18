
require('./bootstrap');
import 'laravel-datatables-vite/js/dataTables.buttons';
import './picker/picker';
import './picker/picker.date';
import './picker/picker.time';
import toastr from 'toastr'
import Swal from 'sweetalert2/dist/sweetalert2.js';
window.toastr = toastr;
window.Swal = Swal;