require('./bootstrap')

import { createApp } from 'vue'

const app = createApp({})

const files = require.context('./components', true, /\.vue$/i);


files.keys().map(key => app.component(key.split('/').pop().split('.')[0], files(key).default));

window.addEventListener('load', function(){
    app.mount('#app');
})
