<script setup>
import {reactive, ref,onMounted,watch} from 'vue';

import Menu from 'primevue/menu';
import {useRoute} from "vue-router";

const inputs = {
}

const route = useRoute();
console.log(route.path)
const data = reactive(inputs);
const height = ref(window.innerHeight)

const menu = ref();

const items = ref([
    {
        label: 'FirstProject',
        items: [
            {
                label: 'Dashboard',
                icon: 'fa-regular fa-chart-bar',
                route: "/",

            },
            {
                label: 'Blogs',
                icon: 'fa-regular fa-chart-bar',
                route: "/blogs",

            },
            {
                label: 'Products',
                icon: 'fa-regular fa-chart-bar',
                route: "/products",
            },
            {
                label: 'Categories',
                icon: 'fa-regular fa-chart-bar',
                route: "/categories",

            },
        ]
    },
]);
//
// onMounted(() => {
//     items.value.forEach((group) => {
//         group.items.forEach((item) => {
//             if (item.route === route.path) {
//                 console.log(item.route,'route')
//                 console.log(route.path,'route path')
//
//                 item.class = 'p-menuitem p-focus';
//             } else {
//                 item.class = 'p-menuitem';
//             }
//         });
//     });
// });
//
//
// const testFunction = (e) => {
//     // console.log(e,'e')
//     items.value.forEach((group) => {
//         group.items.forEach((item) => {
//             item.class = 'p-menuitem';
//         });
//     });
// };



onMounted(() => {
    updateItemClasses(route.path)
});




const updateItemClasses = (newPath) => {
    // console.log(77,newPath,items.value);
    items.value.forEach((group) => {
        group.items.forEach((item) => {
            if (item.route === newPath) {
                item.class = 'p-menuitem p-focus';
            } else {
                item.class = 'p-menuitem';
            }
        });
    });
};

const testFunction = () => {
    items.value.forEach((group) => {
        group.items.forEach((item) => {
            item.class = 'p-menuitem';
        });
    });
};

watch(() => route.path, (newPath, oldPath) => {
    // console.log(97,newPath);
    updateItemClasses(newPath);
});






</script>


<template>

    <div v-if="height">
      <Menu :model="items"  class="w-full" >
        <template #item="{ item, props }">
            <router-link v-if="item.route" v-slot="{ href, navigate }" :to="item.route" custom>
                <a v-ripple :href="href" v-bind="props.action" @click="navigate">
                    <span :class="item.icon" />
                    <span class="ml-2" @click="testFunction">{{ item.label }}</span>
                </a>
            </router-link>

            <a v-else v-ripple :href="item.url" :target="item.target" v-bind="props.action">
            <span :class="item.icon" />
            <span class="ml-2" >{{ item.label }}</span>
          </a>

        </template>
      </Menu>
    </div>

</template>


