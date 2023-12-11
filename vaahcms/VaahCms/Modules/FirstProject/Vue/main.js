import {createApp, markRaw} from 'vue';
import { createPinia, PiniaVuePlugin  } from 'pinia'


//-------------PrimeVue Imports

import PrimeVue from "primevue/config";

import BadgeDirective from "primevue/badgedirective";



import Carousel from 'primevue/carousel';


import ConfirmDialog from 'primevue/confirmdialog';
import ConfirmPopup from 'primevue/confirmpopup';
import ConfirmationService from 'primevue/confirmationservice';

import DataTable from 'primevue/datatable';

import DialogService from 'primevue/dialogservice'

import Paginator from 'primevue/paginator';

import Ripple from 'primevue/ripple';

import StyleClass from 'primevue/styleclass';

import Toast from 'primevue/toast';
import ToastService from 'primevue/toastservice';

import Tooltip from 'primevue/tooltip';
import ProgressBar from 'primevue/progressbar';
import Badge from 'primevue/badge';

//start Crud import
import Button from 'primevue/button';


import Menu from 'primevue/menu';
import Column from 'primevue/column';
import Panel from 'primevue/panel';
import InputSwitch from 'primevue/inputswitch';
import InputText from 'primevue/inputtext';
import RadioButton from 'primevue/radiobutton';
import Divider from 'primevue/divider';
import Tag from 'primevue/tag';
import Message from 'primevue/message';

//End Crud import

//-------------/PrimeVue Imports



//-------------APP
import App from './layouts/App.vue'
import router from './routes/router'

const app = createApp(App);

const pinia = createPinia();
pinia.use(({ store }) => {
    store.$router = markRaw(router)
});
app.use(pinia);
app.use(PiniaVuePlugin);
app.use(router);
//-------------/APP


//-------------PrimeVue Use
app.use(PrimeVue, { ripple: true });
app.use(ConfirmationService);
app.use(ToastService);
app.use(DialogService);

app.directive('tooltip', Tooltip);
app.directive('badge', BadgeDirective);
app.directive('ripple', Ripple);
app.directive('styleclass', StyleClass);




app.component('Carousel', Carousel);

//app.component('ColumnGroup', ColumnGroup);
app.component('ConfirmDialog', ConfirmDialog);
app.component('ConfirmPopup', ConfirmPopup);
app.component('DataTable', DataTable);
app.component('Paginator', Paginator);
app.component('Toast', Toast);
app.component('ProgressBar',ProgressBar);
app.component('Badge',Badge);

//Start Crud Component
app.component('Button', Button);

app.component('Menu',Menu);
app.component('Column', Column);
app.component('Panel',Panel);
app.component('InputSwitch',InputSwitch);
app.component('InputText',InputText);
app.component('RadioButton',RadioButton);
app.component('Divider',Divider);
app.component('Tag',Tag);
app.component('Message',Message);
//End Crud Component
//-------------/PrimeVue Use


app.mount('#appFirstProject')


export { app }
