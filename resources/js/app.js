import './bootstrap';

// App resources
// import 'vite/dynamic-import-polyfill';
import '../css/app.css';
import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
